<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    private $token;

    public function __construct(CsrfTokenManagerInterface $token)
    {
        $this->token = $token;
    }

    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function index(AuthenticationUtils $authenticationUtils, Security $security): Response
    {
        if ($security->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $csrfToken = $this->token->getToken('authenticate')->getValue();

        return $this->render('security/login_form.html.twig', [
            'last_username' => $lastUsername,
            'csrf_token' => $csrfToken,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(Security $security) : Response 
    {
        $response = $security->logout();
        return $this->redirectToRoute('app_home');
    }

    #[Route('/registration', name: 'app_registration', methods: ['GET', 'POST'])]
    public function registration(
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        Security $security,
        Request $request
        ) : Response
    {
        if ($security->getUser()) {
            return $this->redirectToRoute('app_home');
        }
        
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $user->getPassword();
            $hashedPassword = $hasher->hashPassword(
                $user,
                $password
            );

            $user = $form->getData();
            $user->setPassword($hashedPassword);
            $user->setRoles(['ROLE_USER']);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('security/registration_form.html.twig', [
            'registration_form' => $form->createView(),
        ]);
    }
}
