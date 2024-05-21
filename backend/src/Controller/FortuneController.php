<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\FortuneRepository;

class FortuneController extends AbstractController
{
    #[Route('/fortune', name: 'app_fortune')]
    public function index(FortuneRepository $fortuneRepository): JsonResponse
    {
        $fortune = $fortuneRepository->pickRandom();

        if (!$fortune) {
            throw $this->createNotFoundException('No fortunes found');
        }

        return $this->json($fortune);
    }
}
