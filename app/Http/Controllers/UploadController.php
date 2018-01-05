<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function privado(Request $request){

      if($request->nome == null){

          echo "Erro: nome inválido";

      }else{

      Storage::disk('privado')->putFileAs(Auth::user()->id.'/imagens',$request->arquivo,$request->nome);


      }

      echo "Imagem privada adicionada!";

    }

    public function publico(Request $request){

        $diskName = 'publico';

        if(!Storage::disk($diskName)->exists(Auth::user()->id.'/imagens')){

            Storage::disk($diskName)->makeDirectory(Auth::user()->id.'/imagens');

        }

        $rota = Storage::disk($diskName)->putFileAs(Auth::user()->id.'/imagens',$request->arquivo,$request->nome);

        DB::connection('mysql')->insert('insert into arquivos(nome,tamanho,rota) values(?,?,?)',[$request->nome,(Storage::disk($diskName)->size($rota))/1000,$rota]);

        echo Storage::disk($diskName)->size($rota);

        echo "Imagem pública criada!";
    }

}
