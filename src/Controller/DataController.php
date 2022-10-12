<?php

namespace App\Controller;

use App\Entity\Data;
use App\Form\CsvType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            'controller_name' => 'DataController',
            'csv_file_form' => $csvFileForm->createView()
        ]);
    }
}
