@component('mail::message')
 
# {{ $nomeSerie }} criada
A série {{ $nomeSerie }} com {{ $qtdTemporadas }} tempordas e {{ $episodiosPorTemporada }} episódios por temporada foi criada com sucesso.

Acesse aqui:
@component('mail::button', ['url' => route('seasons.index', $idSerie) ]) Ver série @endcomponent

@endcomponent