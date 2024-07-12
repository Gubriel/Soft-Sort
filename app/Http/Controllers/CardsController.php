<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Coluna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($coluna_id)
    {
        return view('cards.create', compact('coluna_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $coluna_id)
    {
        $request->validate([

            'coluna_id' => 'required',
            'nome' => 'required',
            'tipo' => 'required',
            'tamanho' => 'required',
            'cor' => 'required',
            'descricao' => 'nullable',
            'qntd' => 'required',
            'qntd_limite' => 'required',
            'posicao' => 'nullable',
        ]);

        $ncard = new Cards;
        $ncard->coluna_id = $request->input('coluna_id');
        $ncard->nome = $request->input('nome');
        $ncard->tipo = $request->input('tipo');
        $ncard->tamanho = $request->input('tamanho');
        $ncard->cor = $request->input('cor');
        $ncard->descricao = $request->input('descricao');
        $ncard->qntd = $request->input('qntd');
        $ncard->qntd_limite = $request->input('qntd_limite');
        $ncard->posicao = $request->input('posicao');
        $ncard->save();
        return redirect()->route('quadros.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cards $card, Coluna $coluna)
    {
        return view('cards.edit', compact('coluna', 'card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cards $card): RedirectResponse
    {
        $ncard = Cards::find($card->id);
        $ncard->nome = $request->input('nome');
        $ncard->tipo = $request->input('tipo');
        $ncard->tamanho = $request->input('tamanho');
        $ncard->cor = $request->input('cor');
        $ncard->descricao = $request->input('descricao');
        $ncard->qntd = $request->input('qntd');
        $ncard->qntd_limite = $request->input('qntd_limite');
        $ncard->posicao = $request->input('posicao');
        $ncard->save();
        $quadroId = $request->input('coluna_id');

        return redirect()->route('quadros.show', [$quadroId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cards $card, Coluna $coluna): RedirectResponse
    {
        $card->delete();
        $quadroId = $coluna->quadro_id;
        return redirect()->route('quadros.show', [$quadroId])->with('success','Coluna Deletada com Sucesso!');
    }
}
