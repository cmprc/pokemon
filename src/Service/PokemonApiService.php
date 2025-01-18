<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokemonApiService
{
    private string $baseUrl;
    private string $apiKey;
    private HttpClientInterface $httpClient;

    public function __construct(string $pokemonApiBaseUrl, string $pokemonApiKey, HttpClientInterface $httpClient)
    {
        $this->baseUrl = $pokemonApiBaseUrl;
        $this->apiKey = $pokemonApiKey;
        $this->httpClient = $httpClient;
    }

    public function fetchData(string $endpoint, array $options = []): array
    {
        $url = $this->baseUrl . '/' . $endpoint;

        $response = $this->httpClient->request('GET', $url, [
            'headers' => [
                'x-Api-Key' => $this->apiKey,
            ],
            ...$options,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from Pokémon API: ' . $response->getStatusCode());
        }

        return $response->toArray()['data'] ?? $response->toArray();
    }
}
