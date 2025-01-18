<?php

namespace App\Tests\Service;

use App\Service\PokemonApiService;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class PokemonApiServiceTest extends TestCase
{
    public function testFetchData(): void
    {
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getStatusCode')->willReturn(200);
        $responseMock->method('toArray')->willReturn([
            [
                "id" => "dp3-1",
                "name" => "Ampharos",
                "types" => ["Lightning"]
            ]
        ]);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpClientMock->method('request')->willReturn($responseMock);

        $service = new PokemonApiService('https://api.pokemontcg.io/v2', 'general-api-key', $httpClientMock);

        $result = $service->fetchData('cards');
        $this->assertIsArray($result);
        $this->assertEquals('Ampharos', $result[0]['name']);
    }
}
