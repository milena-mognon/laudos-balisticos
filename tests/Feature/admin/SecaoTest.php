<?php

namespace Tests\Feature;

use App\Models\Secao;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SecaoTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_secao_index()
    {
        $this->assertAuthenticated();
        $secoes = factory(Secao::class, 3)->create();
        $response = $this->get(route('secoes.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.secoes.index');
        $response->assertSuccessful();
        foreach ($secoes as $secao) {
            $response->assertSeeText($secao->nome);
        }
    }

    public function teste_secao_create_ok()
    {
        $this->assertAuthenticated();
        $secao = factory(Secao::class)->make();
        $response = $this->get(route('secoes.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('secoes.store',
            array_merge($secao->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_f', ['model' => 'Seção']))
            ->assertSeeText($secao['nome']);
    }

    public function teste_secao_create_fail()
    {
        $this->assertAuthenticated();
        $secao = [
            'nome' => '',
            'categoria' => ''
        ];
        $response = $this->get(route('secoes.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('secoes.store',
            array_merge($secao,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_secao_update_ok()
    {
        $this->assertAuthenticated();
        $secao = factory(Secao::class)->create();

        $response = $this->get(route('secoes.edit', $secao))
            ->assertStatus(200)
            ->assertViewIs('admin.secoes.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'categoria' => $secao['categoria'],
        ];

        $this->followingRedirects()->patch(route('secoes.update', $secao),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Seção']))
            ->assertSeeText($updated_data['nome']);
    }

    public function teste_secao_update_fail()
    {
        $this->assertAuthenticated();
        $secao = factory(Secao::class)->create();

        $response = $this->get(route('secoes.edit', $secao))
            ->assertStatus(200)
            ->assertViewIs('admin.secoes.edit');

        $updated_data = [
            'nome' => '', // campo editado
        ];

        $this->followingRedirects()->patch(route('secoes.update', $secao),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_secao_destroy_ok()
    {
        $this->assertAuthenticated();
        $secao = factory(Secao::class)->create();
        $response = $this->delete(route('secoes.destroy', $secao));
        $response->assertStatus(200);
        $this->get(route('secoes.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.secoes.index')
            ->assertDontSeeText($secao->nome);
    }
}
