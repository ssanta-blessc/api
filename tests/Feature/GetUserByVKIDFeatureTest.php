<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetUserByVKIDFeatureTest extends TestCase
{
    private function prepareDB(): void
    {
        $this->artisan('db:wipe');
        $this->artisan('migrate');
    }

    private function prepareUser(): void
    {
        $this->prepareDB();

        $this->post('/api/user', [
            'name' => 'Test',
            'vkid' => 1
        ]);
    }

    public function test_get_user_by_vkid(): void
    {
        $this->prepareUser();

        $response = $this->get('/api/user/vkid/1');

        $response->assertJsonFragment([
            'status' => 200
        ]);
    }

    public function test_get_user_by_vkid_fail_validation(): void
    {
        $response = $this->get('/api/user/vkid/test');

        $response->assertJsonFragment([
            'status' => 422
        ]);
    }


    public function test_get_user_by_vkid_fail_user(): void
    {
        $response = $this->get('/api/user/vkid/2');

        $response->assertJsonFragment([
            'status' => 422
        ]);
    }


}
