<?php

namespace App\Tests\Controller;

use App\Service\PokemonApiService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{
    public function testCardsListPage(): void
    {
        $client = self::createClient();

        $mockedService = $this->createMock(PokemonApiService::class);
        $mockedService->method('fetchData')
            ->with('cards', ['query' => ['pageSize' => 48]])
            ->willReturn([
                [
                    "id" => "dp3-1",
                    "name" => "Ampharos",
                    "types" => ["Lightning"],
                    "weaknesses" => [
                        ["type" => "Fighting", "value" => "+30"]
                    ],
                    "resistances" => [
                        ["type" => "Metal", "value" => "-20"]
                    ],
                    "attacks" => [
                        [
                            "name" => "Cluster Bolt",
                            "cost" => ["Lightning", "Lightning", "Colorless"],
                            "damage" => "70",
                            "text" => "You may discard all Lightning Energy attached to Ampharos. If you do, this attack does 20 damage to each of your opponent's Benched Pokémon."
                        ]
                    ],
                    "images" => [
                        "small" => "https://images.pokemontcg.io/dp3/1.png",
                        "large" => "https://images.pokemontcg.io/dp3/1_hires.png"
                    ]
                ],
                [
                    "id" => "dp3-2",
                    "name" => "Bulbasaur",
                    "types" => ["Grass"],
                    "weaknesses" => [
                        ["type" => "Fire", "value" => "+10"]
                    ],
                    "resistances" => [],
                    "attacks" => [
                        [
                            "name" => "Vine Whip",
                            "cost" => ["Grass", "Colorless"],
                            "damage" => "30",
                            "text" => ""
                        ]
                    ],
                    "images" => [
                        "small" => "https://images.pokemontcg.io/dp3/2.png",
                        "large" => "https://images.pokemontcg.io/dp3/2_hires.png"
                    ]
                ]
            ]);

        $client->getContainer()->set(PokemonApiService::class, $mockedService);

        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('.pokemon-name', 'Ampharos');
    }

    public function testCardDetailsPage(): void
    {
        $client = self::createClient();

        $mockedService = $this->createMock(PokemonApiService::class);
        $mockedService->method('fetchData')
            ->with('cards/dp3-1')
            ->willReturn([
                "id" => "dp3-1",
                "name" => "Ampharos",
                "types" => ["Lightning"],
                "weaknesses" => [
                    ["type" => "Fighting", "value" => "+30"]
                ],
                "resistances" => [
                    ["type" => "Metal", "value" => "-20"]
                ],
                "attacks" => [
                    [
                        "name" => "Cluster Bolt",
                        "cost" => ["Lightning", "Lightning", "Colorless"],
                        "damage" => "70",
                        "text" => "You may discard all Lightning Energy attached to Ampharos. If you do, this attack does 20 damage to each of your opponent's Benched Pokémon."
                    ]
                ],
                "images" => [
                    "small" => "https://images.pokemontcg.io/dp3/1.png",
                    "large" => "https://images.pokemontcg.io/dp3/1_hires.png"
                ]
            ]);

        $client->getContainer()->set(PokemonApiService::class, $mockedService);

        $client->request('GET', '/pokemon/dp3-1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ampharos');
        $this->assertSelectorExists('img[src="https://images.pokemontcg.io/dp3/1_hires.png"]');
    }

    public function testCardsListPageWithNoResults(): void
    {
        $client = self::createClient();

        $mockedService = $this->createMock(PokemonApiService::class);
        $mockedService->method('fetchData')
            ->with('cards', ['query' => ['pageSize' => 48]])
            ->willReturn([]);

        $client->getContainer()->set(PokemonApiService::class, $mockedService);

        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('.no-results', 'Nenhum Pokémon encontrado');
    }
}
