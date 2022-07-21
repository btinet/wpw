<?php

namespace App\Administration;

use App\Entity\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuItem::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            AssociationField::new('parent'),
            AssociationField::new('route'),
            NumberField::new('priority'),
            AssociationField::new('menuType'),
        ];
    }

}
