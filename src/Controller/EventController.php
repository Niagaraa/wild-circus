<?php


namespace App\Controller;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/details/{id}", name="event_details")
     */

    public function show(Event $event):Response
    {
        return $this->render('home/event_details.html.twig', [
            'event' => $event
        ]);
    }

}
