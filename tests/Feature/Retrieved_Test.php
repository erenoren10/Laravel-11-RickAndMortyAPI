<?php

namespace Tests\Feature;

# use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Retrieved_Test extends TestCase
{
    # use RefreshDatabase;

    /** @test */
    public function characters_can_be_retrieved_from_api()
    {
   
        $response = $this->get('/api/characters');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => ['id', 'name', 'status', 'species', 'type', 'gender','origin_name','origin_url','location_name','location_url', 'image','episode','url','created', 'created_at', 'updated_at'],
        ]);
    }


    /** @test */
    public function locations_can_be_retrieved_from_api()
    {
   
        $response = $this->get('/api/locations');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => ['id', 'name', 'type', 'dimension','residents','url', 'created', 'created_at', 'updated_at'],
        ]);
    }

    /** @test */
    public function episodes_can_be_retrieved_from_api()
    {
   
        $response = $this->get('/api/episodes');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => ['id', 'name', 'air_date', 'episode','characters','url', 'created', 'created_at', 'updated_at'],
        ]);
    }

    /** @test */
    public function single_character_can_be_retrieved_from_api()
    {
        $response = $this->get('/api/characters/1');

        $response->assertStatus(200);

        $response->assertJsonStructure(['id', 'name', 'status', 'species', 'type', 'gender','origin_name','origin_url','location_name','location_url', 'image','episode','url','created', 'created_at', 'updated_at']);
    }


    /** @test */
    public function single_location_can_be_retrieved_from_api()
    {
        $response = $this->get('/api/locations/1');

        $response->assertStatus(200);

        $response->assertJsonStructure(['id', 'name', 'type', 'dimension','residents','url', 'created', 'created_at', 'updated_at']);
    }

    /** @test */
    public function single_episodes_can_be_retrieved_from_api()
    {
        $response = $this->get('/api/episodes/1');

        $response->assertStatus(200);

        $response->assertJsonStructure(['id', 'name', 'episode','url', 'created', 'created_at', 'updated_at']);
    }

    /** @test */
    public function character_not_found_if_id_invalid()
    {
        $response = $this->get('/api/characters/999999');

        $response->assertStatus(404);
    }
}
