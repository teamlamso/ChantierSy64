<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ouvrier')]
final class OuvrierController extends AbstractController
{
    #[Route('/ouvrier', name: 'app_ouvrier')]
    public function index(): Response
    {
        $lesOuvriers = $ouvrierRepository->findAll();

        return $this->render('ouvrier/index.html.twig', [
            'ouvriers' => $lesOuvriers,
        ]);
    }
}
