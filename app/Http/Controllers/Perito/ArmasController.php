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

class ArmasController extends Controller
{
    private $images_path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->images_path = public_path('/uploads/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo)
    {
        $marcas = Marca::categoria('armas');
        $origens = Origem::all();
        $calibres = Calibre::arma('revólver');
        return view('perito.revolver.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArmaRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')]);
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

//        $arma_id = $request->input('arma_id');
        $image_name = md5(time() + random_int(1, 10)) . '.png';

        if (!is_dir($this->images_path)) { // verifica se existe a pasta upload
            mkdir($this->images_path, 0777, true); // cria a pasta caso não exista
        };

        // salva no banco referencia para a imagem//
//        $image = Arma::find($arma)->fill(['ref_image' => $image_name])->save();
        $image = Imagem::create(['nome' => $image_name, 'arma_id' => $arma]);
        // fim //

        $path = $this->images_path . $image_name;

        move_uploaded_file($imagem, $path);

        return response()->json(['success' => 'done', 'image' => $image, 'teste' => $imagem]);
    }
}
