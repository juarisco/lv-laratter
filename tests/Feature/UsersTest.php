<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class UsersTest extends TestCase
{
    use DatabaseTransactions, InteractsWithDatabase;

    function test_can_see_user_page()
    {
        $user = factory(User::class)->create();

        // $response = $this->get($user->name);
        // $response->assertSee($user->name);
        $response = $this->get($user->username);
        $response->assertSee($user->username);
    }

    function test_can_login()
    {
        $user = factory(User::class)->create();

        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        // $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
    }

    function test_can_follow()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        $response = $this->actingAs($user)->post($other->username . '/follow');

        $this->assertDatabaseHas('followers', [
            'user_id' => $user->id,
            'followed_id' => $other->id
        ]);
    }
}
