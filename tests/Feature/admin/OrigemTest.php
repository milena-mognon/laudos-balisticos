<?php

namespace Tests\Feature;

use App\Models\Origem;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrigemTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_origem_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $origens = factory(Origem::class, 3)->create();
        $response = $this->get(route('origens.index'))->assertStatus(200)
            ->assertViewIs('admin.origens.index')->assertSuccessful();
        foreach ($origens as $origem) {
            $response->assertSeeText($origem->nome);
            $response->assertSeeText($origem->fabricacao);
        }
    }

    public function teste_origem_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $origem = factory(Origem::class)->make();
        $this->get(route('origens.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('origens.store',
            array_merge($origem->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_m', ['model' => 'País de Origem']))
            ->assertSeeText($origem['nome'])
            ->assertSeeText($origem['fabricacao']);
    }

    public function teste_origem_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $origem = [
            'nome' => '',
            'fabricacao' => ''
        ];
        $this->get(route('origens.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('origens.store',
            array_merge($origem,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_origem_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $origem = factory(Origem::class)->create();

        $this->get(route('origens.edit', $origem))->assertStatus(200)
            ->assertViewIs('admin.origens.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'fabricacao' => $origem['fabricacao'],
        ];

        $this->followingRedirects()->patch(route('origens.update', $origem),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'País de Origem']))
            ->assertSeeText($updated_data['nome'])
            ->assertSeeText($updated_data['fabricacao']);
    }

    public function teste_origem_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $origem = factory(Origem::class)->create();

        $this->get(route('origens.edit', $origem))->assertStatus(200)
            ->assertViewIs('admin.origens.edit');

        $updated_data = [
            'nome' => '', // campo editado
            'fabricacao' => '',
        ];

        $this->followingRedirects()->patch(route('origens.update', $origem),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_origem_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $origem = factory(Origem::class)->create();
        $this->delete(route('origens.destroy', $origem))->assertStatus(200);
        $this->get(route('origens.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.origens.index')
            ->assertDontSeeText($origem->nome)
            ->assertDontSeeText($origem->fabricacao);
    }
}
