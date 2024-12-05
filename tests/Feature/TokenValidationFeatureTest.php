<?php

namespace Tests\Feature;

use Tests\TestCase;

class TokenValidationFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_validation(): void
    {
        $response = $this->post('/api/auth/check', [
            'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXlsb2FkIjp7InZraWQiOjEsIm5hbWUiOiJhYm9iYSIsImlkIjozfX0.WMyqwL69Aots1c3InjYinA0QhX4gAXXQI7Og0FgQJxE'
        ]);

        $response->assertJsonFragment([
            'status' => 200
        ]);
    }

    public function test_validation_with_invalid_token(): void
    {
        $response = $this->post('/api/auth/check', [
            'token' => 'invalid token'
        ]);

        $response->assertJsonFragment([
            'status' => 422
        ]);
    }
}
