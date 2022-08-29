{{-- <x-layout title="Nova Série">
  <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" />
</x-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle de Séries</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" defer></script>
</head>
<body>
  <div class="container mt-3">
    <h1>Criar série</h1>

    <form action="{{ route('series.store') }}" method="POST">
      @csrf
      
      <div class="row mb-3">
        <div class="col-lg-8">
          <label for="nome" class="form-label">Nome:</label>
          <input 
            type="text"
            autofocus
            name="nome"
            id="nome"
            class="form-control"
            value="{{ old('nome') }}"
          />
        </div>
    
        <div class="col-lg-2 col-md-6">
          <label for="seasonsQty" class="form-label">Nº de temporadas:</label>
          <input 
            type="text"
            name="seasonsQty"
            id="seasonsQty"
            class="form-control"
            value="{{ old('seasonsQty') }}"
          />
        </div>
    
        <div class="col-lg-2 col-md-6">
          <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
          <input 
            type="text"
            name="episodesPerSeason"
            id="episodesPerSeason"
            class="form-control"
            value="{{ old('episodesPerSeason') }}"
          />
        </div>
      </div>
    
      
      <button type="submit" class="btn btn-primary btn-sm">Adicionar</button>
    </form>
  </div>
</body>
</html>


