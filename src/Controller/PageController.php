<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/", name="page_")
 */
class PageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $globalNavigation = [
            'portfolio' => ['label' => 'Portfolio','slug'=>'portfolio'],
            'journal' => ['label' => 'Journal','slug'=>'journal'],
            'about' => ['label' => 'Über','slug'=>'about'],
            'contact' => ['label' => 'Kontakt','slug'=>'contact'],
        ];

        return $this->render('page/index.html.twig', [
            'global_navigation' => $globalNavigation
        ]);
    }
}
