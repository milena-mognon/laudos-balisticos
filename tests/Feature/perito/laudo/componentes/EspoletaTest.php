<?php

namespace Tests\Feature\perito\laudo\componentes;

use App\Models\User;
use App\Models\Laudo;
use App\Models\Componente;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EspoletaTest extends TestCase
{
    use DatabaseTransactions;
    protected $user;
    protected $laudo;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user)->get(route('login'));
        $this->laudo = factory(Laudo::class)->create([
            'perito_id' => $this->user
        ]);
    }

    public function test_laudo_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);  
        $componente = factory(Componente::class, 'Espoleta')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('espoletas.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('componentes.store', $this->laudo),
            $componente->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_m', ['model' => 'Componente'])); 
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $componente = factory(Componente::class, 'Espoleta')->make([
            'laudo_id' => $this->laudo,
            'quantidade' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('espoletas.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('componentes.store', $this->laudo),
            $componente->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_componente_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $componente = factory(Componente::class, 'Espoleta')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->followingRedirects()->get(route('componentes.edit', [$this->laudo, $componente]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.componentes.espoletas.edit');

        $componente->toArray();
        $componente['quantidade'] = '458';
        $updated_data = factory(Componente::class, 'Espoleta')->make($componente->toArray());

        $this->followingRedirects()->patch(route('componentes.update', [$this->laudo, $componente]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Componente']));
    }

    public function teste_componente_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $componente = factory(Componente::class, 'Espoleta')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->followingRedirects()->get(route('componentes.edit', [$this->laudo, $componente]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.componentes.espoletas.edit');

        $componente->toArray();
        $componente['componente'] = '';
        $componente['quantidade'] = '';
        $updated_data = factory(Componente::class, 'Espoleta')->make($componente->toArray());

        $this->followingRedirects()->patch(route('componentes.update', [$this->laudo, $componente]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_componente_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $componente = factory(Componente::class, 'Espoleta')->create([
            'laudo_id' => $this->laudo,
        ]);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText(mb_strtoupper($componente->componente))
            ->assertSeeText($componente->quantidade);

        $this->delete(route('componentes.destroy', [$this->laudo, $componente]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText(mb_strtoupper($componente->componente))
            ->assertDontSeeText($componente->quantidade);
    }
}