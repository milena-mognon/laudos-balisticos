<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarcaTest extends TestCase
{
    use DatabaseTransactions;
//    use WithoutMiddleware;
    protected $user;

    public function setUp()
    {
        parent::setUp();
//        dd(DB::connection()->getConfig(null));
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));

    }

    public function test_marca_index()
    {
        $this->assertAuthenticated();
        $marcas = factory(Marca::class, 3)->create();
        $response = $this->get(route('marcas.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.marcas.index');
        $response->assertSuccessful();
        foreach ($marcas as $marca) {
            $response->assertSeeText($marca->nome);
            $response->assertSeeText($marca->categoria);
        }
    }

//    /*
//     *
//     * Response status code [419] is not a redirect status code.
//        Failed asserting that false is true.
//    */
    public function teste_marca_create()
    {
        $this->assertAuthenticated();
        $marca = factory(Marca::class)->make();
        $response = $this->get(route('marcas.create'));
        $response->assertStatus(200);
        $this->followingRedirects()->post(route('marcas.store',
            array_merge($marca->toArray(),  ['_token' => csrf_token()])))
            ->assertSeeText(__('flash.create_f', ['model' => 'Marca']))
            ->assertSeeText($marca['nome'])
            ->assertSeeText($marca['categoria']);
    }
}
