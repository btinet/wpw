<?php

namespace App\Administration;

use App\Entity\MenuType;
use App\Entity\SocialMediaLink;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wagner Pictures Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Website','fa fa-globe', 'page_index' );
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('configuration');
        yield MenuItem::linkToCrud('menu_items','fa fa-items',\App\Entity\MenuItem::class);
        yield MenuItem::linkToCrud('menu_types','fa fa-menu',MenuType::class);
        yield MenuItem::linkToCrud('socialMediaLinks','fa fa-social', SocialMediaLink::class);
        yield MenuItem::linkToCrud('routes','fa fa-route',\App\Entity\Route::class);
        yield MenuItem::linkToCrud('catalogue','fa fa-catalogue',\App\Entity\Product::class);

        yield MenuItem::section('portfolio');
        yield MenuItem::linkToCrud('portfolio','fa fa-image',\App\Entity\Portfolio::class);
        yield MenuItem::linkToCrud('media images','fa fa-image',\App\Entity\MediaImage::class);
        yield MenuItem::linkToCrud('tags','fa fa-tags',\App\Entity\Tag::class);

        yield MenuItem::section('Content');
        yield MenuItem::linkToCrud('article','fa fa-page',\App\Entity\Article::class);
        yield MenuItem::linkToCrud('pages','fa fa-page',\App\Entity\Page::class);
        yield MenuItem::linkToCrud('categories','fa fa-category',\App\Entity\Category::class);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
