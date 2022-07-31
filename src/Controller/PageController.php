<?php

namespace App\Controller;

use App\Entity\Page;
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

        return $this->redirectToRoute('portfolio_index');
    }

    /**
     * @Route("/page/{slug}", name="show")
     */
    public function show(Page $page): Response
    {

        return $this->render('page/show.html.twig',[
            'page' => $page
        ]);
    }
}
