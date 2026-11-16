<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('SIP');
        $response->assertSee('Area Parkir FILKOM');
    }

    public function test_area_detail_page_loads(): void
    {
        $this->seed();

        $response = $this->get('/area/filkom');
        $response->assertStatus(200);
        $response->assertSee('Area Parkir FILKOM');
        $response->assertSee('Area Ini Sedang Penuh!');

        $responseEdu = $this->get('/area/edutech');
        $responseEdu->assertStatus(200);
        $responseEdu->assertSee('Area Parkir EduTech');
    }

    public function test_recommendation_page_loads(): void
    {
        $this->seed();

        $response = $this->get('/rekomendasi');
        $response->assertStatus(200);
        $response->assertSee('Rekomendasi Area Terdekat');
    }

    public function test_map_page_loads(): void
    {
        $this->seed();

        $response = $this->get('/peta');
        $response->assertStatus(200);
        $response->assertSee('Titik Parkir Kampus UB');
    }
}
