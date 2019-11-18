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

class GarruchaTest extends TestCase
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
        $garrucha = factory(Arma::class, 'Garrucha')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('garruchas.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('garruchas.store', $this->laudo),
            $garrucha->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_f', ['model' => 'Garrucha'])); 
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $garrucha = factory(Arma::class, 'Garrucha')->make([
            'laudo_id' => $this->laudo,
            'marca_id' => '',
            'calibre_id' => '',
            'num_lacre' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('garruchas.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('garruchas.store', $this->laudo),
            $garrucha->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_garrucha_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $garrucha = factory(Arma::class, 'Garrucha')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('garruchas.edit', [$this->laudo, $garrucha]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.garrucha.edit');

        $garrucha->toArray();
        $garrucha['marca_id'] = factory(Marca::class);
        $garrucha['num_lacre'] = '326587';
        $updated_data = factory(Arma::class, 'Garrucha')->make($garrucha->toArray());

        $this->followingRedirects()->patch(route('garruchas.update', [$this->laudo, $garrucha]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Garrucha']));
    }

    public function teste_garrucha_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $garrucha = factory(Arma::class, 'Garrucha')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('garruchas.edit', [$this->laudo, $garrucha]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.garrucha.edit');

        $garrucha->toArray();
        $garrucha['marca_id'] = '';
        $garrucha['lacre'] = '';
        $updated_data = factory(Arma::class, 'Garrucha')->make($garrucha->toArray());

        $this->followingRedirects()->patch(route('garruchas.update', [$this->laudo, $garrucha]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_garrucha_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $garrucha = factory(Arma::class, 'Garrucha')->create([
            'laudo_id' => $this->laudo,
        ]);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText($garrucha->num_lacre)
            ->assertSeeText($garrucha->num_serie);

        $this->delete(route('armas.destroy', [$this->laudo, $garrucha]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText($garrucha->num_lacre)
            ->assertDontSeeText($garrucha->num_serie);
    }
}