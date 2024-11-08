<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserEmailType;
use App\Form\UserCompanyType;
use App\Form\UserFullNameType;
use App\Form\UserPasswordType;
use App\Form\UserOccupationType;
use App\Form\UserPhoneNumberType;
use App\Repository\UserRepository;
use App\Repository\EventRepository;
use Flasher\Prime\FlasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function index(
        Request $request,
        EntityManagerInterface $em,
        UserRepository $userRepository,
        UserPasswordHasherInterface $hasher
        ): Response
    {
        $currentUser = $this->getUser();

        if(!$currentUser) {
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->find($this->getUser()->getId());

        if ($user !== $currentUser) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette page');
        }

        $forms = [];
        $fields = ['fullName', 'email', 'phoneNumber', 'password', 'company', 'occupation'];

        foreach ($fields as $field) {
            switch ($field) {
                case 'fullName':
                    $form = $this->createForm(UserFullNameType::class, $user);
                    break;
                case 'email':
                    $form = $this->createForm(UserEmailType::class, $user);
                    break;
                case 'phoneNumber':
                    $form = $this->createForm(UserPhoneNumberType::class,$user);
                    break;
                case 'password':
                    $form = $this->createForm(UserPasswordType::class, $user);
                    break;
                case 'company':
                    $form = $this->createForm(UserCompanyType::class, $user);
                    break;
                case 'occupation':
                    $form = $this->createForm(UserOccupationType::class, $user);
                    break;
                default:
                throw $this->createNotFoundException('Champs non trouvé');
            }
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                if ($field === 'password' && $form->get('password')->getData()) {
                    $hashed = $hasher->hashPassword($user, $user->getPassword());
                    $user->setPassword($hashed);

                    $dateUpdate = new \DateTimeImmutable();
                    $user->setUpdatedAt($dateUpdate);
                }
                $em->flush();
                $this->addFlash(
                    'success',
                    ucfirst($field) . ' updated !'
                );
    
                return $this->redirectToRoute('app_profile');
            }
    
            $forms[$field] = $form->createView();
        }


        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'forms' => $forms
        ]);
    }

    #[Route('/delete', name: 'app_delete_account', methods: ['POST'])]
    public function deleteAccount(
        Request $request,
        EntityManagerInterface $em,
        CsrfTokenManagerInterface $token,
    ) : Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw new AccessDeniedException('You are not allowed to access this page.');
        }

        $csrfToken = $request->request->get('_csrf_token');
        if (!$token->isTokenValid(new CsrfToken('delete_account', $csrfToken))) {
            throw new AccessDeniedException('Invalid CSRF token.');
        }

        $em->remove($user);
        $em->flush();

        $this->container->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();
        
        return $this->redirectToRoute('app_home');
    }

    #[Route('/upcoming_events', name: 'app_upcoming_events', methods: ['GET'])]
    public function upcomingEvents(EventRepository $eventRepository) : Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $subscribedEvents = $user->getEventSubscription();
        return $this->render('user/upcoming_events.html.twig', compact('subscribedEvents'));
    }

    #[Route('/notifications', name: 'app_notifications', methods: ['GET'])]
    public function notifications() : Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/notifications.html.twig');
    }

    #[Route('/passed_events', name: 'app_passed_events', methods: ['GET'])]
    public function passedEvents() : Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/passed_events.html.twig');
    }

}
