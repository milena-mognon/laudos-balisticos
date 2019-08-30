<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';

    protected $fillable = ['nome', 'arma_id'];

    public $timestamps = false;

    /*
     * Configurações necessárias para a salvar a imagem
     * return image_name
     * */
    public static function config(){
        self::create_path();
        return self::generate_image_name();
    }

    /*
     * Verifica se existe o diretório para salvar as imagens
     * Se não existir, cria com a devida permissão
     *
     * */
    private static function create_path(){
        if (!is_dir(storage_path('imagens'))) { // verifica se existe a pasta upload
            mkdir(storage_path('imagens'), 0755, true); // cria a pasta caso não exista
        };
    }

    /*
     * Gera o nome da imagem
     * Criptografa com md5 o time da solicitação e um número aleatório
     * gerando assim um nome único para a imagem
     * */
    private static function generate_image_name(){
        return md5(time() + random_int(1, 10)) . '.png';
    }

}
