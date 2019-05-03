<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\UserService;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $users = app(UserService::class)->store([
            "name" => "Amadeus", "email" => "amadeusMember@gmail.com", "password" => "amadeus", "user_role" => "1"
        ]);
        $this->assertDatabaseHas('users', [
            "name" => "Amadeus", "email" => "amadeusMember@gmail.com", "user_role" => "1"
        ]);
        app(UserService::class)->update([
            "name" => "Alternative", "email" => "alternativeMember@gmail.com", "password" => "alternative", "user_role" => "1"
        ], $users->id);
        $this->assertDatabaseHas('users', [
            "name" => "Alternative", "email" => "alternativeMember@gmail.com", "user_role" => "1"
        ]);
        app(UserService::class)->destroy($users->id);
        $this->assertSoftDeleted('users', [
            "name" => "Alternative", "email" => "alternativeMember@gmail.com", "password" => "alternative", "user_role" => "1"
        ]);
    }
}
