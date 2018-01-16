<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use upload;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends Controller
{
    public function imagem(Request $request){

        $imagem = new upload($request->arquivo);

        if($imagem->uploaded){

          $imagem->image_resize = true;
          $imagem->image_x = 1920;
          $imagem->image_ratio_y = false;
          $imagem->image_y = 1080;
          $imagem = $imagem->process();

          $diskName = 'usuarios';

          $standardName = "imagem";

          $hashName = $request->arquivo->hashName();

          $nome = ($request->nome == NULL) ? $hashName : $request->nome;

          $imagem = imagecreatefromstring($imagem);

          if($imagem){

            $path = storage_path('app/usuarios')."/".Auth::user()->id."/tmp/"."imagens/";

            if (!file_exists($path)) {
                  mkdir($path, 0777, true);
            }

            $path = $path.$nome;

            imagejpeg($imagem,$path,100);
            imagedestroy($imagem);
            $imagem = new UploadedFile($path,$nome);

            $rota = Storage::disk($diskName)->putFileAs(Auth::user()->id.'/imagens',$imagem,$nome);
            $rota_tmp = Storage::disk($diskName)->putFileAs(Auth::user()->id.'/tmp/imagens',$imagem,$nome);

            Storage::disk('usuarios')->delete($rota_tmp);


            $f_rota = $diskName.'/'.$rota;

            date_default_timezone_set('America/Fortaleza');

            $data = date("Y-m-d H:i:s");

            $nome = ($request->nome == NULL) ? $standardName : $request->nome;

            DB::connection('mysql')->insert('insert into arquivos(user_id,disk,nome,tamanho,rota,created_at,updated_at) values(?,?,?,?,?,?,?)',[Auth::user()->id,$diskName,$nome,(Storage::disk($diskName)->size($rota))/1000,$f_rota,$data,$data]);

            return redirect('/');

          }

          /*
          $rota = Storage::disk($diskName)->putFileAs(Auth::user()->id.'/imagens',$request->arquivo,$nome);

          $f_rota = $diskName.'/'.$rota;

          date_default_timezone_set('America/Fortaleza');

          $data = date("Y-m-d H:i:s");

          $nome = ($request->nome == NULL) ? $standardName : $request->nome;

          DB::connection('mysql')->insert('insert into arquivos(user_id,disk,nome,tamanho,rota,created_at,updated_at) values(?,?,?,?,?,?,?)',[Auth::user()->id,$diskName,$nome,(Storage::disk($diskName)->size($rota))/1000,$f_rota,$data,$data]);

          return redirect('/');*/


        }


    }

}
