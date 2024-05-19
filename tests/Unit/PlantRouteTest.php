<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlantRouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para la ruta de listado de plantas.
     */
    public function testPlantIndexRoute(): void
    {
        $response = $this->get('/plants');

        $response->assertStatus(200);
        $response->assertViewIs('plant.index');
    }

    public function testPlantSearchRoute(): void
    {
        $response = $this->get('/plants/search');

        $response->assertStatus(200);
        $response->assertViewIs('plant.index');
    }
}
