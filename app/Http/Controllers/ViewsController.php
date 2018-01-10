<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ViewsController extends Controller
{
    public function home(){
            if(Auth::check()){

              $arquivos = Db::connection('mysql')->table('arquivos')->select()->where('user_id','=',Auth::user()->id)->get();

              if($arquivos->isEmpty()){

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

    public function pesquisar(){

        ///

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
