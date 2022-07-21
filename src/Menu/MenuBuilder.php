<?php
namespace App\Menu;

use App\Entity\MenuType;
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
                        $routes[] = ['route' => $child->getRoute()->getRouteName()];
                    }

                    $menu->addChild($entry->getLabel(), [
                        'route' => $entry->getRoute()->getRouteName(),
                        'extras' => [
                            'routes' => $routes,
                        ],
                    ])
                        ->setAttributes(['class' => 'nav-item'])
                        ->setLinkAttributes(['class' => 'nav-link link-light px-2'])
                    ;

                }
            }
        }
        return $menu;
    }

}