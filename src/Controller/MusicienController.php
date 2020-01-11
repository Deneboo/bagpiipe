<?php

namespace App\Controller;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicienController extends AbstractController
{
    /**
     * @Route("/musicien", name="musicien")
     * @param MemberRepository $memberRepository
     * @return Response
     */
    public function listMusicien(MemberRepository $memberRepository)
    {
        $memberRepository = $this->getDoctrine()->getRepository(Member::class);

        return $this->render('pages/members/musicien.html.twig', [
            'members' => $memberRepository->findBy(['member_statut' => 'Musicien'])
        ]);

    }
}