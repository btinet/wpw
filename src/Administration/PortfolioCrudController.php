<?php

namespace App\Administration;

use App\Entity\Portfolio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class PortfolioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Portfolio::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')->onlyOnIndex()->setBasePath('uploads/images/portfolio/'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('alt'),
            AssociationField::new('parent'),
            BooleanField::new('hasChildren'),
            AssociationField::new('children')->setFormTypeOptions([
                'multiple' => true,
                'by_reference' => false,
            ]),
            AssociationField::new('tags')->setFormTypeOptions([
                'multiple' => true,
                'by_reference' => false,
            ]),
            BooleanField::new('isFeatured'),
            BooleanField::new('isPublished'),
        ];
    }

}
