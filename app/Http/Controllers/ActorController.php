<?php

namespace App\Http\Controllers;

use App\Actor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class ActorController extends Controller
{
    const PAGINATE_SIZE = 2;

    public function index(Request $request){

        $actorsName = null;
        if($request->has('actorName')) {
            $actorsName = $request->$actorsName;
            $actors = Actor::where('name', 'like', '%'. $actorsName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $actors = Actor::paginate(self::PAGINATE_SIZE);

        }

        return view('actors.index', ['actors'=>$actors, 'actorName'=>$actorsName]);
    }

    public function create(){
        return view('actors.create');
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
        return view('actors.edit', ['actor'=>$actor]);
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
            'actorNationality' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }

}
