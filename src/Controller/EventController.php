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
     * @Route("/pages/journal/", name="list_diary", methods={"GET"})
     * @param EventRepository $eventRepository
     * @return Response
     */
    public function listDiary(EventRepository $eventRepository)
    {
        return $this->render('pages/event/diary.html.twig', [
            'events' => $eventRepository->findPastEvent()
        ]);
    }

    /**
     * @Route("/pages/actu/", name="list_actu", methods={"GET"})
     * @param EventRepository $eventRepository
     * @return Response
     */
    public function listActu(EventRepository $eventRepository)
    {
        return $this->render('pages/event/news.html.twig', [
            'events' => $eventRepository->findActu()
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

