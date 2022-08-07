<?php

namespace App\Controller;

use App\Repository\PortfolioRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/portfolio", name="portfolio_")
 */
class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(PortfolioRepository $portfolioRepository, TagRepository $tagRepository): Response
    {
        $globalNavigation = [
            'portfolio' => ['label' => 'Portfolio','slug'=>'portfolio'],
            'journal' => ['label' => 'Journal','slug'=>'journal'],
            'about' => ['label' => 'Über','slug'=>'about'],
            'contact' => ['label' => 'Kontakt','slug'=>'contact'],
        ];

        $tags = $tagRepository->findAll();

        $portfolio = $portfolioRepository->findBy([
            'isPublished' => true,
            'isFeatured' => true
        ]);

        shuffle($portfolio);

        return $this->render('portfolio/index.html.twig', [
            'global_navigation' => $globalNavigation,
            'portfolio' => $portfolio,
            'tags' => $tags
        ]);
    }

}