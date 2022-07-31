<?php
namespace App\Menu;

use App\Entity\MenuType;
use App\Entity\SocialMediaLink;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private FactoryInterface $factory;
    private EntityManagerInterface $em;

    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory, EntityManagerInterface $entityManager)
    {
        $this->factory = $factory;
        $this->em = $entityManager;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menuRepository = $this->em->getRepository(MenuType::class);
        $menuEntity = $menuRepository->findOneBy([
            'slug' => 'main'
        ]);

        $menu = $this->factory->createItem('root')
            ->setExtra('translation_domain', 'menu');
        $menu->setChildrenAttributes([
            'class' => 'nav  justify-content-center d-flex'
        ]);

        if($menuEntity)
        {
            foreach ($menuEntity->getMenuItems() as $entry) {
                $routes = [];
                if($entry->getParent() == null)
                {
                    foreach($entry->getMenuItems() as $child)
                    {
                        if($child->hasPage()){
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                                'routeParameters' => ['slug' => $child->getPageSlug()->getSlug()],
                            ];
                        } else {
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                            ];
                        }
                    }

                    if($entry->hasPage()) {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'routeParameters' => ['slug' => $entry->getPageSlug()->getSlug()],
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'nav-item'])
                            ->setLinkAttributes(['class' => 'nav-link link-light px-2']);
                    } else {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'nav-item'])
                            ->setLinkAttributes(['class' => 'nav-link link-light px-2']);
                    }

                }
            }
        }
        return $menu;
    }

    public function createServiceMenu(array $options): ItemInterface
    {
        $menuRepository = $this->em->getRepository(MenuType::class);
        $menuEntity = $menuRepository->findOneBy([
            'slug' => 'service'
        ]);

        $menu = $this->factory->createItem('root')
            ->setExtra('translation_domain', 'menu');
        $menu->setChildrenAttributes([
            'class' => 'list-unstyled'
        ]);

        if($menuEntity)
        {
            foreach ($menuEntity->getMenuItems() as $entry) {
                $routes = [];
                if($entry->getParent() == null)
                {
                    foreach($entry->getMenuItems() as $child)
                    {
                        if($child->hasPage()){
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                                'routeParameters' => ['slug' => $child->getPageSlug()->getSlug()],
                            ];
                        } else {
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                            ];
                        }
                    }

                    if($entry->hasPage()) {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'routeParameters' => ['slug' => $entry->getPageSlug()->getSlug()],
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'mb-1'])
                            ->setLinkAttributes(['class' => 'link-light']);
                    } else {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'mb-1'])
                            ->setLinkAttributes(['class' => 'link-light']);
                    }

                }
            }
        }
        return $menu;
    }

    public function createLegalMenu(array $options): ItemInterface
    {
        $menuRepository = $this->em->getRepository(MenuType::class);
        $menuEntity = $menuRepository->findOneBy([
            'slug' => 'legal'
        ]);

        $menu = $this->factory->createItem('root')
            ->setExtra('translation_domain', 'menu');
        $menu->setChildrenAttributes([
            'class' => 'list-unstyled'
        ]);

        if($menuEntity)
        {
            foreach ($menuEntity->getMenuItems() as $entry) {
                $routes = [];
                if($entry->getParent() == null)
                {
                    foreach($entry->getMenuItems() as $child)
                    {
                        if($child->hasPage()){
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                                'routeParameters' => ['slug' => $child->getPageSlug()->getSlug()],
                            ];
                        } else {
                            $routes[] = [
                                'route' => $child->getRoute()->getRouteName(),
                            ];
                        }
                    }

                    if($entry->hasPage()) {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'routeParameters' => ['slug' => $entry->getPageSlug()->getSlug()],
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'mb-1'])
                            ->setLinkAttributes(['class' => 'link-light']);
                    } else {
                        $menu->addChild($entry->getLabel(), [
                            'route' => $entry->getRoute()->getRouteName(),
                            'extras' => [
                                'routes' => $routes,
                            ],
                        ])
                            ->setAttributes(['class' => 'mb-1'])
                            ->setLinkAttributes(['class' => 'link-light']);
                    }

                }
            }
        }
        return $menu;
    }

}
