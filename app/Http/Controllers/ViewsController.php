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
                  //print_r($arquivos);
              }else{

                  $arquivos = DB::connection('mysql')->table('arquivos')->select()->where('user_id','=',Auth::user()->id)->get();
                  //print_r(count($arquivos));
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

    public function remover(){

        ///

    }

    public function pesquisar(Request $request){

        $driver = "mysql";

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

            $query = 'SELECT * FROM arquivos WHERE nome LIKE ?';

        }

        if(count($params) > 1){

            $query = implode(" ",array_merge(array($query),array(str_repeat('OR nome LIKE ? ',count($params)-1))));
            $query = trim($query);
            $query = $query;

        }else{

          return redirect('/');

        }

        $arquivos = DB::select($query,array_values($params));


        print_r($arquivos);
        //echo $query;
        //print_r($params);
        //print_r(array_values($params));
        if(count($arquivos) == 0){

            return redirect('/');

        }

        return redirect('/')->with('arquivos',$arquivos);

    }

    public function renomear(){

      ///

    }

    public function arquivo(Request $request){

      echo view('App/tela-arquivo',['rota' => $request->rota]);

    }

    public function deletarImagem(Request $request){

      $arquivo = DB::table('arquivos')->select()->where('rota','=',$request->rota)->get()->first();
      DB::delete('delete from arquivos where rota = ?',[$request->rota]);

      Storage::delete($arquivo->rota);

      return redirect('/');
    }
}
