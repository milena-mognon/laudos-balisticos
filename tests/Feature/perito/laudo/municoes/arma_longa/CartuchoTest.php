<?php

namespace Tests\Feature\perito\laudo\municoes\arma_longa;

use App\Models\User;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Origem;
use App\Models\Laudo;
use App\Models\Municao;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CartuchoArmaTest extends TestCase
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
        $cartucho = factory(Municao::class, 'Cartucho Arma Longa')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('armas_longas.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('municoes.store', $this->laudo),
            $cartucho->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_f', ['model' => 'Munição'])); 
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $cartucho = factory(Municao::class, 'Cartucho Arma Longa')->make([
            'laudo_id' => $this->laudo,
            'marca_id' => '',
            'calibre_id' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('armas_longas.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('municoes.store', $this->laudo),
            $cartucho->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_cartucho_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $cartucho = factory(Municao::class, 'Cartucho Arma Longa')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->followingRedirects()->get(route('municoes.edit', [$this->laudo, $cartucho]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.municoes.arma_longa.edit');

        $cartucho->toArray();
        $cartucho['marca_id'] = factory(Marca::class);

        $updated_data = factory(Municao::class, 'Cartucho Arma Longa')
                        ->make($cartucho->toArray());

        $this->followingRedirects()->patch(route('municoes.update', [$this->laudo, $cartucho]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Munição']));
    }

    public function teste_cartucho_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $cartucho = factory(Municao::class, 'Cartucho Arma Longa')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->followingRedirects()->get(route('municoes.edit', [$this->laudo, $cartucho]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.municoes.arma_longa.edit');

        $cartucho->toArray();
        $cartucho['marca_id'] = '';
        $updated_data = factory(Municao::class, 'Cartucho Arma Longa')
                        ->make($cartucho->toArray());

        $this->followingRedirects()->patch(route('municoes.update', [$this->laudo, $cartucho]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_cartucho_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $cartucho = factory(Municao::class, 'Cartucho Arma Longa')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText($cartucho->calibre->nome)
            ->assertSeeText($cartucho->marca->nome);

        $this->delete(route('municoes.destroy', [$this->laudo, $cartucho]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText($cartucho->calibre->nome)
            ->assertDontSeeText($cartucho->marca->nome);
    }
}