<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="journal_")
 */
class JournalController extends AbstractController
{
    /**
     * @Route("/journal", name="index")
     */
    public function index(PageRepository $pageRepository, ArticleRepository $articleRepository, CategoryRepository $categoryRepository): Response
    {

        $journalPage = $pageRepository->findOneBy([
            'hasArticles' => true
        ]);

        $articles = $articleRepository->findBy([

        ],[
            'updated' => 'DESC'
        ]);

        $categories = $categoryRepository->findAll();

        return $this->render('journal/index.html.twig',[
            'page' => $journalPage,
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/journal/{slug}", name="show")
     */
    public function show(Article $article, ArticleRepository $repository): Response
    {
        $prevArticle = $repository->getPreviousPost($article);
        $nextArticle = $repository->getNextPost($article);

        return $this->render('journal/show.html.twig',[
            'article' => $article,
            'prev' => $prevArticle,
            'next' => $nextArticle
        ]);
    }
}