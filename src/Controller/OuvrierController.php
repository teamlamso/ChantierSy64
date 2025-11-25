<?php

namespace App\Controller;

use App\Repository\OuvrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ouvrier')]
final class OuvrierController extends AbstractController
{
    #[Route('/', name: 'app_ouvrier_index', methods: ['GET'])]
    public function index(OuvrierRepository $ouvrierRepository): Response
    {
        $lesOuvriers = $ouvrierRepository->findAll();

        return $this->render('ouvrier/index.html.twig', [
            'ouvriers' => $lesOuvriers,
        ]);
    }
}
