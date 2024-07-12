<?php

namespace App\Http\Controllers;

use App\Models\Coluna;
use App\Models\quadros;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ColunasController extends Controller
{
    public function create($quadro_id): View
    {
        return view('colunas.create', compact('quadro_id'));
    }

    public function store(Request $request, $quadro_id): RedirectResponse
    {
        $request->validate([

            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        $ncoluna = new Coluna;
        $ncoluna->quadro_id = $quadro_id;
        $ncoluna->nome = $request->input('nome');
        $ncoluna->descricao = $request->input('descricao');
        $ncoluna->save();

        return redirect()->route('quadros.show', ['quadro' => $quadro_id])->with('success','Coluna Cadastrada com Sucesso!');
    }

    public function edit(Coluna $coluna, quadros $quadro): View
    {
        // $quadro_id = Coluna::where('quadro_id', '=', $quadro->id)->get();
        return view('colunas.edit', compact('quadro', 'coluna'));
    }

    public function update(Request $request, Coluna $coluna): RedirectResponse
    {

        $ncoluna = Coluna::find($coluna->id);
        $quadroId = $coluna->quadro_id;
        $ncoluna->nome = $request->input('nome');
        $ncoluna->descricao = $request->input('descricao');
        $ncoluna->save();

        return redirect()->route('quadros.show', [$quadroId]);
    }

    public function destroy(Coluna $coluna): RedirectResponse
    {
        $coluna->delete();
        $quadroId = $coluna->quadro_id;
        return redirect()->route('quadros.show', [$quadroId])->with('success','Coluna Deletada com Sucesso!');
    }
}
