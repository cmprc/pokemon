<?php

namespace App\Tests\Service;

use App\Service\PokemonApiService;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class PokemonApiServiceTest extends TestCase
{
    // public function testFetchDataReturnsArray(): void
    // {
    //     $responseMock = $this->createMock(ResponseInterface::class);
    //     $responseMock->method('getStatusCode')->willReturn(200);
    //     $responseMock->method('toArray')->willReturn(['name' => 'Pikachu']);

    //     $httpClientMock = $this->createMock(HttpClientInterface::class);
    //     $httpClientMock->method('request')->with(
    //         'GET',
    //         'https://api.pokemontcg.io/v2/cards/xy7-54',
    //         $this->callback(function ($options) {
    //             return isset($options['headers']['x-Api-Key']) && $options['headers']['x-Api-Key'] === 'key';
    //         })
    //     )->willReturn($responseMock);

    //     $service = new PokemonApiService('https://api.pokemontcg.io/v2', 'key', $httpClientMock);

    //     $result = $service->fetchData('/cards/xy7-54');
    //     dd($result);

    //     $this->assertIsArray($result);
    //     // $this->assertArrayHasKey('name', $result);
    //     // $this->assertEquals('Pikachu', $result['name']);
    // }

    // public function testFetchDataThrowsExceptionOnError(): void
    // {
    //     $this->expectException(\Exception::class);
    //     $this->expectExceptionMessage('Failed to fetch data from Pokémon API: 404');

    //     $responseMock = $this->createMock(ResponseInterface::class);
    //     $responseMock->method('getStatusCode')->willReturn(404);

    //     $httpClientMock = $this->createMock(HttpClientInterface::class);
    //     $httpClientMock->method('request')->willReturn($responseMock);

    //     $service = new PokemonApiService('https://api.pokemontcg.io/v2', 'test-api-key', $httpClientMock);

    //     $service->fetchData('/cards/invalid-id');
    // }
}
