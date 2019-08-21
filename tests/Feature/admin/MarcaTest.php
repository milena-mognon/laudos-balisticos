<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
        $this->user = factory(User::class)->create();;
        $this->actingAs($this->user)->get(route('login'));
    }

    public function testMarcaIndex()
    {
//        $this->assertAuthenticated();
        $marcas = factory(Marca::class, 3)->create();
        $response = $this->get(route('marcas.index'));
        var_dump($response);
//        $response->assertSuccessful();
        foreach ($marcas as $marca) {
            $response->assertSeeText($marca->nome);
            $response->assertSeeText($marca->categoria);
        }
    }

    /*
     *
     * Response status code [419] is not a redirect status code.
        Failed asserting that false is true.
    */
    public function testeMarcaCreate()
    {
//        $this->assertAuthenticated();
        $marca = factory(Marca::class)->make();
        $this->get(route('marcas.create'));
        var_dump($response);

        $this->post(route('marcas.store', array_merge($marca->toArray(), ['_token' => csrf_field()])))
            ->assertRedirect(route('marcas.index'));
        $this->get(route('comidas.index'))
            ->assertSeeText('Marca cadastrada com sucesso!')
            ->assertSeeText($marca['nome'])
            ->assertSeeText($marca['categoria']);

    }
}
