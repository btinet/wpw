<?php

namespace App\Administration;

use App\Entity\MediaImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MediaImageCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return MediaImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')->onlyOnIndex()->setBasePath('uploads/images/media/'),
            TextField::new('image')->setFormType(VichFileType::class)->onlyOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('size'),
            TextField::new('label'),
            TextField::new('alt'),
            AssociationField::new('articles')->setFormTypeOptions([
                'by_reference' => false,
            ]),
            BooleanField::new('isPublished'),
        ];
    }
}
