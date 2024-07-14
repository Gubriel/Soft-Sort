<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Coluna;
use App\Models\quadros;
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
    public function store(Request $request)
    {
        $request->validate([
            'coluna_id' => 'required|',
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
        $ntama = $request->input('tamanho') . $request->input('unidade');
        $ncard->tamanho = $ntama;
        $ncard->cor = $request->input('cor');
        $ncard->descricao = $request->input('descricao');
        $ncard->qntd = $request->input('qntd');
        $ncard->qntd_limite = $request->input('qntd_limite');
        $ncard->posicao = $request->input('posicao');
        $ncard->save();

        $coluna = Coluna::findOrFail($request->input('coluna_id'));
        $quadro_id = $coluna->quadro_id; // Altere conforme a estrutura de relacionamento

        return redirect()->route('quadros.show', [$quadro_id]);
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
    public function edit(Cards $card, $quadro_id)
    {
        return view('cards.edit', compact('card', 'quadro_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cards $card): RedirectResponse
    {
        $ncard = Cards::find($card->id);
        $quadroId = $request->input('quadroId');
        $ncard->nome = $request->input('nome');
        $ncard->tipo = $request->input('tipo');
        $ncard->tamanho = " ";
        $ntama = $request->input('tamanho') . $request->input('unidade');
        $ncard->tamanho = $ntama;
        $ncard->cor = $request->input('cor');
        $ncard->descricao = $request->input('descricao');
        $ncard->qntd = $request->input('qntd');
        $ncard->qntd_limite = $request->input('qntd_limite');
        $ncard->posicao = $request->input('posicao');
        $ncard->save();

        return redirect()->route('quadros.show', ['quadro' => $quadroId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cards $card): RedirectResponse
    {
        $card->delete();
        $coluna = Coluna::findOrFail($card->coluna_id); // Alteração aqui para pegar a coluna do card
        $quadro_id = $coluna->quadro_id;
        return redirect()->route('quadros.show', ['quadro' => $quadro_id]);

    }

    public function increment(Cards $card)
    {
        $card->increment('qntd');
        $card->save();

        return back();
    }

    public function decrement(Cards $card)
    {
        if ($card->qntd > 0) {
            $card->decrement('qntd');
            $card->save();
        }

        return back();
    }
}
