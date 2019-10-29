<?php

namespace Tests\Feature\perito;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Laudo;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LaudoTest extends TestCase
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

    public function test_laudo_index()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudos = factory(Laudo::class, 3)->create([
            'perito_id' => $this->user
        ]);

        $response = $this->get(route('laudos.index'))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.index')
            ->assertSuccessful();
        foreach ($laudos as $laudo) {
            $response->assertSeeText($laudo->rep);
            $response->assertSeeText($laudo->oficio);
        }
    }

    public function test_laudo_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudo = factory(Laudo::class)->make([
            'perito_id' => $this->user
        ]);   
        
        $this->get(route('laudos.create'))->assertStatus(200);

        $this->followingRedirects()->post(route('laudos.store',
            array_merge($laudo->toArray(),  ['_token' => csrf_token()])))
            ->assertViewIs('perito.materiais');
        $this->get(route('laudos.index'))->assertStatus(200)
            ->assertSeeText($laudo['rep'])
            ->assertSeeText($laudo['oficio']);     
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudo = factory(Laudo::class)->make([
            'perito_id' => $this->user,
            'rep' => '',
            'oficio' => '',
            'data_solicitacao' => ''
        ]);     
        $this->get(route('laudos.create'))->assertStatus(200);
        $this->followingRedirects()->post(route('laudos.store',
            array_merge($laudo->toArray(),  ['_token' => csrf_token()])))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_laudo_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudo = factory(Laudo::class)->create([
            'perito_id' => $this->user,
        ]);

        $this->get(route('laudos.show', $laudo))->assertStatus(200)
            ->assertViewIs('perito.laudo.show');

        $laudo->toArray();
        $laudo['rep'] = '21458/2019';
        $updated_data = factory(Laudo::class)->make($laudo->toArray());

        $this->followingRedirects()->patch(route('laudos.update', $laudo),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Laudo']));
    }

    public function teste_laudo_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudo = factory(Laudo::class)->create([
            'perito_id' => $this->user,
        ]);

        $this->get(route('laudos.show', $laudo))->assertStatus(200)
            ->assertViewIs('perito.laudo.show');

        $laudo->toArray();
        $laudo['rep'] = '';
        $laudo['oficio'] = '';
        $updated_data = factory(Laudo::class)->make($laudo->toArray());

        $this->followingRedirects()->patch(route('laudos.update', $laudo),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_laudo_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $laudo = factory(Laudo::class)->create([
            'perito_id' => $this->user,
        ]);
        $this->get(route('laudos.index'))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.index')
            ->assertSeeText($laudo->rep)
            ->assertSeeText($laudo->oficio);

        $response = $this->delete(route('laudos.destroy', $laudo));
        $response->assertStatus(200);
        $this->get(route('laudos.index'))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.index')
            ->assertDontSeeText($laudo->rep)
            ->assertDontSeeText($laudo->oficio);
    }
}