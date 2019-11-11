<?php

namespace Tests\Feature\perito\laudo\armas;

use App\Models\User;
use App\Models\Calibre;
use App\Models\Laudo;
use App\Models\Arma;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EspingardaArtesanalTest extends TestCase
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

    public function test_espingarda_artesanal_create_ok()
    {
        $this->assertAuthenticatedAs($this->user);  
        $espingarda = factory(Arma::class, 'Espingarda Artesanal')->make([
            'laudo_id' => $this->laudo,
            '_token' => csrf_token()
        ]);

        $this->get(route('espingardas_artesanais.create', $this->laudo))->assertStatus(200);

        $this->followingRedirects()->post(route('espingardas_artesanais.store', $this->laudo),
            $espingarda->toArray())
            ->assertStatus(200)
            ->assertSeeText(__('flash.create_f', ['model' => 'Espingarda Artesanal'])); 
    }

    public function test_espingarda_artesanal_create_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $espingarda = factory(Arma::class, 'Espingarda Artesanal')->make([
            'laudo_id' => $this->laudo,
            'num_lacre' => '',
            'funcionamento' => '',
            '_token' => csrf_token()
        ]); 

        $this->get(route('espingardas_artesanais.create', $this->laudo))->assertStatus(200);
        $this->followingRedirects()->post(route('espingardas_artesanais.store', $this->laudo),
            $espingarda->toArray())
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');    
    }

    public function test_espingarda_artesanal_update_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $espingarda = factory(Arma::class, 'Espingarda Artesanal')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('espingardas_artesanais.edit', [$this->laudo, $espingarda]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.espingarda_artesanal.edit');

        $espingarda->toArray();
        $espingarda['calibre_id'] = factory(Calibre::class);
        $espingarda['num_lacre'] = '326587';
        $updated_data = factory(Arma::class, 'Espingarda Artesanal')->make($espingarda->toArray());

        $this->followingRedirects()->patch(route('espingardas_artesanais.update', [$this->laudo, $espingarda]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSeeText(__('flash.update_f', ['model' => 'Espingarda Artesanal']));
    }

    public function test_espingarda_artesanal_update_fail()
    {
        $this->assertAuthenticatedAs($this->user);
        $espingarda = factory(Arma::class, 'Espingarda Artesanal')->create([
            'laudo_id' => $this->laudo,
        ]);

        $this->get(route('espingardas_artesanais.edit', [$this->laudo, $espingarda]))->assertStatus(200)
            ->assertViewIs('perito.laudo.materiais.armas.espingarda_artesanal.edit');

        $espingarda->toArray();
        $espingarda['num_lacre'] = '';
        $updated_data = factory(Arma::class, 'Espingarda Artesanal')->make($espingarda->toArray());

        $this->followingRedirects()->patch(route('espingardas_artesanais.update', [$this->laudo, $espingarda]),
            array_merge($updated_data->toArray(),  ['_token' => csrf_token()]))
            ->assertSee('<div class="alert alert-danger">')
            ->assertSeeText('Existe alguns erros no formulário.');
    }

    public function test_espingarda_artesanal_destroy_ok()
    {
        $this->assertAuthenticatedAs($this->user);
        $espingarda = factory(Arma::class, 'Espingarda Artesanal')->create([
            'laudo_id' => $this->laudo,
        ]);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertSeeText($espingarda->num_lacre);

        $this->delete(route('armas.destroy', [$this->laudo, $espingarda]))
            ->assertStatus(200);
        $this->get(route('laudos.show', $this->laudo))
            ->assertStatus(200)
            ->assertViewIs('perito.laudo.show')
            ->assertDontSeeText($espingarda->num_lacre);
    }
}