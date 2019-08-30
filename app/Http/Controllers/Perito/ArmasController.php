<?php

namespace App\Http\Controllers\Perito;

use App\Http\Requests\ArmaRequest;
use App\Models\Calibre;
use App\Models\Imagem;
use App\Models\Marca;
use App\Models\Origem;
use App\Models\Arma;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Svg\Tag\Image;

class ArmasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arma  $arma
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $arma)
    {
        dd('Redirecionar para responsavel');

        /*Verficar o tipo_arma e redirecionar para o controlelr responsavel*/
        return view('perito.revolver.show',
            compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo $laudo
     * @param  \App\Models\Arma $arma
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Arma $arma)
    {
        /*Verficar o tipo_arma e redirecionar para o controlelr responsavel*/
        dd('Redirecionar para responsavel');

        $marcas = Marca::marcasWithTrashed('armas', $arma->marca);
        $origens = Origem::origensWithTrashed($arma->origem);
        $calibres = Calibre::calibresWithTrashed('revólver', $arma->calibre);
        return view('perito.revolver.edit',
            compact('arma', 'laudo', 'marcas', 'origens', 'calibres'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(ArmaRequest $request, $laudo_id, Arma $arma)
    {
        /*Verficar o tipo_arma e redirecionar para o controlelr responsavel*/

        dd('Redirecionar para responsavel');
        $updated_arma = $request->all();
        Arma::find($arma->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $arma
     * @return \Illuminate\Http\Response
     */
    public function destroy($arma)
    {
        Arma::destroy($arma);
        return response()->json(['success'=>'done']);
    }

    public function store_image($arma)
    {
        $imagem = $_FILES['croppedImage']['tmp_name'];
        $image_name = Imagem::config();
        $image = Imagem::create(['nome' => $image_name, 'arma_id' => $arma]);
        $path = storage_path('imagens/') . $image_name;
        move_uploaded_file($imagem, $path);
        return response()->json(['success' => 'done', 'image' => $image]);
    }
}
