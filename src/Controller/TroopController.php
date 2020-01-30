<?php


namespace App\Controller;

use App\Repository\TroopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TroopController extends AbstractController
{
    /**
     * @Route("/troupe", name="troop_list")
     */

    public function list(TroopRepository $troopRepository):Response
    {
        $troops = $troopRepository->findAll();

        return $this->render('home/troop_list.html.twig', [
            'troops' => $troops
        ]);
    }

}
