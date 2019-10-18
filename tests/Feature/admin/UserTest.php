<?php

namespace Tests\Feature;

use App\Models\User;
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
        $this->assertAuthenticated();
        $users = factory(User::class, 3)->create();
        $response = $this->get(route('users.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
        $response->assertSuccessful();
        foreach ($users as $user) {
            var_dump($user->cargo->nome);
            $response->assertSeeText($user->nome)
                ->assertSeeText($user->email)
                ->assertSeeText($user->cargo->nome)
                ->assertSeeText($user->secao->nome);
        }
    }


    public function teste_user_create_ok()
    {
        $this->assertAuthenticated();
        $user = factory(User::class)->make();
        var_dump($user);
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('register',
            array_merge($user->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_m', ['model' => 'Usuário']))
            ->assertSeeText($user['nome'])
            ->assertSeeText($user['email']);
    }

    // public function teste_user_create_fail()
    // {
    //     $this->assertAuthenticated();
    //     $user = [
    //         'nome' => '',
    //         'email' => '',
    //         'cargo_id' => '',
    //         'secao_id' => ''
    //     ];
    //     $response = $this->get(route('users.create'));
    //     $response->assertStatus(200);
    //     $this->followingRedirects()->post(route('users.store',
    //         array_merge($user,  ['_token' => csrf_token()])))
    //         ->assertSee('<div class="alert alert-danger">')
    //         ->assertSeeText('Existe alguns erros no formulário.');
    // }

    // public function teste_user_update_ok()
    // {
    //     $this->assertAuthenticated();
    //     $user = factory(User::class)->create();

    //     $response = $this->get(route('users.edit', $user))
    //         ->assertStatus(200)
    //         ->assertViewIs('admin.users.edit');

    //     $updated_data = [
    //         'nome' => ucfirst(str_random(10)), // campo editado
    //         'email' => 'outro_email@mail.com',
    //         'cargo_id' => $user['cargo_id'],
    //         'secao_id' => $user['secao_id']
    //     ];

    //     $this->followingRedirects()->patch(route('users.update', $user),
    //         array_merge($updated_data,  ['_token' => csrf_token()]))
    //         ->assertSeeText(__('flash.update_m', ['model' => 'Usuário']))
    //         ->assertSeeText($updated_data['nome'])
    //         ->assertSeeText($updated_data['email']);
    // }

    // public function teste_user_update_fail()
    // {
    //     $this->assertAuthenticated();
    //     $user = factory(User::class)->create();

    //     $response = $this->get(route('users.edit', $user))
    //         ->assertStatus(200)
    //         ->assertViewIs('admin.users.edit');

    //     $updated_data = [
    //         'nome' => '', // campo editado
    //         'email' => '',
    //         'cargo_id' => '',
    //         'secao_id' => ''
    //     ];

    //     $this->followingRedirects()->patch(route('users.update', $user),
    //         array_merge($updated_data,  ['_token' => csrf_token()]))
    //         ->assertSee('<div class="alert alert-danger">')
    //         ->assertSeeText('Existe alguns erros no formulário.');
    // }

    // public function teste_user_destroy_ok()
    // {
    //     $this->assertAuthenticated();
    //     $user = factory(User::class)->create();
    //     $response = $this->delete(route('users.destroy', $user));
    //     $response->assertStatus(200);
    //     $this->get(route('users.index'))
    //         ->assertStatus(200)
    //         ->assertViewIs('admin.users.index')
    //         ->assertDontSeeText($user->nome)
    //         ->assertDontSeeText($user->email)
    //         ->assertDontSeeText($user->cargo->nome)
    //         ->assertDontSeeText($user->secao->nome);
    // }
}
