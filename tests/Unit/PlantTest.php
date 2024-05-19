<?php

namespace Tests\Unit;

use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlantTest extends TestCase
{
    use RefreshDatabase;

    public function testPlantCreation()
    {
        $plant = Plant::factory()->create([
            'name' => 'Rose',
            'description' => 'A beautiful flower',
            'price' => 100,
            'stock' => 10,
            'category_id' => 1,
        ]);

        $this->assertEquals('Rose', $plant->name);
        $this->assertEquals('A beautiful flower', $plant->description);
        $this->assertEquals(100, $plant->price);
        $this->assertEquals(10, $plant->stock);
        $this->assertEquals(1, $plant->category_id);
    }

    public function testPlantValidation()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $data = [
            'name' => '',
            'description' => '',
            'price' => -1,
            'stock' => -1,
            'category_id' => null,
        ];

        Plant::validate(request()->merge($data));
    }
}
