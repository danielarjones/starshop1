<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController
{

    #[Route('/starship/{id<\d+>}')]

    public function show(int $id, StarshipRepository $starshipRepository): Response
    {
        $ship = $starshipRepository->find(id: $id);
        if (!$ship) {
            throw $this->createNotFoundException(message: 'Starship not found');
        }
        return $this->render(view: '/main/show.html.twig', parameters: [
            'ship' => $ship,
        ]);
    }
}
