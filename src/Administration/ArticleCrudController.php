<?php

namespace App\Administration;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')->onlyOnIndex()->setBasePath('uploads/images/article/'),
            TextField::new('title'),
            TextareaField::new('description'),
            AssociationField::new('category'),
            TextareaField::new('content')->setFormType(CKEditorType::class),
            BooleanField::new('hasYoutubeVideo'),
            TextField::new('youtubeVideoUrl'),
            BooleanField::new('isPublished'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('alt'),
            AssociationField::new('mediaImages')->setFormTypeOptions([
                'by_reference' => false,
            ]),
        ];
    }

}
