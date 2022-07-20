<?php

namespace App\Administration;

use App\Entity\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RouteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Route::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            TextField::new('routeName'),
            CollectionField::new('routeParam'),
            TextField::new('icon'),
        ];
    }

}
