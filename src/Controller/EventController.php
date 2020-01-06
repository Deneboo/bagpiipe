<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    /**
     * @Route("/pages/event/{id}", name="event_detail", methods={"GET"})
     * @param Event $event
     * @return Response
     */
    public function show(Event $event): Response
    {
        return $this->render('pages/event/detail.html.twig', [
            'event' => $event,
        ]);
    }
}

