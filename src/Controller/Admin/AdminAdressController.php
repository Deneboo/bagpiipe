<?php

namespace App\Controller\Admin;

use App\Entity\Adress;
use App\Form\AdressType;
use App\Repository\AdressRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/adress")
 */
class AdminAdressController extends AbstractController
{
    /**
     * @Route("/", name="adress_index", methods={"GET"})
     * @param AdressRepository $adressRepository
     * @return Response
     */
    public function index(AdressRepository $adressRepository): Response
    {
        return $this->render('admin/adress/index.html.twig', [
            'adresses' => $adressRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="adress_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $adress = new Adress();
        $form = $this->createForm(AdressType::class, $adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adress);
            $entityManager->flush();

            return $this->redirectToRoute('adress_index');
        }

        return $this->render('admin/adress/new.html.twig', [
            'adress' => $adress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adress_show", methods={"GET"})
     * @param Adress $adress
     * @return Response
     */
    public function show(Adress $adress): Response
    {
        return $this->render('admin/adress/show.html.twig', [
            'adress' => $adress,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adress_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Adress $adress
     * @return Response
     */
    public function edit(Request $request, Adress $adress): Response
    {
        $form = $this->createForm(AdressType::class, $adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adress_index');
        }

        return $this->render('admin/adress/edit.html.twig', [
            'adress' => $adress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adress_delete", methods={"DELETE"})
     * @param Request $request
     * @param Adress $adress
     * @return Response
     */
    public function delete(Request $request, Adress $adress): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adress->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adress);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adress_index');
    }
}
