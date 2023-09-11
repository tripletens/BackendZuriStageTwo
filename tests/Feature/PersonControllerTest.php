<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;


class PersonControllerTest extends TestCase
{
    use RefreshDatabase; // This trait resets the database after each test.

    public function test_can_access_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_person()
    {
        $data = [
            'name' => 'John Doe'
        ];

        $response = $this->json('POST', '/api', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
                'message'
            ])
            ->assertJson(['data' => ['name' => 'John Doe']]);
    }

    public function test_can_fetch_all_persons()
    {
        $persons = Person::factory()->count(3)->create(); // Create multiple persons

        $response = $this->json('GET', '/api');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'message'
            ]);
    }

    public function test_can_update_person()
    {
        $person = Person::factory()->create();
        $data = [
            'name' => 'Updated Name', // Corrected attribute name to 'name'
        ];

        $response = $this->json('PUT', "/api/{$person->id}", $data); // Updated route to '/api'

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ])
            ->assertJson(['data' => ['name' => 'Updated Name']]);
    }

    public function test_can_delete_person()
    {
        $person = Person::factory()->create();

        $response = $this->json('DELETE', "/api/{$person->id}");

        $response->assertStatus(200);
    }
}
