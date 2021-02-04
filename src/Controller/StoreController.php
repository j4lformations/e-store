<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'store_')]
class StoreController extends AbstractController
{
    #[Route(name: 'accueil')]
    public function index(): Response
    {
        return $this->render('store/index.html.twig', [
            'pageTitre' => 'Accueil',
            'pageSection' => 'Page Accueil',
        ]);
    }
}
