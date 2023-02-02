<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nbc/', name: 'nbc_')]
class NbcController extends AbstractController
{
    #[Route('', methode: ['GET'], name: 'index')]
    public function index(): Response
    {
        return $this->render('nbc/index.html.twig', [
            'website' => 'Nbc',
            ]);
    }
}