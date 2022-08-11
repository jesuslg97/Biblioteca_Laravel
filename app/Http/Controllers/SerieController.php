<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Director;
use App\Actor;
use App\Platform;
use App\Language;
use App\serieActor;
use App\serieLanguage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class SerieController extends Controller
{
    const PAGINATE_SIZE = 2;

    public function index(Request $request){
        $directors = Director::all();
        $actors = Actor::all();
        $platforms = Platform::all();
        $languages = Language::all();

        $serieTitle = null;
        $seriePlatform = null;
        $serieDirector = null;
        $serieActor = null;
        $serieAudio = null;
        $serieSubtitle = null;

        if($request->has('serieTitle') || $request->has('seriePlatform') 
        ||$request->has('serieDirector') ||$request->has('serieActor')
        ||$request->has('serieAudio') ||$request->has('serieSubtitle')) {

            $serieTitle = $request->serieTitle;
            $seriePlatform = $request->seriePlatform;
            $serieDirector =$request->serieDirector;
            $serieActor = $request->serieActor;
            $serieAudio =$request->serieAudio;
            $serieSubtitle =$request->serieSubtitle;

            if($request->has('seriePlatform')  && !empty($seriePlatform)){
                $platformId = Platform::where('name','=',$seriePlatform)->get()->first();
                if($platformId){
                    $platId = $platformId->id;
                }else{
                    $platId = 0;
                }
               
            }else{
                $platId = '';
            }

            if($request->has('serieDirector')  && !empty($serieDirector)){
                $directorId = Director::where('name','=',$serieDirector)->get()->first();
                if($directorId){
                    $dirId = $directorId->id;
                }else{
                    $dirId = 0;
                }
               
            }else{
                $dirId = '';
            }

            if($request->has('serieAudio')  && !empty($serieAudio)){
                $directorId = Director::where('name','=',$serieDirector)->get()->first();
                if($directorId){
                    $dirId = $directorId->id;
                }else{
                    $dirId = 0;
                }
               
            }else{
                $dirId = '';
            }



            $series = Serie::where('title', 'like', '%'. $serieTitle . '%')
            ->where('director','like', '%'. $dirId . '%' )
            ->where('platform', 'like', '%'. $platId . '%')
            ->join('serie_languages',function ($join){
                $join->on('series.id','=','serie_languages.serie_id')
                ->where('serie_languages.language_id','=',1)
                ->where('serie_languages.tipo','=',0);
            })
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $series = Serie::paginate(self::PAGINATE_SIZE);

        }

        return view('series.index', ['series'=>$series, 'serieTitle'=>$serieTitle,'directors'=>$directors,'actors'=>$actors,'platforms'=>$platforms,'languages'=>$languages,'seriePlatform'=> $seriePlatform,'serieDirector'=>$serieDirector,'serieActor'=>$serieActor,'serieAudio'=>$serieAudio,'serieSubtitle'=>$serieSubtitle]);
    }

    public function create(){
        $directors = Director::all();
        $actors = Actor::all();
        $platforms = Platform::all();
        $languages = Language::all();
        return view('series.create',['directors'=>$directors,'actors'=>$actors,'platforms'=>$platforms,'languages'=>$languages]);
    }

    public function store(Request $request){
        $this->validateSerie($request)->validate();
     
        $serie = new Serie();
        $serie->title = $request->serieTitle;
        $serie->platform = $request->seriePlatform;
        $serie->director = $request->serieDirector;
        $serie->save();

        foreach($request->serieActors as $actor){
            $serieActor = new serieActor();
            $serieActor->serie_id = $serie->id;
            $serieActor->actor_id = $actor;
            $serieActor->save();
        }
        foreach($request->serieAudios as $audio){
            
            $serieLanguage = new serieLanguage();
            $serieLanguage->serie_id = $serie->id;
            $serieLanguage->language_id = $audio;
            $serieLanguage->tipo = 0;
            $serieLanguage->save();

        }
        foreach($request->serieSubtitles as $subTitle){

            $serieLanguage = new serieLanguage();
            $serieLanguage->serie_id = $serie->id;
            $serieLanguage->language_id = $subTitle;
            $serieLanguage->tipo = 1;
            $serieLanguage->save();
            
        }

        return redirect()->route('series.index')->with('success', Lang::get('alerts.series_created_successfully'));
    }

    public function edit(Serie $serie){
        $directors = Director::all();
        $actors = Actor::all();
        $platforms = Platform::all();
        $languages = Language::all();
        return view('series.edit', ['serie'=>$serie,'directors'=>$directors,'actors'=>$actors,'platforms'=>$platforms,'languages'=>$languages]);
    }

    public function update(Request $request, Serie $serie){
        $this->validateSerie($request)->validate();
        
        $serie->title = $request->serieTitle;
        $serie->platform = $request->seriePlatform;
        $serie->director = $request->serieDirector;
        $serie->save();

        serieActor::where('serie_id','=',$serie->id)->delete();
        foreach($request->serieActors as $actor){
            $serieActor = new serieActor();
            $serieActor->serie_id = $serie->id;
            $serieActor->actor_id = $actor;
            $serieActor->save();
        }
        serieLanguage::where('serie_id','=',$serie->id)->delete();
        foreach($request->serieAudios as $audio){
            
            $serieLanguage = new serieLanguage();
            $serieLanguage->serie_id = $serie->id;
            $serieLanguage->language_id = $audio;
            $serieLanguage->tipo = 0;
            $serieLanguage->save();

        }
        foreach($request->serieSubtitles as $subTitle){

            $serieLanguage = new serieLanguage();
            $serieLanguage->serie_id = $serie->id;
            $serieLanguage->language_id = $subTitle;
            $serieLanguage->tipo = 1;
            $serieLanguage->save();
            
        }

        return redirect()->route('series.index')->with('success', Lang::get('alerts.series_update_successfully'));
    }

    public function delete(Request $request, Serie $serie){
        if($serie != null) {
            $serie->delete();
            serieActor::where('serie_id','=',$serie->id)->delete();
            serieLanguage::where('serie_id','=',$serie->id)->delete();
            return redirect()->route('series.index')->with('success', Lang::get('alerts.series_delete_successfully'));
        }
        return redirect()->route('series.index')->with('error', Lang::get('alerts.series_delete_error'));
    }

    protected function validateSerie($request) {
        return Validator::make($request->all(), [
            'serieTitle' => ['required', 'string', 'max:255', 'min:1'],
            'seriePlatform' => ['required'],
            'serieDirector' => ['required'],
            'serieActors' => ['required'],
            'serieAudios' => ['required'],
            'serieSubtitles' => ['required']
        ]);
    }
}
