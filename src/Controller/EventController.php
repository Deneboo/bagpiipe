<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Form\AdressType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class EventController extends AbstractController
{
    /**
     * @Route("/pages/actu/", name="list_news", methods={"GET"})
     * @param EventRepository $eventRepository
     * @return Response
     */
    public function listNews(EventRepository $eventRepository)
    {
        return $this->render('pages/event/news.html.twig', [
            'events' => $eventRepository->findAll()
        ]);
    }
}

