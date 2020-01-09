<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Event;
use App\Form\EventType;
use App\Form\AdressType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     * @param EventRepository $eventRepository
     * @return Response
     */
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'events' => $eventRepository->findAll(),
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
