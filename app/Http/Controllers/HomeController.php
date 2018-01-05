<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      /*if(Auth::check()){

        $arquivos = Db::connection('mysql')->table('arquivos')->get()->all();
        return view('App/home')->with('arquivos',$arquivos);

      }else{*/

        return view('login');

      //}
    }

    public function adicionar(){

        return view('App/adicionar-arquivo');

    }

    public function info(){

        return view('App/tela-arquivo');

    }
}
