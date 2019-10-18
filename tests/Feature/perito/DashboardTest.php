<?php

namespace Tests\Feature\perito;

use App\Models\User;
use App\Models\Cargo;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'cargo_id' => factory(Cargo::class)->create([
                'nome' => 'Perito'
            ])
        ]);
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_admin_menu()
    {
        $this->assertAuthenticated();
        $this->get(route('dashboard'))
            ->assertStatus(200)
            ->assertDontSee('<li class="nav-item dropdown admin_menu">')   
            ->assertDontSee('<li class="nav-item admin_reports">');    
    }

    public function test_unauthorized()
    {
        $routes = [
            'marcas', 'origens', 'users', 'calibres', 'solicitantes',
            'diretores', 'secoes'
        ];
        $this->assertAuthenticated();
        foreach($routes as $route){
            $this->followingRedirects()->get(route($route.'.index'))
            ->assertSeeText('Acesso Restrito!');
        } 
    }
}