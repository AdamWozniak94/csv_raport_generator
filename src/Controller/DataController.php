<?php

namespace App\Controller;

use App\Entity\Data;
use App\Form\CsvType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    #[Route('/', name: 'app_data')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $csvFileForm = $this->createForm(CsvType::class);
        $csvFileForm->handleRequest($request);

        if ($csvFileForm->isSubmitted() && $csvFileForm->isValid()) {
            /** @var UploadedFile $csvFile */
            $csvFile = $csvFileForm->get('csv_file')->getData();
            $result = $doctrine->getRepository(Data::class)->importFromCsv($csvFile);

            if ($result) {
                $messageType = 'success';
                $message = 'Pomyślnie zaimportowano dane do bazy';
            } else {
                $messageType = 'error';
                $message = 'Wystąpił błąd podczas importowania danych';
            }

            $this->addFlash($messageType, $message);
            $this->redirectToRoute('app_data');
        }

        return $this->render('data/index.html.twig', [
            'csv_file_form' => $csvFileForm->createView()
        ]);
    }

    #[Route('/raport', name: 'app_raport')]
    public function generateRaport(Request $request, ManagerRegistry $doctrine)
    {
        $dataRepository = $doctrine->getRepository(Data::class);
        $version = $request->get('version');
        $raportDate = $request->get('raport-date');

        $fileName = 'Raport' . $version . '.csv';
        if (1 == $version) {
            $fileHeaders = [
                'Nr rozliczeniowy',
                'Imię i Nazwisko',
                'Status Zamówienia',
                'Liczba zamówień',
                'Suma kosztów',
                'Unikalne nazwy ofert'
            ];
            $results = $dataRepository->getRaport1Data($raportDate);
        } else {
            $fileHeaders = [
                'Miesiąc',
                'Czy Upgrade',
                'Nazwa oferty',
                'Liczba zamówień'
            ];
            $results = $dataRepository->getRaport2Data($raportDate);
        }

        $rows = [];
        $rows[] = implode(';', $fileHeaders);
        foreach ($results as $result) {
            $rows[] = implode(';', $result);
        }
        $content = implode("\n", $rows);
        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename=' . $fileName);

        return $response;
    }
}
