<?php

namespace App\Controller;

use Ramsey\Uuid\Uuid;
use App\Repository\EventRepository;
use Flasher\Prime\FlasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        $lastEvent = $eventRepository->findOneBy([], ['id' => 'desc']);
        $events = $eventRepository->findBy([], ['id' => 'desc'], 6);
        return $this->render('home/index.html.twig', compact('lastEvent', 'events'));
    }

    #[Route('/who-are-we', name: 'app_who', methods: ['GET'])]
    public function who(): Response
    {
        return $this->render('home/who.html.twig');
    }

    #[Route('/blog', name: 'app_blog', methods: ['GET'])]
    public function blog(): Response
    {
        return $this->render('home/blog.html.twig');
    }

    #[Route('/faq', name: 'app_faq', methods: ['GET'])]
    public function faq(): Response
    {
        return $this->render('home/faq.html.twig');
    }

    #[Route('/terms-of-use', name: 'app_use', methods: ['GET'])]
    public function use(): Response
    {
        return $this->render('home/use.html.twig');
    }

    #[Route('/legal-notices', name: 'app_legal', methods: ['GET'])]
    public function legal(): Response
    {
        return $this->render('home/legal.html.twig');
    }

    #[Route('/privacy-policy', name: 'app_privacy', methods: ['GET'])]
    public function privacy(): Response
    {
        return $this->render('home/privacy.html.twig');
    }
}
