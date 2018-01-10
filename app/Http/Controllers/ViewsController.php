<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function home(){
            if(Auth::check()){

              $arquivos = Db::connection('mysql')->table('arquivos')->get()->all();
              return view('App/home',['arquivos' => $arquivos]);

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
}
