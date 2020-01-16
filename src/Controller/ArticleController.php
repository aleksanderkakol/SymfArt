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
     * @Route("/", name="article_list")
     * Method({"GET"})
     */
    public function index()
    {
        $artciles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig', array(
            'articles' => $artciles
        ));
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */

    public function show($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('articles/show.html.twig', array('article' => $article));
    }

    // /**
    //  * @Route("/article/save")
    //  */
    // public function save()
    // {
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $artcile = new Article();
    //     $artcile->setTitle('Article one');
    //     $artcile->setBody('Body for article one');

    //     $entityManager->persist($artcile);

    //     $entityManager->flush();

    //     return new Response('Saved an article with id of ' . $artcile->getId());
    // }
}
