<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\EloquentSeriesRepository;
use App\Http\Middleware\Autenticador;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use App\Models\{
    Series,
    Season,
    Episode,
    User
};

class SeriesController extends Controller
{
    public function __construct(private EloquentSeriesRepository $repository)
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(Request $request)
    {
        // $series = Series::query()->orderBy('nome')->get();
        // $series = Series::with(['temporadas'])->get();
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('dashboard')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, EloquentSeriesRepository $repository)
    {
        $serie = $this->repository->add($request);

        
        foreach(User::all() as $user) {
            $email = new SeriesCreated(
                $serie->nome,
                $serie->id,
                $request->seasonsQty,
                $request->episodesPerSeason
            );
            $email->subject = 'Nova série criada';
            
            Mail::to($user)->queue($email);
            // sleep(2);
        }
        
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')
            ->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
}