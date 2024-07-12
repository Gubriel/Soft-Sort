<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('colunas.edit', $coluna->id) }}">
            @method('patch')
            @csrf
            <div>
                <label class="pl-3 pt-3">Editar nome:</label>
                <div class="py-2">
                    <input class="h-8 border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" type="text" name="nome" id="nome" placeholder="{{ $coluna->nome }}" required>
                </div>
            </div>
            <div>
                <label class="pl-3 pt-3">Editar descrição:</label>
                <div class="py-2">
                    <textarea class="border-gray-300 shadow-lg rounded-md focus:border-0 hover:border-gray-400" name="descricao" id="descricao" rows="5" cols="50" placeholder="{{ $coluna->descricao }}" ></textarea>
                </div>
            </div>
            <button class="rounded-lg w-28 h-9 hover:bg-blue-600 bg-blue-500" type="submit">Editar</button>
        </form>
    </div>
</x-app-layout>
