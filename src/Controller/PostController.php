<?php

namespace App\Controller;
use App\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $blogs=$this->getDoctrine()->getRepository(Posts::class)->findAll();
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'blog'=>$blogs
        ]);
    }

    public function getPost($id){

    }
}
