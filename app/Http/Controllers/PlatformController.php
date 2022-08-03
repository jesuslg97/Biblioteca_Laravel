<?php

namespace App\Http\Controllers;

use App\Platform;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class PlatformController extends Controller
{
    public function index(){
        $platforms = Platform::paginate(10);

        return view('platform.list', ['platform'=>$platforms]);
    }

    public function create(){
        return view('platform.create');
    }

    protected function validatePlatform($request) {
        return Validator::make($request->all(), [
            'platformName' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }

    public function store(Request $request){
        $this->validatePlatform($request)->validate();

        $platform = new Platform();
        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platform.index')->with('success', Lang::get('alerts.platforms_created_successfully'));
    }

    public function edit(Platform $platform){
        return view('platform.create', ['platform'=>$platform]);
    }

    public function update(Request $request, Platform $platform){
        $this->validatePlatform($request)->validate();

        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platform.update')->with('success', Lang::get('alerts.platforms_update_successfully'));
    }

    public function delete(Request $request, Platform $platform){
        if($platform != null) {
            $platform->delete();
            return redirect()->route('platform.index')->with('success', Lang::get('alerts.platforms_delete_successfully'));
        }
        return redirect()->route('platform.index')->with('error', Lang::get('alerts.platforms_delete_error'));
    }
}
