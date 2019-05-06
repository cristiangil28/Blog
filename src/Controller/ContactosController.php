<?php

namespace App\Controller;

use App\Entity\Contactos;
use App\Form\ContactosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contactos")
 */
class ContactosController extends AbstractController
{
    /**
     * @Route("/", name="contactos_index", methods={"GET"})
     */
    public function index(): Response
    {
        $contactos = $this->getDoctrine()
            ->getRepository(Contactos::class)
            ->findAll();

        return $this->render('contactos/index.html.twig', [
            'contactos' => $contactos,
        ]);
    }

    /**
     * @Route("/new", name="contactos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contacto = new Contactos();
        $form = $this->createForm(ContactosType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();

            return $this->redirectToRoute('contactos_new');
        }

        return $this->render('contactos/new.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactos_show", methods={"GET"})
     */
    public function show(Contactos $contacto): Response
    {
        return $this->render('contactos/show.html.twig', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contactos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contactos $contacto): Response
    {
        $form = $this->createForm(ContactosType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contactos_index', [
                'id' => $contacto->getId(),
            ]);
        }

        return $this->render('contactos/edit.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contactos $contacto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contacto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contactos_index');
    }
}
