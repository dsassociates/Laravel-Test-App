<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class LoginTest extends TestCase
{
use RefreshDatabase;

    /** @test */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_user_can_login_with_correct_credentials()
    {

        $user= User::factory()->create();
        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/company');

        $response->assertStatus(200);
    }
}
