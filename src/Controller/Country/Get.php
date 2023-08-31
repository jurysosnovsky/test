<?php

namespace App\Controller\Country;

use App\Service\Statistic\Country\Get\BaseInterface as DataAccessorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class Get extends AbstractController
{
    public function __construct(
        private readonly DataAccessorInterface $getter
    )
    {
    }

    #[Route('/country', name: 'country_get', methods: ['GET'])]
    public function _invoke(): JsonResponse
    {
        try {
            return new JsonResponse(
                $this->getter->get(),
            );
        } catch (\Throwable $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage(),
            ], 400);
        }

    }
}