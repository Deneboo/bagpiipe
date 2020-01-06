<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{
    /**
     * @Route("/", name="home")
     * @param Environment $twig
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(Environment $twig)
    {
        $content = $twig->render('pages/home.html.twig');
        return new Response($content);
    }

        /**
     * @Route("/about", name="about")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function about(Environment $twig)
    {
        // Initialisation de l'objet twig
        $content = $twig->render('pages/about.html.twig');
        return new Response($content);

    }

    /**
     * @Route("/ecole", name="school")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function school(Environment $twig)
    {
        // Initialisation de l'objet twig
        $content = $twig->render('pages/school.html.twig');
        return new Response($content);

    }

        /**
     * @Route("/prestation", name="hireus")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function hireus(Environment $twig)
    {
        // Initialisation de l'objet twig
        $content = $twig->render('pages/hireus.html.twig');
        return new Response($content);
    }

    /**
     * @Route("/test", name="test")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function test(Environment $twig)
    {
        // Initialisation de l'objet twig
        $content = $twig->render('pages/test.html.twig');
        return new Response($content);
    }

    /**
     * @Route("/instruments", name="instruments")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function instruments(Environment $twig)
    {
        $content = $twig->render('pages/instruments.html.twig');
        return new Response($content);
    }

    /**
     * @Route("/music", name="music")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function music(Environment $twig)
    {
        $content = $twig->render('pages/music.html.twig');
        return new Response($content);
    }

    /**
     * @Route("/pipeband", name="pipeband")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function pipeband(Environment $twig)
    {
        $content = $twig->render('pages/pipeband.html.twig');
        return new Response($content);
    }

    /**
     * @Route("/uniform", name="uniform")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function uniform(Environment $twig)
    {
        $content = $twig->render('pages/uniform.html.twig');
        return new Response($content);
    }
}
