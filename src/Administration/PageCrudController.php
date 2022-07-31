<?php

namespace App\Administration;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')->onlyOnIndex()->setBasePath('uploads/images/featured/'),
            TextField::new('title'),
            TextareaField::new('description'),
            BooleanField::new('hasArticles'),
            AssociationField::new('category'),
            TextEditorField::new('content'),
            BooleanField::new('hasContactForm'),
            BooleanField::new('hasProducts'),
            BooleanField::new('isPublished'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('alt'),
        ];
    }

}
