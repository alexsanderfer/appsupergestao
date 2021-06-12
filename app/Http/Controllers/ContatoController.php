<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();
        return view(
            'site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvar(Request $request)
    {
        // Validação dos Dados do Form recebidos via request
        $request->validate([
            'nome' => 'required|min:3|max:40', // Nomes com mínimo de 3 caracteres e máx 40
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        // SiteContato::create($request->all());
    }
}
