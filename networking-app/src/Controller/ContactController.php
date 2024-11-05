<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Flasher\Prime\FlasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(
        EntityManagerInterface $em,
        Request $request,
    ): Response
    {
        $contact = new Contact();

        if ($this->getUser()) {
            $contact->setEmail($this->getUser()->getEmail())
                    ->setCompany($this->getUser()->getCompany())
                    ->setPhoneNumber($this->getUser()->getPhoneNumber())
                    ->setOccupation($this->getUser()->getOccupation());
        }

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $em->persist($contact);
            $em->flush();

            $this->addFlash(
                'success',
                'Votre message a bien été envoyé !');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact_form.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }
}
