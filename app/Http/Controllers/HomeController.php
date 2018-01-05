<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('autorizar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if(Auth::check()){

        $arquivos = Db::connection('mysql')->table('arquivos')->get()->all();
        //$contents = Storage::get('arquivo.png');
        return view('App/home',['arquivos' => $arquivos]);

      }else{

        return view('login');

      }
    }

    public function adicionar(){

        return view('App/adicionar-arquivo');

    }

    public function info(){

        return view('App/tela-arquivo');

    }

    public function imagem(){

        return "<img src='".Storage::disk('publico')->url('/1/Shrek.jpg')."' style='width:300;height:300;'>";

    }
}
