<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('personnage/index.html.twig', [
            'controller_name' => 'PersonnageController',
        ]);
    }

    #[Route('/personnages', name: 'personnages')]
    public function personnages(): Response
    {
        return $this->render('personnage/personnages.html.twig', [
            'controller_name' => 'PersonnageController',
            'perso_name'=>'Bob le Poulpe',
            'caracteristiques'=>[
                'force'=>78,
                'agiLite'=>27,
                'inteligence'=>12
            ],
            
        ]);
    }
}
