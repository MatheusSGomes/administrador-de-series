<x-app-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Séries
            </h2>
            @auth
            <a href="{{ route('series.create') }}" class="btn btn-dark btn-sm mb-2">Adicionar Série</a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <ul class="list-group">
                        @foreach($series as $serie)
                        <li class="list-group-item d-flex justify-content-between align-itens-center">
                            <div class="d-flex flex-row">
                                <img 
                                    @if($serie->cover === null)
                                        src="{{ asset('storage/series_cover/netflix-capa.webp') }}" 
                                    @else
                                        src="{{ asset('storage/'.$serie->cover) }}" 
                                    @endif
                                    alt="Capa da série" 
                                    class="rounded me-3" 
                                    style="max-width: 100px;"
                                />
                                
                                @auth <a href="{{ route('seasons.index', $serie->id) }}" class="align-self-center"> @endauth
                                    {{ $serie->nome }}
                                @auth </a> @endauth
                            </div>
                            
                            @auth
                            <span class="d-flex">
                            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm align-self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                    
                            <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2 align-self-center">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.854 7.146 8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 1 1 .708-.708z"/>
                                </svg>
                                </button>
                            </form>
                            </span>
                            @endauth
                            
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
