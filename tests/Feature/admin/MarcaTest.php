<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MarcaTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_marca_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $marcas = factory(Marca::class, 3)->create();
        $response = $this->get(route('marcas.index'))->assertStatus(200)
            ->assertViewIs('admin.marcas.index')->assertSuccessful();
        foreach ($marcas as $marca) {
            $response->assertSeeText($marca->nome);
            $response->assertSeeText($marca->categoria);
        }
    }

    public function teste_marca_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $marca = factory(Marca::class)->make();
        $this->get(route('marcas.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('marcas.store',
            array_merge($marca->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_f', ['model' => 'Marca']))
            ->assertSeeText($marca['nome'])
            ->assertSeeText($marca['categoria']);
    }

    public function teste_marca_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $marca = [
            'nome' => '',
            'categoria' => ''
        ];
        $this->get(route('marcas.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('marcas.store',
            array_merge($marca,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_marca_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $marca = factory(Marca::class)->create();

        $this->get(route('marcas.edit', $marca))->assertStatus(200)
            ->assertViewIs('admin.marcas.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'categoria' => $marca['categoria'],
        ];

        $this->followingRedirects()->patch(route('marcas.update', $marca),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Marca']))
            ->assertSeeText($updated_data['nome'])
            ->assertSeeText($updated_data['categoria']);
    }

    public function teste_marca_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $marca = factory(Marca::class)->create();

        $this->get(route('marcas.edit', $marca))->assertStatus(200)
            ->assertViewIs('admin.marcas.edit');

        $updated_data = [
            'nome' => '', // campo editado
            'categoria' => '',
        ];

        $this->followingRedirects()->patch(route('marcas.update', $marca),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_marca_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $marca = factory(Marca::class)->create();
        $this->delete(route('marcas.destroy', $marca))->assertStatus(200);
        $this->get(route('marcas.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.marcas.index')
            ->assertDontSeeText($marca->nome)
            ->assertDontSeeText($marca->categoria);
    }
}
