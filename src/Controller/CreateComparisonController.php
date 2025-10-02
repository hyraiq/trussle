<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Comparison;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateComparisonController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/comparisons', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        /** @var array $data */
        $data = json_decode($request->getContent(), true);

        $name = $data['name'] ?? null;

        if (is_string($name) === false || trim($name) === '') {
            return $this->json(['error' => 'Name is required'], 400);
        }

        $comparison = new Comparison($name);

        $this->entityManager->persist($comparison);
        $this->entityManager->flush();

        return $this->json([
            'id' => $comparison->getId(),
            'name' => $comparison->getName(),
        ], 201);
    }
}
