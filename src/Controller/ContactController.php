<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="contact_")
 */
class ContactController extends AbstractController
{

    /**
     * @Route("/send-email/{slug}", name="send_email")
     */
    public function sendEmail(Page $page, Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $contactForm = $this->createForm('App\Form\ContactType', $contact);

        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData();

            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success','E-Mail wurde abgesendet!');
            return $this->redirectToRoute('contact_send_email',['slug' => $page->getSlug()]);
        }


        return $this->render('page/show.html.twig',[
            'page' => $page,
            'form' => $contactForm->createView()
        ]);

    }

}
