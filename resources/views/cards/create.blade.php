<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('cards.store', ['coluna_id' => $coluna_id]) }}">
            @csrf
            <div>
                <label class="pl-3 pt-3">Nome:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="nome" id="nome" placeholder="Nome do novo card" required>
                    <input type="hidden" name="posicao" id="posicao" value="1">
                </div>
                <label class="pl-3 pt-3">Quantidade:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="qntd" id="qntd" placeholder="Quantidade atual" required>
                </div>
                <label class="pl-3 pt-3">Quantidade crítica:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="qntd_limite" id="qntd_limite" placeholder="Quantidade crítica" required>
                </div>
                <label class="pl-3 pt-3">Tipo:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="tipo" id="tipo" placeholder="Tipo" required>
                </div>
                <label class="pl-3 pt-3">Tamanho:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="tamanho" id="tamanho" placeholder="Tamanho" required>
                </div>
                <div>
                    <label class="pl-3 pt-3" for="cor">Escolha uma cor:</label>
                    <div class="pl-3 pt-3">
                        <input class="w-10 h-10" type="color" id="cor" name="cor" value="#62A0EA">
                    </div>
                </div>
            </div>
            <div>
                <label class="pl-3 pt-3">Descrição:</label>
                <div class="py-2">
                    <textarea class="border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" name="descricao" id="descricao" rows="5" cols="50" placeholder="Descrição para o card"></textarea>
                </div>
            </div>
            <button class="rounded-lg w-36 h-9 hover:bg-blue-600 bg-blue-500" type="submit">Adicionar Card</button>
        </form>
    </div>
</x-app-layout>
