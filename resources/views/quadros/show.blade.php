<x-app-layout>
    <div class="text-center pt-8 text-2xl font-bold">
        <a href="{{ route('quadros.index') }}">
            {{ $quadro->nome }}
        </a>
    </div>
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="mt-6 flex justify-center max-w-9xl">
            @foreach($colunas as $coluna)
            <div class="mr-10 flex">
                <div class="flex-col max-h-10 p-2 justify-center">
                    <div class="rounded-lg w-72 hover:bg-blue-500 bg-white flex items-center justify-center">
                        <div class="pt-2 pb-2 flex-col justify-end">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <span title="{{ $coluna->descricao }}">{{ $coluna->nome }}</span>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    @csrf
                                    <x-dropdown-link :href="route('colunas.edit', $coluna->id)">
                                        {{ __('Editar') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('colunas.destroy', ['coluna' => $coluna->id, 'quadro_id' => $quadro->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('colunas.destroy', $coluna->id)"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Excluir') }}
                                        </x-dropdown-link>
                                    </form>
                                    <x-dropdown-link :href="route('cards.create', $coluna->id)">
                                        {{ __('Criar Card') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                    @foreach($cards as $card)
                    @if($card->coluna_id == $coluna->id)
                    <div class="mt-3">
                        <div class="rounded-lg w-72 border-gray-300" style="background-color: {{$card->cor}}" draggable="true">
                            <div class="text-center font-extrabold p-2">
                                <span>{{ $card->nome }}</span>
                            </div>
                            <div class="rounded-lg m-2" style="background-color: {{ $card->cor }}">
                                <p><strong>Descrição:</strong> {{ $card->descricao }}</p>
                                <p><strong>Tamanho:</strong> {{ $card->tamanho }}</p>
                                <p><strong>Categoria:</strong> {{ $card->tipo }}</p>
                                <div class="flex justify-between">
                                    <p><strong>Quantidade em estoque:</strong> {{ $card->qntd }}</p>
                                    <form method="POST" action="{{ route('cards.increment', ['card' => $card->id]) }}">
                                        @csrf
                                        <button type="submit" class="bg-gray-500 hover:bg-green-700 text-black font-bold px-2 rounded">+</button>
                                    </form>
                                    <form method="POST" action="{{ route('cards.decrement', ['card' => $card->id]) }}">
                                        @csrf
                                        <button type="submit" class=" bg-gray-500 hover:bg-red-700 text-black font-bold px-2 rounded">-</button>
                                    </form>
                                </div>
                                <p><strong>Quantidade Critíca:</strong> {{ $card->qntd_limite }}</p>
                            </div>
                            <div>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="rounded-b-lg  w-72 h-8 hover:bg-gray-500 opacity-40">
                                            <span>☰</span>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @csrf
                                        <x-dropdown-link :href="route('cards.edit', ['card' => $card->id, 'quadro_id' => $quadro->id])">
                                            {{ __('Editar') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('cards.destroy', ['card' => $card->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('cards.destroy', ['card' => $card->id])"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Excluir') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="pt-2">
                <button class="rounded-lg w-72 max-h-10 p-2 hover:bg-blue-500 bg-white" type="submit" onclick="window.location.href='{{ route('colunas.create', ['quadro_id' => $quadro->id]) }}'">Adicionar Coluna +</button>
            </div>
            </div>
    </div>
</x-app-layout>
