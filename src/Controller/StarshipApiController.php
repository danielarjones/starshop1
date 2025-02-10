<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $StarshipRepository, int $id = 0): Response
    {
        $starships = $StarshipRepository->findAll();

        return $this->json($starships);
    }
    #[Route('/{id<\d+>}', methods:['GET'])]
    public function get(int $id,StarshipRepository $repository)
    {
        $starship = $repository->find(id: $id);
        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }
        return $this->json($starship);
    }
}
