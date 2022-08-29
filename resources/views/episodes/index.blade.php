{{-- <x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
  <form method="post">
    @csrf 
    
    <ul class="list-group">
      @foreach($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-itens-center">
          Episódio {{ $episode->number }}
          <input 
            type="checkbox" 
            name="episodes[]" 
            value="{{ $episode->id }}"
            @if ($episode->watched) checked @endif
          />
        </li>
      @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
  </form>
</x-layout> --}}

<x-app-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
  <x-slot name="header">
      <div class="d-flex justify-content-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Temporadas
          </h2>
      </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form method="post">
              @csrf 
              
              <ul class="list-group">
                @foreach($episodes as $episode)
                  <li class="list-group-item d-flex justify-content-between align-itens-center">
                    Episódio {{ $episode->number }}
                    <input 
                      type="checkbox" 
                      name="episodes[]" 
                      value="{{ $episode->id }}"
                      @if ($episode->watched) checked @endif
                    />
                  </li>
                @endforeach
              </ul>
              <button class="btn btn-primary mt-2 mb-2">Salvar</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</x-app-layout>