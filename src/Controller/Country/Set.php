<?php

namespace App\Controller\Country;

use App\Service\Statistic\Country\Set\BaseInterface as SetVisitFromCountryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class Set extends AbstractController
{
    public function __construct(
        private readonly SetVisitFromCountryInterface $setter,
    )
    {
    }

    #[Route('/country', name: 'country_set', methods: ['POST'])]
    public function __invoke(): JsonResponse
    {
        try {
            $this->setter->set();
            return new JsonResponse();
        } catch (\Throwable $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage(),
            ], 400);
        }
    }
}