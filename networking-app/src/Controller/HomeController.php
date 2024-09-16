<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        
        return $this->render('home/index.html.twig');
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
