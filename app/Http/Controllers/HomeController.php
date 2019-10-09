<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cadastro;
use App\Arquivo;
use DataTables;

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
        $usuario = Auth::user();
        //dd($usuario);
        return view('home',compact('usuario'));
    }

    public function show(Request $request, $id)
    { 
    
        $usuario = Auth::user();

        $dados = Cadastro::with('arquivos')->find($id);

        $a = $dados->arquivos;
        //dd($a);
        $extensao = pathinfo($a, PATHINFO_EXTENSION);

        //dd($extensao);
        return view ('show',compact('dados','usuario','extensao'));
    }

    public function dados()
    {
        $arr = Cadastro::all();
        //dd($arr);
        $colecao = collect();

        foreach($arr as $dados)
        {
            $acoes = "";

            $acoes .= "<td style='width: 16%;'>
                        <a  href='".url("/home/$dados->id")."' 
                            class='btn btn-link btn-info btn-just-icon like'>
                            <i class='material-icons'>pageview</i>
                        </a>
                    </td>";

                $colecao->push([
                    'razao_social' => $dados->razao_social ,
                    'cnpj' => $dados->cnpj ,
                    'produtos' => $dados->produtos,
                    'porte_empresa' => $dados->porte_empresa ,
                    'acoes' => $acoes
                ]);
        }
        return DataTables::of($colecao)
                ->rawColumns(['acoes'])
                ->make(true);
    }
    
}
