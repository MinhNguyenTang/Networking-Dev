<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('ROLE_USER')]
    public function index(UserRepository $userRepository): Response
    {
        $currentUser = $this->getUser();

        if(!$currentUser) {
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->find($this->getUser()->getId());

        if ($user !== $currentUser) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette page');
        }


        return $this->render('user/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/profile/edit/{field}', name: 'app_edit_field', methods: ['GET', 'POST'])]
    public function editField(Request $request, string $field) : Response
    {
        $form = $this->createForm(UserType::class, $user, ['field' => $field]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_profile');
        }

        return $this->render('user/edit_profile_field.html.twig', [
            'form' => $form->createView(),
            'field' => $field
        ]);
    }

    // public function deleteAccount(Request $request, EntityManagerInterface $em) : Response
    // {
    //     $user = $this->getUser();
    // }
}
