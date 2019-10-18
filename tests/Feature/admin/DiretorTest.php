<?php

namespace Tests\Feature;

use App\Models\Diretor;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DiretorTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_diretor_index()
    {
        $this->assertAuthenticated();
        $diretores = factory(Diretor::class, 3)->create();
        $response = $this->get(route('diretores.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.diretores.index');
        $response->assertSuccessful();
        foreach ($diretores as $diretor) {
            $response->assertSeeText($diretor->nome);
            $response->assertSeeText(formatar_data_do_bd($diretor->inicio_direcao));
            $response->assertSeeText(formatar_data_do_bd($diretor->fim_direcao));
        }
    }

    public function teste_diretor_create_ok()
    {
        $this->assertAuthenticated();
        $diretor = factory(Diretor::class)->make();

        $diretor = [
            'nome' => $diretor['nome'],
            'inicio_direcao' => formatar_data_do_bd($diretor['inicio_direcao']),
            'fim_direcao' => formatar_data_do_bd($diretor['fim_direcao'])
        ];
        
        $response = $this->get(route('diretores.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('diretores.store',
            array_merge($diretor,  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_m', ['model' => 'Diretor']))
            ->assertSeeText($diretor['nome'])
            ->assertSeeText($diretor['inicio_direcao'])
            ->assertSeeText($diretor['fim_direcao']);
    }

    public function teste_diretor_create_fail()
    {
        $this->assertAuthenticated();
        $diretor = [
            'nome' => '',
            'inicio_direcao' => '',
            'fim_direcao' => '',
        ];
        $response = $this->get(route('diretores.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('diretores.store',
            array_merge($diretor,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_diretor_update_ok()
    {
        $this->assertAuthenticated();
        $diretor = factory(Diretor::class)->create();

        $response = $this->get(route('diretores.edit', $diretor))
            ->assertStatus(200)
            ->assertViewIs('admin.diretores.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'inicio_direcao' => formatar_data_do_bd($diretor['inicio_direcao']),
            'fim_direcao' => formatar_data_do_bd($diretor['fim_direcao'])
        ];

        $this->followingRedirects()->patch(route('diretores.update', $diretor),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Diretor']))
            ->assertSeeText($updated_data['nome'])
            ->assertSeeText($updated_data['inicio_direcao'])
            ->assertSeeText($updated_data['fim_direcao']);
    }

    public function teste_diretor_update_fail()
    {
        $this->assertAuthenticated();
        $diretor = factory(Diretor::class)->create();

        $response = $this->get(route('diretores.edit', $diretor))
            ->assertStatus(200)
            ->assertViewIs('admin.diretores.edit');

        $updated_data = [
            'nome' => '', // campo editado
            'inicio_direcao' => '',
            'fim_direcao' => '',
        ];

        $this->followingRedirects()->patch(route('diretores.update', $diretor),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_diretor_destroy_ok()
    {
        $this->assertAuthenticated();
        $diretor = factory(Diretor::class)->create();
        $response = $this->delete(route('diretores.destroy', $diretor));
        $response->assertStatus(200);
        $this->get(route('diretores.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.diretores.index')
            ->assertDontSeeText($diretor->nome)
            ->assertDontSeeText($diretor->inicio_direcao)
            ->assertDontSeeText($diretor->fim_direcao);
    }
}
