<?php

namespace App\Controller\Admin;

use Form\Field;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission(Crud::PAGE_INDEX, 'ROLE_ADMIN')
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ->setPermission(Action::DETAIL, 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addFieldset('User details')
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),

            IdField::new('id')
                ->hideOnForm()
                ->hideOnDetail(),

            TextField::new('fullName')
                ->setFormType(TextType::class),

            TextField::new('phoneNumber')
                ->setFormType(TelType::class)
                ->setRequired(isRequired: false),

            EmailField::new('email')
                ->setFormType(EmailType::class)
                ->setRequired(isRequired: false),

            FormField::addFieldset('Security')
                ->hideOnDetail()
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),

            TextField::new('password')
                ->setFormType(PasswordType::class)
                ->hideOnIndex()
                ->hideOnDetail()
                ->setRequired(isRequired: false),

            FormField::addFieldset('User role')
                ->addCssClass('shadow-sm border p-3 rounded mb-4'),

            ChoiceField::new('roles')
                ->setChoices([
                    'No role selected' => '',
                    'User' => 'ROLE_USER',
                    'Administrator' => 'ROLE_ADMIN'
                ])
                ->allowMultipleChoices()
                ->setColumns(6)
                ->setRequired(isRequired: false),

            FormField::addFieldset('Business information')
                ->addCssClass('shadow-sm border p-3 rounded mb-4')
                ->setRequired(isRequired: false),

            TextField::new('company')
                ->setFormType(TextType::class)
                ->hideOnIndex()
                ->setRequired(isRequired: false),

            TextField::new('occupation')
                ->setFormType(TextType::class)
                ->hideOnIndex()
                ->setRequired(isRequired: false),
                
            DateTimeField::new('createdAt')->onlyOnIndex(),
        ];
    }
}
