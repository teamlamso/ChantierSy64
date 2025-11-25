<?php

namespace App\Controller;

use App\Repository\OuvrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SpecialiteRepository;

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

    #[Route('/showallspecialite', name: 'app_specialite_show_all', methods: ['GET'])]
    public function showAllSpecialite(SpecialiteRepository $specialiteRepository): Response
    {
        return $this->render('ouvrier/show_all_specialite.html.twig', [
            'specialites' => $specialiteRepository->findAll(),
        ]);
    }
}
