<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     * Method({"GET"})
     */
    public function index()
    {
        $artciles = ['Article 1', 'Article 2'];
        // return new Response('<html><body><h1>Hello</h1></body></html>');
        return $this->render('articles/index.html.twig', array(
            'articles' => $artciles
        ));
    }

    /**
     * @Route("/test")
     */
    public function index1()
    {
        return new Response('<html><body><h1>Hello</h1></body></html>');
    }

    /**
     * @Route("/article/save")
     */
    public function save()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $artcile = new Article();
        $artcile->setTitle('Article one');
        $artcile->setBody('Body for article one');

        $entityManager->persist($artcile);

        $entityManager->flush();

        return new Response('Saved an article with id of ' . $artcile->getId());
    }
}
