<?php

namespace Tests\Unit;

use App\Models\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ClientTest extends TestCase
{
    public function test_createClientData()
    {
        $ClientsList = Client::factory(10)->create();

        $this
            ->json('GET', route('clients.index'), ['Accept' => 'application/json'])
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');
    }

    public function test_createClientWithoutData()
    {
        $ClientData = [
            'cake_id' => '',
            'name_client' => '',
            'email_client' => '',
            'email_sent' => ''
        ];

        $this
            ->json('POST', route('clients.store'), $ClientData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The cake id field is required. (and 3 more errors)",
                    "errors" => [
                        "cake_id" => ["The cake id field is required."],
                        "name_client" => ["The name client field is required."],
                        "email_client" => ["The email client field is required."],
                        "email_sent" => ["The email sent field is required."]
                    ]
                ]
            );
    }

    public function test_ShowClient()
    {
        Client::factory()->create();
        $Client = Client::latest()->first();

        $this
            ->getJson(route('clients.show', ['client' => $Client->id]))
            ->assertStatus(200)
            ->assertJson(
                [
                    "success" => true
                ]
            );
    }

    public function test_deleteClient()
    {
        Client::factory(2)->create();
        $client = Client::first();

        $this->deleteJson(route('clients.destroy', ['client' => $client->id]))
            ->assertNoContent();
    }

    public function test_deleteClientNotExists()
    {
        $client = Client::factory(2)->create();

        $this->deleteJson(route('clients.destroy', ['client' => 30000]))
            ->assertStatus(204)
            ->assertNoContent();
    }

}
