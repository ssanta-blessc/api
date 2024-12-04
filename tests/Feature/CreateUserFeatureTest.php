<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateUserFeatureTest extends TestCase
{
    public function test_create_user(): void
    {
        $response = $this->post('/api/user', ['name' => 'Test']);

        $response->assertStatus(200);
    }

    public function test_create_user_without_name(): void
    {
        $response = $this->post('/api/user');

        $response->assertStatus(422);
    }
}
