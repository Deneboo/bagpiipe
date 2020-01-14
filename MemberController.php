<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class MemberController extends AbstractController
{
    /**
     * @Route("/musicien", name="musicien")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function listMusicien(Environment $twig)
    {
        $content = $twig->render('pages/members/musicien.html.twig');
        return new Response($content);
    }
}