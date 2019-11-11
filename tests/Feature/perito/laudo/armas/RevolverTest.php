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

class RevolverTest extends TestCase
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
        $revolver = factory(Arma::class, 'Revolver')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('revolveres.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('revolveres.store', $this->laudo),
            $revolver->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_m', ['model' => 'Revólver'])); 
    }

    public function test_laudo_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $revolver = factory(Arma::class, 'Revolver')->make([
            'laudo_id' => $this->laudo,
            'marca_id' => '',
            'calibre_id' => '',
            'num_lacre' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('revolveres.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('revolveres.store', $this->laudo),
            $revolver->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function teste_revolver_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $revolver = factory(Arma::class, 'Revolver')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('revolveres.edit', [$this->laudo, $revolver]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.revolver.edit');

        $revolver->toArray();
        $revolver['marca_id'] = factory(Marca::class);
        $revolver['num_lacre'] = '326587';
        $updated_data = factory(Arma::class, 'Revolver')->make($revolver->toArray());

        $this->followingRedirects()->patch(route('revolveres.update', [$this->laudo, $revolver]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_m', ['model' => 'Revólver']));
    }

    public function teste_revolver_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $revolver = factory(Arma::class, 'Revolver')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('revolveres.edit', [$this->laudo, $revolver]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.revolver.edit');

        $revolver->toArray();
        $revolver['marca_id'] = '';
        $revolver['lacre'] = '';
        $updated_data = factory(Arma::class, 'Revolver')->make($revolver->toArray());

        $this->followingRedirects()->patch(route('revolveres.update', [$this->laudo, $revolver]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function teste_revolver_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $revolver = factory(Arma::class, 'Revolver')->create([
            'laudo_id' => $this->laudo,
        ]);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText($revolver->num_lacre)
            ->assertSeeText($revolver->num_serie);

        $this->delete(route('armas.destroy', [$this->laudo, $revolver]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText($revolver->num_lacre)
            ->assertDontSeeText($revolver->num_serie);
    }
}