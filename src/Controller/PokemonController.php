<?php

namespace App\Controller;

use App\Service\PokemonApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class PokemonController extends AbstractController
{
    private PokemonApiService $pokemonApiService;

    public function __construct(PokemonApiService $pokemonApiService)
    {
        $this->pokemonApiService = $pokemonApiService;
    }

    #[Route('/', name: 'home')]
    public function index()
    {
        $cards = $this->pokemonApiService->fetchData('cards', [
            'query' => [
                'pageSize' => 24
            ]
        ]);

        return $this->render('pokemon/index.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route('/pokemon/{id}', name: 'details')]
    public function details(string $id)
    {
        $card = $this->pokemonApiService->fetchData('cards/' . $id);

        return $this->render('pokemon/details.html.twig', [
            'card' => $card,
        ]);
    }
}
