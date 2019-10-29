<?php

namespace Tests\Feature;

use App\Models\Calibre;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CalibreTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_calibre_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibres = factory(Calibre::class, 3)->create();
        $response = $this->get(route('calibres.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.calibres.index');
        $response->assertSuccessful();
        foreach ($calibres as $calibre) {
            $response->assertSeeText($calibre->nome);
            $response->assertSeeText($calibre->tipo_arma);
        }
    }


    public function teste_calibre_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibre = factory(Calibre::class)->make();
        $response = $this->get(route('calibres.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('calibres.store',
            array_merge($calibre->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_m', ['model' => 'Calibre']))
            ->assertSeeText($calibre['nome'])
            ->assertSeeText($calibre['tipo_arma']);
    }

    public function teste_calibre_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibre = [
            'nome' => '',
            'tipo_arma' => ''
        ];
        $response = $this->get(route('calibres.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('calibres.store',
            array_merge($calibre,  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_calibre_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibre = factory(Calibre::class)->create();

        $response = $this->get(route('calibres.edit', $calibre))
            ->assertStatus(200)
            ->assertViewIs('admin.calibres.edit');

        $updated_data = [
            'nome' => ucfirst(str_random(10)), // campo editado
            'tipo_arma' => $calibre['tipo_arma'],
        ];

        $this->followingRedirects()->patch(route('calibres.update', $calibre),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Calibre']))
            ->assertSeeText($updated_data['nome'])
            ->assertSeeText($updated_data['tipo_arma']);
    }

    public function teste_calibre_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibre = factory(Calibre::class)->create();

        $response = $this->get(route('calibres.edit', $calibre))
            ->assertStatus(200)
            ->assertViewIs('admin.calibres.edit');

        $updated_data = [
            'nome' => '', // campo editado
            'tipo_arma' => '',
        ];

        $this->followingRedirects()->patch(route('calibres.update', $calibre),
            array_merge($updated_data,  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_calibre_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $calibre = factory(Calibre::class)->create();
        $response = $this->delete(route('calibres.destroy', $calibre));
        $response->assertStatus(200);
        $this->get(route('calibres.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.calibres.index')
            ->assertDontSeeText($calibre->nome)
            ->assertDontSeeText($calibre->tipo_arma);
    }
}
