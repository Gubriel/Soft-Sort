<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('cards.update', ['card' => $card, 'quadro_id' => $quadro_id]) }}">
            @method('patch')
            @csrf
            <div>
                <label class="pl-3 pt-3">Nome:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="nome" id="nome" value="{{ $card->nome }}" placeholder="{{ $card->nome }}" required>
                    <input type="hidden" name="posicao" id="posicao" value="1">
                    <input type="hidden" name="quadroId" id="quadroId" value="{{ $quadro_id }}">
                </div>
                <label class="pl-3 pt-3">Tipo:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="tipo" id="tipo" value="{{ $card->tipo }}" placeholder="{{ $card->tipo }}" required>
                </div>
                <label class="pl-3 pt-3">Quantidade:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="qntd" id="qntd" value="{{ $card->qntd }}" placeholder="{{ $card->qntd }}" required>
                </div>
                <label class="pl-3 pt-3">Quantidade crítica:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="qntd_limite" id="qntd_limite" value="{{ $card->qntd_limite }}" placeholder="{{ $card->qntd_limite }}" required>
                </div>
                <label class="pl-3 pt-4">Tamanho:</label>
                <label class="pl-24 pt-4">Cor:</label>
                <div class="py-2">
                    <input class="h-10 w-20 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" value="{{ $card->tamanho }}" placeholder="{{ $card->tamanho }}" type="text" name="tamanho" id="tamanho" required>
                    <select class="border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" id="unidade" name="unidade">
                        <option value="mm">mm</option>
                        <option value="cm">cm</option>
                        <option value="M">M</option>
                        <option value='"'>Pol (")</option>
                    </select>
                    <input class="w-8 h-4 shadow-lg rounded-sm" type="color" id="cor" name="cor" value="#62A0EA">
                </div>
            </div>
            <div>
                <label class="pl-3 pt-3">Descrição:</label>
                <div class="py-2">
                    <textarea class="border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" name="descricao" id="descricao" rows="5" cols="50" placeholder="{{ $card->descricao }}"></textarea>
                </div>
            </div>
            <button class="rounded-lg w-36 h-9 hover:bg-blue-600 bg-blue-500" type="submit">Editar Card</button>
        </form>
    </div>
</x-app-layout>
