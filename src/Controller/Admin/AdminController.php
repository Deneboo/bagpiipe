<?php

namespace App\Controller\Admin;

use App\Repository\EventRepository;
use App\Repository\MemberRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     * @param EventRepository $eventRepository
     * @param MemberRepository $memberRepository
     * @return Response
     */
    public function index(EventRepository $eventRepository, MemberRepository $memberRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'events' => $eventRepository->findAll(),
            'members' => $memberRepository->findBy([
                'member_statut' => 'Musicien'
            ]),
        ]);
    }

    /**
     * @Route("/dashboard", name="dashboard")
     * @param Request $request
     * @param UserInterface $user
     * @return Response
     */
    public function index2(Request $request, UserInterface $user)
    {
        return new Response(sprintf('Hello %s', $user->getUsername()));
    }
}
