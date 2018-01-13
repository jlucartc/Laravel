<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ViewsController extends Controller
{

    public function home(Request $request){

            if(Auth::check()){

              if($request->session()->get('arquivos')){

                  $arquivos = $request->session()->get('arquivos');
                  $arquivos = (Object)$arquivos;

              }else{

                  $arquivos = DB::connection('mysql')->table('arquivos')->select()->where('user_id','=',Auth::user()->id)->get();
              }


              if(count($arquivos) < 1){

                  return view('App/home');

              }else{

                  return view('App/home',['arquivos' => $arquivos]);

              }


            }else{

              return view('login');

            }

    }

    public function info(){

      return view('App/tela-arquivo');

    }

    public function adicionar(){

        return view('App/adicionar-arquivo');

    }

    public function pesquisar(Request $request){

        $pesquisa = $request->pesquisa;

        $palavras = explode(" ",$pesquisa);

        $array = array();

        $isnull = 0;

        $params = array();

        foreach ($palavras as $palavra) {
          if(empty($palavra)){
              $isnull = 1;
              break;
          }
        }

        if(!$isnull){

            foreach ($palavras as $palavra) {
                $array[] = $palavra;
                if(!($palavra[0] == '"' && $palavra[strlen($palavra)-1] == '"')){
                    if(substr_count($palavra,"-") >= 1){
                        $array = array_merge($array,explode("-",$palavra));
                    }
                }
            }

            foreach($array as $arr){
                $arr = "%".$arr."%";
                $params[] = $arr;
                $params[] = strtolower($arr);
                $params[] = strtoupper($arr);
                $na_arr = $arr;
                $na_arr = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$na_arr);
                $params[] = $na_arr;
                $params[] = strtolower($na_arr);
                $params[] = strtoupper($na_arr);
            }

            $params = array_unique($params);

            $new = array();

            for($i = 0; $i < count($params)/2; $i++){

              $new[] = Auth::user()->id;
              $new[] = $params[$i];

            }

            $params = $new;

            $query = 'SELECT * FROM arquivos WHERE user_id = ? AND nome LIKE ?';

        }

        if(count($params) > 1){

            $query = implode(" ",array_merge(array($query),array(str_repeat('OR user_id = ? AND nome LIKE ? ',count($params)/2-1))));
            $query = trim($query);
            $query = $query;

        }else{

          return redirect('/');

        }

        //print_r($params);

        $arquivos = DB::select($query,array_values($params));

        //print_r($arquivos);

        if(count($arquivos) == 0){

            return redirect('/');

        }

        return redirect('/')->with('arquivos',$arquivos);

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

    public function arquivo(Request $request){

      $id = $request->id;

      $res = DB::select('select * from arquivos where id = ?',[$id]);

      //print_r((array)$res['0']);

      return view('App/tela-arquivo',['arquivo' => (array)$res['0']]);

    }

    public function deletarImagem(Request $request){

      $arquivo = DB::table('arquivos')->select()->where('rota','=',$request->rota)->get()->first();
      DB::delete('delete from arquivos where rota = ?',[$request->rota]);

      Storage::delete($arquivo->rota);

      return redirect('/');
    }
}
