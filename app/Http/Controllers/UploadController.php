<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function imagem(Request $request){

        $diskName = 'usuarios';

        $nome = ($request->nome == NULL) ? $request->arquivo->getClientOriginalName() : $request->nome;

        /*if(!Storage::disk($diskName)->exists(Auth::user()->id.'/imagens')){

            Storage::disk($diskName)->makeDirectory(Auth::user()->id.'/imagens');

        }*/

        $rota = Storage::disk($diskName)->putFileAs(Auth::user()->id.'/imagens',$request->arquivo,$nome);

        $f_rota = $diskName.'/'.$rota;

        date_default_timezone_set('America/Fortaleza');

        $data = date("Y-m-d H:i:s");

        DB::connection('mysql')->insert('insert into arquivos(user_id,disk,nome,tamanho,rota,created_at,updated_at) values(?,?,?,?,?,?,?)',[Auth::user()->id,$diskName,$nome,(Storage::disk($diskName)->size($rota))/1000,$f_rota,$data,$data]);

        return redirect('/');

    }

}
