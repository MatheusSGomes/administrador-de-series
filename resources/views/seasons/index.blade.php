<x-app-layout title="Temporadas">
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
            @if(count($seasons) == 0) <p>Não há temporadas cadastradas</p> @endif
            <img 
              src="{{ asset('storage/'.$series->cover) }}" 
              alt="Capa da série" 
              class="rounded mx-auto d-block mb-3" 
              style="max-width: 400px;"
            />

            <ul class="list-group">
              @foreach($seasons as $season)
                <li class="list-group-item d-flex justify-content-between align-itens-center">
                  <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                  </a>

                  <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                  </span>
                </li>
              @endforeach
            </ul>
          </div>
      </div>
    </div>
  </div>
</x-app-layout>
