<?php

namespace App\Http\Controllers;

use App\Nationality;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class NationalityController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){

        $nationalityName = null;
        if($request->has('nationalityName')) {
            $nationalityName = $request->nationalityName;
            $nationalities = Nationality::where('name', 'like', '%'. $nationalityName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $nationalities = Nationality::paginate(self::PAGINATE_SIZE);

        }

        return view('nationalities.index', ['nationalities'=>$nationalities, 'nationalityName'=>$nationalityName]);
    }

    public function create(){
        return view('nationalities.create');
    }

    public function store(Request $request){
        $this->validateNationality($request)->validate();

        $nationality = new Nationality();
        $nationality->name = $request->nationalityName;
        $nationality->save();

        return redirect()->route('nationalities.index')->with('success', Lang::get('alerts.nationalities_created_successfully'));
    }

    public function edit(Nationality $nationality){
        return view('nationalities.edit', ['nationality'=>$nationality]);
    }

    public function update(Request $request, Nationality $nationality){
        $this->validateNationality($request)->validate();
        Log::info('Fallo',array($nationality));
        $nationality->name = $request->nationalityName;
        $nationality->save();

        return redirect()->route('nationalities.index')->with('success', Lang::get('alerts.nationalities_update_successfully'));
    }

    public function delete(Request $request, Nationality $nationality){
        if($nationality != null) {
            $nationality->delete();
            return redirect()->route('nationalities.index')->with('success', Lang::get('alerts.nationalities_delete_successfully'));
        }
        return redirect()->route('nationalities.index')->with('error', Lang::get('alerts.nationalities_delete_error'));
    }

    protected function validateNationality($request) {
        return Validator::make($request->all(), [
            'nationalityName' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }

}
