<?php

namespace Tests\Feature;

use App\Models\OrgaoSolicitante;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrgaoSolicitanteTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_solicitante_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitantes = factory(OrgaoSolicitante::class, 3)->create();
        $response = $this->get(route('solicitantes.index'))->assertStatus(200)
            ->assertViewIs('admin.orgaos_solicitantes.index')->assertSuccessful();
        foreach ($solicitantes as $solicitante) {
            $response->assertSeeText($solicitante->nome);
            $response->assertSeeText($solicitante->cidade->nome);
        }
    }

    public function teste_solicitante_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitante = factory(OrgaoSolicitante::class)->make();
        $this->get(route('solicitantes.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('solicitantes.store',
            array_merge($solicitante->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_m', ['model' => 'Órgão Solicitante']))
            ->assertSeeText($solicitante['nome']);
    }

    public function teste_solicitante_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitante = [
            'nome' => '',
            'cidade_id' => ''
        ];
        $this->get(route('solicitantes.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('solicitantes.store',
            array_merge($solicitante,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_solicitante_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitante = factory(OrgaoSolicitante::class)->create();

        $this->get(route('solicitantes.edit', $solicitante))->assertStatus(200)
            ->assertViewIs('admin.orgaos_solicitantes.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'cidade_id' => $solicitante['cidade_id'],
        ];

        $this->followingRedirects()->patch(route('solicitantes.update', $solicitante),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Órgão Solicitante']))
            ->assertSeeText($updated_data['nome']);
    }

    public function teste_solicitante_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitante = factory(OrgaoSolicitante::class)->create();

        $this->get(route('solicitantes.edit', $solicitante))->assertStatus(200)
            ->assertViewIs('admin.orgaos_solicitantes.edit');

        $updated_data = [
            'nome' => '', // campo editado
        ];

        $this->followingRedirects()->patch(route('solicitantes.update', $solicitante),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_solicitante_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $solicitante = factory(OrgaoSolicitante::class)->create();
        $this->delete(route('solicitantes.destroy', $solicitante))->assertStatus(200);
        $this->get(route('solicitantes.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.orgaos_solicitantes.index')
            ->assertDontSeeText($solicitante->nome);
    }
}
