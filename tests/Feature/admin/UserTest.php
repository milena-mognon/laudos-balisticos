<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Secao;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_user_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $users = factory(User::class, 3)->create();
        $response = $this->get(route('users.index'))->assertStatus(200)
        ->assertViewIs('admin.users.index')->assertSuccessful();
        foreach ($users as $user) {
            $response->assertSeeText($user->nome)
                ->assertSeeText($user->email)
                ->assertSeeText($user->cargo->nome)
                ->assertSeeText($user->secao->nome);
        }
    }

    // public function teste_user_create_ok()
    // {
    //     // $password = 'teste123';
    //     $this->assertAuthenticatedAs($this->user);
    //     $user = factory(User::class)->make([
    //         'password' => 'teste123', 
    //         'confirmacao_senha' => 'teste123'
    //     ]);
    //     var_dump($user['password']);
    //     var_dump($user['confirmacao_senha']);
    //     $response = $this->get(route('register'));
    //     $response->assertStatus(200);
    //     $this->followingRedirects()->post(route('register',
    //         array_merge($user->toArray(),  ['_token' => csrf_token()])))
    //         ->assertSeeText(__('flash.create_m', ['model' => 'Usuário']))
    //         ->assertSeeText($user['nome'])
    //         ->assertSeeText($user['email']);
    // }

    public function teste_user_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $user = [
            'nome' => '',
            'email' => '',
            'cargo_id' => '',
            'secao_id' => ''
        ];
        $this->get(route('register'))->assertStatus(200);
        $this->followingRedirects()->post(route('register',
            array_merge($user,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_user_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $user = factory(User::class)->create();

        $response = $this->get(route('users.edit', $user))
            ->assertStatus(200)
            ->assertViewIs('admin.users.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campos editados
            'email' => 'outro_email@mail.com',
            'cargo_id' => $user['cargo_id'],
            'secao_id' => $user['secao_id']
        ];

        $this->followingRedirects()->patch(route('users.update', $user),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Usuário']))
            ->assertSeeText($updated_data['nome'])
            ->assertSeeText($updated_data['email']);
    }

    public function teste_user_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $user = factory(User::class)->create();

        $this->get(route('users.edit', $user))->assertStatus(200)
            ->assertViewIs('admin.users.edit');

        $updated_data = [
            'nome' => '', // campo editado
            'email' => '',
            'cargo_id' => '',
            'secao_id' => ''
        ];

        $this->followingRedirects()->patch(route('users.update', $user),
            array_merge($updated_data,  ['_token' => csrf_token()]));
            // ->assertSee('<div class="alert alert-danger">');
        //     ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_user_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $user = factory(User::class)->create([
            'cargo_id' => factory(Cargo::class)->create([
                'nome' => 'Perito'
            ])
        ]);
        $response = $this->delete(route('users.destroy', $user))
            ->assertStatus(200);
        $this->get(route('users.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.users.index')
            ->assertDontSeeText($user->nome)
            ->assertDontSeeText($user->email)
            ->assertDontSeeText($user->cargo->nome)
            ->assertDontSeeText($user->secao->nome);
    }
}
