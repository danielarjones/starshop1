<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships/{id<\d+>}',methods:['GET','POST'])]
    public function getCollection( StarshipRepository $StarshipRepository, int $id=0): Response
    {
        dd(vars:$id);
        $starships = $StarshipRepository->findAll();

        return $this->json($starships);
    }
}