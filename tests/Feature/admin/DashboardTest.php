<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function test_admin_menu()
    {
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));
        $this->assertAuthenticated();
        $this->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSee('<li class="nav-item dropdown admin_menu">')   
            ->assertSee('<li class="nav-item admin_reports">');    
    }
}