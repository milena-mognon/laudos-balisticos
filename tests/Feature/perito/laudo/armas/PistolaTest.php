<?php

namespace Tests\Feature\perito\laudo\armas;

use App\Models\User;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Origem;
use App\Models\Laudo;
use App\Models\Arma;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PistolaTest extends TestCase
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
        $pistola = factory(Arma::class, 'Pistola')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('pistolas.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('pistolas.store', $this->laudo),
            $pistola->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_f', ['model' => 'Pistola'])); 
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $pistola = factory(Arma::class, 'Pistola')->make([
            'laudo_id' => $this->laudo,
            'marca_id' => '',
            'calibre_id' => '',
            'num_lacre' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('pistolas.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('pistolas.store', $this->laudo),
            $pistola->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_pistola_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $pistola = factory(Arma::class, 'Pistola')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('pistolas.edit', [$this->laudo, $pistola]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.pistola.edit');

        $pistola->toArray();
        $pistola['marca_id'] = factory(Marca::class);
        $pistola['num_lacre'] = '326587';
        $updated_data = factory(Arma::class, 'Pistola')->make($pistola->toArray());

        $this->followingRedirects()->patch(route('pistolas.update', [$this->laudo, $pistola]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Pistola']));
    }

    public function teste_pistola_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $pistola = factory(Arma::class, 'Pistola')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('pistolas.edit', [$this->laudo, $pistola]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.pistola.edit');

        $pistola->toArray();
        $pistola['marca_id'] = '';
        $pistola['lacre'] = '';
        $updated_data = factory(Arma::class, 'Pistola')->make($pistola->toArray());

        $this->followingRedirects()->patch(route('pistolas.update', [$this->laudo, $pistola]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_pistola_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $pistola = factory(Arma::class, 'Pistola')->create([
            'laudo_id' => $this->laudo,
        ]);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText($pistola->num_lacre)
            ->assertSeeText($pistola->num_serie);

        $this->delete(route('armas.destroy', [$this->laudo, $pistola]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText($pistola->num_lacre)
            ->assertDontSeeText($pistola->num_serie);
    }
}