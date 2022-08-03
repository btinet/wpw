<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\SocialMediaLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends AbstractController
{

    public function getSocialMediaLinks(SocialMediaLinkRepository $linkRepository): Response
    {

    return $this->render('_component/_social_bar.html.twig',[
        'items' => $linkRepository->findAll()
    ]);
    }

    public function getSocialMediaLinksOffCanvas(SocialMediaLinkRepository $linkRepository): Response
    {

        return $this->render('_component/_social_bar_offcanvas.html.twig',[
            'items' => $linkRepository->findAll()
        ]);
    }

    public function getSocialMediaLinksAsList(SocialMediaLinkRepository $linkRepository): Response
    {

        return $this->render('_component/_social_list.html.twig',[
            'items' => $linkRepository->findAll()
        ]);
    }

    public function getProducts(ProductRepository $productRepository): Response
    {

        return $this->render('_component/_list_group.html.twig',[
            'items' => $productRepository->findAll()
        ]);
    }

}