<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Home extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $response = $this->client->request('GET', 'https://api.pokemontcg.io/v2/cards', [
            'query' => [
                'pageSize' => '24'
            ],
        ]);
        $cards = $response->toArray();

        if ($response->getStatusCode() === 200) {
            $cards = $cards['data'];
        } else {
            throw $this->createNotFoundException('There was an error fetching the cards.');
        }

        return $this->render('home/index.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(string $id): Response
    {
        $response = $this->client->request('GET', "https://api.pokemontcg.io/v2/cards/$id");
        $card = $response->toArray()['data'];

        return $this->render('home/details.html.twig', [
            'card' => $card,
        ]);
    }
}