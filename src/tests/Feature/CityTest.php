<?php

namespace Tests\Feature;

use App\Models\City;
use Tests\TestCase;

class CityTest extends TestCase
{
    public function testCityCallResponse()
    {
        $result = ['parameter' => 'response'];

        $this->mock(City::class)
            ->shouldReceive('where')
            ->with('name', 'like', 'london%')
            ->andReturnSelf()
            ->shouldReceive('get')
            ->andReturnSelf()
            ->shouldReceive('toArray')
            ->andReturn($result);

        $response = $this->get('/city?city=london');

        $response->assertStatus(200);
        $this->assertEquals($result, $response->json());
    }
}
