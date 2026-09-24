<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    public function test_valid_login(): void { $u=User::factory()->create(['email'=>'admin@example.com','password'=>bcrypt('secret')]); $this->post('/login',['email'=>$u->email,'password'=>'secret'])->assertRedirect('/dashboard'); $this->assertAuthenticatedAs($u); }
    public function test_invalid_login_rejected(): void { User::factory()->create(['email'=>'admin@example.com','password'=>bcrypt('secret')]); $this->from('/login')->post('/login',['email'=>'admin@example.com','password'=>'wrong'])->assertSessionHasErrors('email'); $this->assertGuest(); }
    public function test_unauthenticated_cannot_access_management(): void { $this->get('/fabrics')->assertRedirect('/login'); $this->get('/fabric-groups')->assertRedirect('/login'); $this->get('/lay-models')->assertRedirect('/login'); }
    public function test_logout(): void { $u=User::factory()->create(); $this->actingAs($u)->post('/logout')->assertRedirect('/login'); $this->assertGuest(); }
}
