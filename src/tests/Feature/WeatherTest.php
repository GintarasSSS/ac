<?php

namespace Tests\Feature;

use App\Http\Controllers\Weather;
use App\Models\City;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * @dataProvider weatherData
     */
    public function testWeatherResponse(array $parameters, int $queryResult, array $result)
    {
        $location = explode(',', $parameters['location'] ?? '');

        $this->mock(City::class)
            ->shouldReceive('where')
            ->with('name', ($location[0] ?? ''))
            ->andReturnSelf()
            ->shouldReceive('where')
            ->with('country', ($location[1] ?? ''))
            ->andReturnSelf()
            ->shouldReceive('count')
            ->andReturn($queryResult);

        Http::shouldReceive('get')
            ->times((int)($queryResult > 0))
            ->withArgs(function ($arg) {
                $url = explode('%s', Weather::APP_URL);
                return str_contains($arg, $url[0] . ($parameters['location'] ?? ''));
            })->andReturn(collect($result));

        $response = $this->get('/weather?' . http_build_query($parameters));

        $response->assertStatus(200);
        $response->assertExactJson($result);
    }

    public function weatherData(): array
    {
        return [
            'passing correct location which exist in db' => [
                'parameters' => ['location' => 'Test,TT'],
                'queryResult' => 1,
                'result' => ['test' => 'test']
            ],
            'passing in correct location' => [
                'parameters' => ['location' => 'Test'],
                'queryResult' => 0,
                'result' => ['error' => 'Wrong location passed.']
            ],
            'passing empty location parameter' => [
                'parameters' => ['location' => ''],
                'queryResult' => 0,
                'result' => ['error' => 'Wrong location passed.']
            ],
            'passing correct location which does not exist in db' => [
                'parameters' => ['location' => 'Test,TT'],
                'queryResult' => 0,
                'result' => ['error' => 'Wrong location passed.']
            ],
            'passing no parameters' => [
                'parameters' => [],
                'queryResult' => 0,
                'result' => ['error' => 'Wrong location passed.']
            ],
        ];
    }
}
