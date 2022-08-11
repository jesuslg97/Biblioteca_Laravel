<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Nationality;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class ActorController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){
        $nationalities = Nationality::all();
        $actorsName = null;
        $actorSurname = null;
        $actorDate = null;
        $actorNationality = null;
        if($request->has('actorName') || $request->has('actorSurname') || $request->has('actorDate') || $request->has('actorNationality')) {
            $actorsName = $request->actorName;
            $actorSurname = $request->actorSurname;
            $actorDate = $request->actorDate;
            $actorNationality = $request->actorNationality;
            if($request->has('actorNationality') && !empty($actorNationality)){
                $nationalityId = Nationality::where('name','=',$actorNationality)->get()->first();
                if($nationalityId){
                    $id = $nationalityId->id;
                }else{
                    $id = 0;
                }
               
            }else{
                $id = '';
            }
            $actors = Actor::where('name', 'like', '%'. $actorsName . '%')
            ->where('surname', 'like', '%'. $actorSurname . '%')
            ->where('date', 'like', '%'. $actorDate . '%')
            ->where('nationality', 'like', '%'. $id . '%' )
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $actors = Actor::paginate(self::PAGINATE_SIZE);

        }

        return view('actors.index', ['actors'=>$actors, 'actorName'=>$actorsName,'nationalities'=>$nationalities,'actorSurname'=>$actorSurname,'actorDate'=>$actorDate,'actorNationality'=>$actorNationality]);
    }

    public function create(){
        $nationalities = Nationality::all();
        return view('actors.create',[ 'nationalities'=>$nationalities]);
    }

    public function store(Request $request){
        $this->validateActor($request)->validate();

        $actor = new Actor();
        $actor->name = $request->actorName;
        $actor->surname = $request->actorSurname;
        $actor->date = $request->actorDate;
        $actor->nationality = $request->actorNationality;
        $actor->save();

        return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_created_successfully'));
    }

    public function edit(Actor $actor){
        $nationalities = Nationality::all();
        return view('actors.edit', ['actor'=>$actor,'nationalities'=>$nationalities]);
    }

    public function update(Request $request, Actor $actor){
        $this->validateActor($request)->validate();
        Log::info('Fallo',array($actor));
        $actor->name = $request->actorName;
        $actor->surname = $request->actorSurname;
        $actor->date = $request->actorDate;
        $actor->nationality = $request->actorNationality;
        $actor->save();

        return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_update_successfully'));
    }

    public function delete(Request $request, Actor $actor){
        if($actor != null) {
            $actor->delete();
            return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_delete_successfully'));
        }
        return redirect()->route('actors.index')->with('error', Lang::get('alerts.actors_delete_error'));
    }

    protected function validateActor($request) {
        return Validator::make($request->all(), [
            'actorName' => ['required', 'string', 'max:255', 'min:1'],
            'actorSurname' => ['required', 'string', 'max:255', 'min:1'],
            'actorDate' => ['required', 'date'],
            'actorNationality' => ['required', 'int']
        ]);
    }

}
