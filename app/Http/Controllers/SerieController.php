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
    const PAGINATE_SIZE = 10;

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

            //Actores
            if($request->has('serieActor')  && !empty($serieActor)){
                $actorId = Actor::where('name','=',$serieActor)->get()->first();
                if($actorId){
                    $actId = $actorId->id;
                }else{
                    $actId = 0;
                }
               
            }else{
                $actId = '';
            }

            $sActor = [];
            if( $actId != 0){
               
                $seriesActor = serieActor::where('actor_id','=',$actId)->get();
                foreach($seriesActor as $sa){
                    array_push($sActor,$sa->serie_id);
                }

                if($sActor == []){
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sActor,$serie->id);
                    }
                }
            }else{
                array_push($sActor,0);
            }
            //Fin actores


        
            //Audio
            if($request->has('serieAudio')  && !empty($serieAudio)){
                $audioId = Language::where('name','=',$serieAudio)->get()->first();
                if($audioId){
                    $audId = $audioId->id;
                }else{
                    $audId = 0;
                }
               
            }else{
                $audId = '';
            }

            $sAudio = [];
            if($audId != 0 ){
                $seriesAudio = serieLanguage::where('language_id','=',$audId)->where('tipo','=',0)->get();
               
                foreach($seriesAudio as $sa){
                    array_push($sAudio,$sa->serie_id);
                }

                if($sAudio == [] && ($audId == 0 ||  $audId == '')){
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sAudio,$serie->id);
                    }
                }else{
                    Log::info('b');
                    array_push($sAudio,0);
                }
            }else{
                array_push($sAudio,0);
            }
           
            //Fin audio

            //Subtitulos

            if($request->has('serieSubtitle')  && !empty($serieSubtitle)){
                $subtitleId = Language::where('name','=',$serieSubtitle)->get()->first();
                if($subtitleId){
                    $subId = $subtitleId->id;
                }else{
                    $subId = 0;
                }
               
            }else{
                $subId = '';
            }
            
            $sSub = [];
            if($subId != 0){
                $seriesSub = serieLanguage::where('language_id','=',$subId)->where('tipo','=',1)->get();
                
                foreach($seriesSub as $sa){
                    array_push($sSub,$sa->serie_id);
                }

                if($sSub == []  && ($subId == 0 ||  $subId == '')){
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sSub,$serie->id);
                    }
                }else{
                    array_push($sSub,0);
                }
            }else{
                array_push($sSub,0);
            }

            //Fin subtitulos

            $series = Serie::where('title', 'like', '%'. $serieTitle . '%')
            ->where('director','like', '%'. $dirId . '%' )
            ->where('platform', 'like', '%'. $platId . '%')
            ->whereIn('id', $sActor)
            ->whereIn('id', $sAudio)
            ->whereIn('id', $sSub)
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
            Log::info('audio',array($audio));
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


    public function find(Request $request){
        $directors = Director::all();
        $actors = Actor::all();
        $platforms = Platform::all();
        $languages = Language::all();

        $serieFind = null;


        if($request->has('serieFind')) {

            $serieFind = $request->serieFind;
           

            if($request->has('serieFind')  && !empty($serieFind)){
                $platformId = Platform::where('name','=',$serieFind)->get()->first();
                if($platformId){
                    $platId = $platformId->id;
                }else{
                    $platId = 0;
                }
               
            }else{
                $platId = '';
            }

            if($request->has('serieFind')  && !empty($serieFind)){
                $directorId = Director::where('name','=',$serieFind)->get()->first();
                if($directorId){
                    $dirId = $directorId->id;
                }else{
                    $dirId = 0;
                }
               
            }else{
                $dirId = '';
            }

            //Actores
            if($request->has('serieFind')  && !empty($serieFind)){
                $actorId = Actor::where('name','=',$serieFind)->get()->first();
                if($actorId){
                    $actId = $actorId->id;
                }else{
                    $actId = 0;
                }
               
            }else{
                $actId = '';
            }

            $sActor = [];
            if( $actId != 0){
               
                $seriesActor = serieActor::where('actor_id','=',$actId)->get();
                foreach($seriesActor as $sa){
                    array_push($sActor,$sa->serie_id);
                }

                if($sActor == []){
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sActor,$serie->id);
                    }
                }
            }else{
                array_push($sActor,0);
            }
            //Fin actores


        
            //Audio
            if($request->has('serieFind')  && !empty($serieFind)){
                $audioId = Language::where('name','=',$serieFind)->get()->first();
                if($audioId){
                    $audId = $audioId->id;
                }else{
                    $audId = 0;
                }
               
            }else{
                $audId = '';
            }

            $sAudio = [];
            if($audId != 0){
                $seriesAudio = serieLanguage::where('language_id','=',$audId)->where('tipo','=',0)->get();
               
                foreach($seriesAudio as $sa){
                    array_push($sAudio,$sa->serie_id);
                }

                if($sAudio == [] && $audId == 0){
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sAudio,$serie->id);
                    }
                }else{
                    array_push($sAudio,0);
                }
            }else{
                array_push($sAudio,0);
            }
           
            //Fin audio

            //Subtitulos

            if($request->has('serieFind')  && !empty($serieFind)){
                $subtitleId = Language::where('name','=',$serieFind)->get()->first();
                if($subtitleId){
                    $subId = $subtitleId->id;
                }else{
                    $subId = 0;
                }
               
            }else{
                $subId = '';
            }
            Log::info('a',array($subId));
            $sSub = [];
            if($subId != 0){
                $seriesSub = serieLanguage::where('language_id','=',$subId)->where('tipo','=',1)->get();
               
                foreach($seriesSub as $sa){
                    array_push($sSub,$sa->serie_id);
                }

                if($sSub == [] && $subId == 0){
                    Log::info('b',array($subId));
                    $s = Serie::all();
                    foreach($s as $serie){
                        array_push($sSub,$serie->id);
                    }
                }else{
                    array_push($sSub,0);
                }
            }else{
                array_push($sSub,0);
            }

            Log::info('',array());
            Log::info('',array($sAudio));
            Log::info('',array($sSub));
            //Fin subtitulos

            $series = Serie::where('title', 'like', '%'. $serieFind . '%')
            ->orWhere('director','like', '%'. $dirId . '%' )
            ->orWhere('platform', 'like', '%'. $platId . '%')
            ->orWhereIn('id', $sActor)
            ->orWhereIn('id', $sAudio)
            ->orWhereIn('id', $sSub)
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $series = Serie::paginate(self::PAGINATE_SIZE);

        }

        return view('series.index', ['series'=>$series, 'serieFind'=>$serieFind,'directors'=>$directors,'actors'=>$actors,'platforms'=>$platforms,'languages'=>$languages]);
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
