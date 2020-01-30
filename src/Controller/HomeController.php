<?php


namespace App\Controller;


use App\Repository\EventRepository;
use App\Repository\TroopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index(EventRepository $eventRepository, TroopRepository $troopRepository):Response
    {
        $events = $eventRepository->findAll();
        $troops = $troopRepository->findBy([], ['id' => 'ASC'], 3);

        return $this->render('home/home.html.twig', [
            'events' => $events,
            'troops' => $troops
        ]);
    }

}
