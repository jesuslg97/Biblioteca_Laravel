<?php

namespace App\Http\Controllers;

use App\Serie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class SerieController extends Controller
{
    const PAGINATE_SIZE = 2;

    public function index(Request $request){

        $serieTitle = null;
        if($request->has('serieTitle')) {
            $serieTitle = $request->$serieTitle;
            $series = Serie::where('name', 'like', '%'. $serieTitle . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $series = Serie::paginate(self::PAGINATE_SIZE);

        }

        return view('series.index', ['series'=>$series, 'serieTitle'=>$serieTitle]);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        $this->validateSerie($request)->validate();

        $serie = new Serie();
        $serie->title = $request->serieTitle;
        //$serie->platform = $request->seriePlatform;
        //$serie->director = $request->serieDirector;
        //$serie->actor = $request->serieActors;
        //$serie->audio = $request->serieAudios;
        //$serie->subtitle = $request->serieSubtitles;
        $serie->save();

        return redirect()->route('series.index')->with('success', Lang::get('alerts.series_created_successfully'));
    }

    public function edit(Serie $serie){
        return view('series.edit', ['serie'=>$serie]);
    }

    public function update(Request $request, Serie $serie){
        $this->validateSerie($request)->validate();
        Log::info('Fallo',array($serie));
        $serie->title = $request->serieTitle;
        //$serie->platform = $request->seriePlatform;
        //$serie->director = $request->serieDirector;
        //$serie->actor = $request->serieActors;
        //$serie->audio = $request->serieAudios;
        //$serie->subtitle = $request->serieSubtitles;
        $serie->save();

        return redirect()->route('series.index')->with('success', Lang::get('alerts.series_update_successfully'));
    }

    public function delete(Request $request, Serie $serie){
        if($serie != null) {
            $serie->delete();
            return redirect()->route('series.index')->with('success', Lang::get('alerts.series_delete_successfully'));
        }
        return redirect()->route('series.index')->with('error', Lang::get('alerts.series_delete_error'));
    }

    protected function validateSerie($request) {
        return Validator::make($request->all(), [
            'serieTitle' => ['required', 'string', 'max:255', 'min:1']
            //'seriePlatform' => ['required', 'string', 'max:255', 'min:1']
            //'serieDirector' => ['required', 'string', 'max:255', 'min:1']
            //'serieActors' => ['required', 'string', 'max:255', 'min:1']
            //'serieAudios' => ['required', 'string', 'max:255', 'min:1']
            //'serieSubtitles' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}
