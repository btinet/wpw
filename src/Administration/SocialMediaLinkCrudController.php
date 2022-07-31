<?php

namespace App\Administration;

use App\Entity\SocialMediaLink;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocialMediaLinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialMediaLink::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            TextField::new('url'),
            TextField::new('icon'),
        ];
    }

}
