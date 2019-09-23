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
     * Remove the specified resource from storage.
     *
     * @param  int $arma
     * @return \Illuminate\Http\Response
     */
    public function destroy($laudo, $arma)
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
