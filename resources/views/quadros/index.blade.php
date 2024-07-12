<x-app-layout>
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
        <button class="rounded-lg w-28 h-9 hover:bg-blue-600 bg-blue-500" type="submit" onclick="window.location.href='{{ route('quadros.create') }}'">+ Adicionar</button>
        {{-- <button class="rounded-lg w-32 h-9 hover:bg-yellow-600 bg-yellow-500" type="submit" onclick="window.location.href='{{ route('quadros.index') }}'">Gerar Relatórios</button> --}}
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($quadros as $quadro)
                <div class="p-6 flex space-x-2">
                    <svg id="erVMn6mZKqC1" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" style="background-color:transparent">
                        <rect width="216.826004" height="126.195029" rx="6" ry="6" transform="translate(41.586998 63.097515)" fill="none" stroke="#050505" stroke-width="5"/>
                        <line x1="11.472275" y1="-27.246654" x2="-11.472275" y2="27.246654" transform="translate(138.527725 216.539198)" fill="none" stroke="#030404" stroke-width="4"/>
                        <line x1="11.472275" y1="-27.246654" x2="-11.472275" y2="27.246654" transform="matrix(-1 0 0 1 161.472275 216.539198)" fill="none" stroke="#030404" stroke-width="4"/>
                        <polygon points="0,-30 28.531695,-9.27051 17.633558,24.27051 -17.633558,24.27051 -28.531695,-9.27051 0,-30" transform="matrix(.410453-.862189 1.136461 0.541022 150 129.059775)" fill="#d2dbed" stroke-width="0"/>
                    </svg>

                    <div class="flex-1">
                        <div class="flex justify-between justify-items-end">
                            <div>
                                <span class="text-gray-800">Criado por: {{ $quadro->user->name }} </span>
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    @csrf
                                    <x-dropdown-link :href="route('quadros.edit', $quadro)">
                                        {{ __('Editar') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('quadros.destroy', $quadro) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('quadros.destroy', $quadro)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Excluir') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <p class="mt-4 text-lg text-gray-900"><a href=" {{ route('quadros.show', $quadro->id) }} ">{{ $quadro->nome }}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
