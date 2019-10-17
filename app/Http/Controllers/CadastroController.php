<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use App\Cadastro;
use App\Arquivo;

class CadastroController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function store(Request $request)
    {
      // dd($request->files);
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

        $photos = count($request->photos);
        
        
        foreach ($request->photos as $photo) {
            
            $filename = $photo->store('photos');
            Arquivo::create([
                'cadastro_id' => $cadastro->id,
                'filename' => $filename,
                'extensao' => $photo->extension()
            ]);
        }
        //dd($photo->extension());
        // return view('user.sucesso');
        return redirect()->action('CadastroController@sucesso');
        //dd($request);
    }

    public function sucesso()
    {
        return view('user.sucesso');
    }

}
