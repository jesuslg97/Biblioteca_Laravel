<?php

namespace App\Http\Controllers;

use App\Platform;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 2;

    public function index(Request $request){
        
        $platformName = null;
        if($request->has('platformName')) {
            $platformName = $request->$platformName;
            $platforms = Platform::where('name', 'like', '%'. $platformName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $platforms = Platform::paginate(self::PAGINATE_SIZE);
    
        }

        return view('platforms.index', ['platforms'=>$platforms, 'platformName'=>$platformName]);
    }

    public function create(){
        return view('platforms.create');
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

        return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_created_successfully'));
    }

    public function edit(Platform $platform){
        return view('platforms.create', ['platform'=>$platform]);
    }

    public function update(Request $request, Platform $platform){
        $this->validatePlatform($request)->validate();

        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platforms.update')->with('success', Lang::get('alerts.platforms_update_successfully'));
    }

    public function delete(Request $request, Platform $platform){
        if($platform != null) {
            $platform->delete();
            return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_delete_successfully'));
        }
        return redirect()->route('platforms.index')->with('error', Lang::get('alerts.platforms_delete_error'));
    }
}
