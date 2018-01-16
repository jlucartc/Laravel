<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use upload;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArquivosController extends Controller
{
  public function upload(Request $request){

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

      }

  }

  public function renomear(Request $request){

    if(isset($request->nome)){

      DB::update('update arquivos set nome = ? where id = ?',[$request->nome,$request->arquivo['id']]);
      $arquivo = DB::select('select * from arquivos where id = ?',[$request->arquivo['id']]);
      //print_r($arquivo[0]->id);
      return redirect()->route('arquivo',['id' => $arquivo[0]->id]);

    }else{

      return redirect('/');

    }
  }

  public function deletar(Request $request){

    $arquivo = DB::table('arquivos')->select()->where('rota','=',$request->rota)->get()->first();
    DB::delete('delete from arquivos where rota = ?',[$request->rota]);

    Storage::delete($arquivo->rota);

    return redirect('/');
  }

  public function download(Request $request){

    return response()->download($request->rota);

  }

}
