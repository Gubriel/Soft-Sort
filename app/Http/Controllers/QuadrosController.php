<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cards;
use App\Models\Coluna;
use App\Models\quadros;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuadrosController extends Controller
{
    /**
     * Mostra a Listagem dos quadros criados.
     */
    public function index(User $user): View
    {
        return view('quadros.index', ['quadros' => quadros::with('user')->latest()->get()]);
    }

    /**
     * Apresenta o form de criação de novo quadro.
     */
    public function create()
    {
        return view('quadros.create', ['user' => auth()->user()]);
    }

    /**
     * Armazena o no quadro criado.
     */
    public function store(Request $request)
    {

        $request->validate([

            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        $nquadro = new quadros;
        $nquadro->user_id = $request->input('user_id');
        $nquadro->nome = $request->input('nome');
        $nquadro->descricao = $request->input('descricao');
        $nquadro->save();
        return redirect()->route('quadros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(quadros $quadro)
    {
        $colunas = Coluna::where('quadro_id', '=', $quadro->id)->get();
        $cards   = Cards::all();
        return view('quadros.show', compact('cards', 'colunas', 'quadro'));
    }

    /**
     * Apresenta o form para a edição do novo quadro.
     */
    public function edit(quadros $quadro)
    {
        return view('quadros.edit', compact('quadro'), ['user' => auth()->user()]);
    }

    /**
     * Atualiza o quadro no banco de dados.
     */
    public function update(Request $request, quadros $quadro): RedirectResponse
    {
        $quadro->update($request->only(['user_id','nome','descricao']));
        return redirect()->route('quadros.index');
    }

    /**
     * Remove o quadro especifico no banco de dados.
     */
    public function destroy(quadros $quadro): RedirectResponse
    {
        $quadro->delete();
        return redirect()->route('quadros.index');
    }
}
