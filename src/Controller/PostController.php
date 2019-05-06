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
        $blogs = $this->getDoctrine()->getRepository(Posts::class)->findAll();
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'blog' => $blogs,
        ]);
    }
    /**
     * @Route("/post/{id}", name="post_show")
     */

    public function getPost($id)
    {
        $post = $this->getDoctrine()
            ->getRepository(Posts::class)
            ->find($id);

        if (!$post) {
            throw $this->createNotFoundException(
                'No post found for id ' . $id
            );
        }
        return $this->render('post/show.html.twig', [
            'controller_name' => 'PostController',
            'post' => $post,
        ]);

    }
}
