<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Comparison;
use App\Model\ComparisonResponse;
use App\Repository\ComparisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ListComparisonsController extends AbstractController
{
    public function __construct(
        private readonly ComparisonRepository $comparisonRepository,
    ) {
    }

    #[Route('/comparisons', methods: ['GET'])]
    public function __invoke(Request $request): Response
    {
        $comparisons = $this->comparisonRepository->findAll();

        $response = \array_map(
            fn(Comparison $comparison) => new ComparisonResponse($comparison),
            $comparisons,
        );

        return $this->json($response, 200);
    }
}
