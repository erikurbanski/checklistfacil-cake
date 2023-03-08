<?php

namespace Tests\Unit;

use App\Models\Cake;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CakeTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    public function test_createCakeData()
    {
        $cakesList = Cake::factory(10)->create();

        $this
            ->json('GET', route('cakes.index'), ['Accept' => 'application/json'])
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');
    }

    public function test_createCakeWithoutData()
    {
        $cakeData = [
            'name_cake' => '',
            'weight_cake' => '',
            'value' => '',
            'quantity' => ''
        ];

        $this
            ->json('POST', route('cakes.store'), $cakeData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The name cake field is required. (and 3 more errors)",
                    "errors" => [
                        "quantity" => ["The quantity field is required."],
                        "quantity" => ["The weight cake field is required."],
                        "quantity" => ["The value field is required."],
                        "quantity" => ["The quantity field is required."]
                    ]
                ]
            );
    }

    public function test_ShowCake()
    {
        Cake::factory()->create();
        $cake = Cake::latest()->first();

        $this
            ->getJson(route('cakes.show', ['cake' => $cake->id]))
            ->assertStatus(200)
            ->assertJson(
                [
                    "success" => true
                ]
            );
    }

    public function test_dontShowCake()
    {
        Cake::factory(1)->create();

        $this
            ->getJson(route('cakes.show', ['cake' => 2]))
            ->assertStatus(404)
            ->assertNotFound();
    }

    public function test_deleteCake()
    {
        Cake::factory(2)->create();
        $cake = Cake::first();

        $this->deleteJson(route('cakes.destroy', ['cake' => $cake->id]))
            ->assertNoContent();
    }

    public function test_deleteCakeNotExists()
    {
        Cake::factory(2)->create();

        $this->deleteJson(route('cakes.destroy', ['cake' => 1]))
            ->assertStatus(204)
            ->assertNoContent();
    }
}
