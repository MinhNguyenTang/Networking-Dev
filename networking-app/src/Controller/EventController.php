<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    #[Route('/event/subscribe', name: 'app_subscribe_event', methods: ['POST'])]
    public function subscribe(
        Request $request,
        EntityManagerInterface $em,
    ): Response
    {
        $user = $this->getUser();

        $user->addEventSubscription($event);

        $em->persist($user);
        $em->flush();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }
}
