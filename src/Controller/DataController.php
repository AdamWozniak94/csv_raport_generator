<?php

namespace App\Controller;

use App\Form\CsvType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    #[Route('/', name: 'app_data')]
    public function index(Request $request): Response
    {
        $csvFileForm = $this->createForm(CsvType::class);
        $csvFileForm->handleRequest($request);

        if ($csvFileForm->isSubmitted() && $csvFileForm->isValid()) {
            /** @var UploadedFile $csvFile */
            $csvFile = $csvFileForm->get('csv_file')->getData();
            dump($csvFile);die();
        }

        return $this->render('data/index.html.twig', [
            'controller_name' => 'DataController',
            'csv_file_form' => $csvFileForm->createView()
        ]);
    }
}
