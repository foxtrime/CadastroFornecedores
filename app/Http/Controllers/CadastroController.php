<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;

class CadastroController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'razao_social' => 'required',
            'cnpj' => 'required',
            'porte_empresa' => 'required',
            'cnae' => 'required',
            'produtos' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);

        $cadastro = new Cadastro($request->all());

        $cadastro->save();

        // return view('user.sucesso');
        return redirect()->action('CadastroController@sucesso');
        //dd($request);
    }

    public function sucesso()
    {
        return view('user.sucesso');
    }
}
