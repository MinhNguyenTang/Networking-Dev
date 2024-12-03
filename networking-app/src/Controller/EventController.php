<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    #[Route('/event/subscribe', name: 'app_subscribe_event', methods: ['POST'])]
    public function subscribe(
        EventRepository $eventRepository,
        Request $request,
        EntityManagerInterface $em,
    ): Response
    {
        $user = $this->getUser();
        $eventId = $request->request->get('event_id');
        $event = $eventRepository->find($eventId);

        $user->addEventSubscription($event);

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('app_home'); 
    }
    #[Route('/all_events', name: 'app_all_events', methods: ['GET'])]
    public function allEvents(
        EventRepository $eventRepository, 
        PaginatorInterface $paginator,
        Request $request): Response
    {
        $allEvents = $eventRepository->findBy([], ['date' => 'desc']);
        $paginatedEvents = $paginator->paginate(
            $allEvents,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('event/event_list.html.twig', compact('paginatedEvents'));
    }

    #[Route('/event/?{id}', name: 'app_event_details', methods: ['GET'])]
    public function eventDetails(
        EventRepository $eventRepository,
        Event $eventDetails
        ): Response
    {
        $lastestEvents = $eventRepository->findBy([], ['date' => 'desc'], 3);
        return $this->render('event/event_details.html.twig', compact('eventDetails', 'lastestEvents'));
    }
}
