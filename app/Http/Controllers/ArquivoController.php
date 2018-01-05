<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    public function mostrarArquivos(){

          $arquivos = Db::connection('mysql')->table('arquivos')->get()->all();

    }
}
