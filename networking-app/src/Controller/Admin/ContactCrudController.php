<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

#[IsGranted('ROLE_ADMIN')]
class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions
            ->disable(Action::NEW, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->setPermission(Crud::PAGE_INDEX, 'ROLE_ADMIN')
            ->setPermission(Action::DETAIL, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN');

        return $actions;   
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addFieldset('User details')
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),
            IdField::new('id')->hideOnDetail(),
            TextField::new('Name'),
            TextField::new('Firstname'),
            EmailField::new('email'),
            TextField::new('phoneNumber')
                ->setFormType(TelType::class),
            FormField::addFieldset('Business information')
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),
            TextField::new('company')->onlyOnDetail(),
            TextField::new('occupation')->onlyOnDetail(),
            TextField::new('company_size')->onlyOnDetail(),
            TextField::new('business_line')->onlyOnDetail(),
            FormField::addFieldset('Message details')
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),
            TextEditorField::new('message'),
            DateTimeField::new('createdAt', 'Sent On'),
        ];
    }
}
