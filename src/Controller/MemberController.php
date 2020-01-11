<?php

namespace App\Controller;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{
    /**
     * @Route("/musicien", name="musicien")
     * @param Member $member
     * @return Response
     */
      public function listMusicien(Member $member)
        {
            $member = $this->getDoctrine()->getRepository(Member::class);
            return $this->render('', [
                    'member' => $member->findBy(['memberName' => 'Toublanc'])
              ]);

        }
    /*

             public function listMusicien(UserRepository $userRepository)
        {
            $userRepository = $this->getDoctrine()->getRepository(User::class);

            return $this->render('pages/members/musicien.html.twig', [
                    'users' => $userRepository->findBy(['username' => 'Deneboo'])
                ]);

        }
*/
}