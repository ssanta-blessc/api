<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateUserFeatureTest extends TestCase
{

    private function prepareDB(): void
    {
        $this->artisan('db:wipe');
        $this->artisan('migrate');
    }


    public function test_create_user(): void
    {
        $this->prepareDB();

        $response = $this->post('/api/user', [
            'name' => 'Test',
            'vkid' => 1
        ]);

        $response->assertJsonFragment([
            'status' => 200
        ]);
    }

    public function test_create_user_without_name(): void
    {
        $response = $this->post('/api/user', ['vkid' => 2]);

        $response->assertJsonFragment([
            'status' => 422,
        ]);
    }

    public function test_create_user_without_vkid(): void
    {
        $response = $this->post('/api/user', ['name' => 'Test2']);

        $response->assertJsonFragment([
            'status' => 422,
        ]);
    }

    public function test_create_user_without_name_vkid(): void
    {
        $response = $this->post('/api/user');

        $response->assertJsonFragment([
            'status' => 422,
        ]);
    }
}
