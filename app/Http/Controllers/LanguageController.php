<?php

namespace App\Http\Controllers;

use App\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class LanguageController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){

        $languagesName = null;
        $isoCode = null;
        if($request->has('languageName') || $request->has('isoCode')) {
            $languagesName = $request->languageName;
            $isoCode = $request->isoCode;

            $languages = Language::where('name', 'like', '%'. $languagesName . '%')
            ->where('ISO_code', 'like', '%'. $isoCode . '%')
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $languages = Language::paginate(self::PAGINATE_SIZE);

        }

        return view('languages.index', ['languages'=>$languages, 'languageName'=>$languagesName,'isoCode'=>$isoCode]);
    }

    public function create(){
        return view('languages.create');
    }

    public function store(Request $request){
        $this->validateLanguage($request)->validate();

        $language = new Language();
        $language->name = $request->languageName;
        $language->ISO_code = $request->languageISO;
        $language->save();

        return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_created_successfully'));
    }

    public function edit(Language $language){
        return view('languages.edit', ['language'=>$language]);
    }

    public function update(Request $request, Language $language){
        $this->validateLanguage($request)->validate();
        Log::info('Fallo',array($language));
        $language->name = $request->languageName;
        $language->ISO_code = $request->languageISO;
        $language->save();

        return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_update_successfully'));
    }

    public function delete(Request $request, Language $language){
        if($language != null) {
            $language->delete();
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_delete_successfully'));
        }
        return redirect()->route('languages.index')->with('error', Lang::get('alerts.languages_delete_error'));
    }


    public function find(Request $request){
        Log::info('Busqieda avanzada');
        $languagesName = null;

        if($request->has('languageFind') ) {
            $languagesName = $request->languageFind;
         
            $languages = Language::where('name', 'like', '%'. $languagesName . '%')
            ->orWhere('ISO_code', 'like', '%'. $languagesName . '%')
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $languages = Language::paginate(self::PAGINATE_SIZE);

        }

        return view('languages.index', ['languages'=>$languages, 'languageFind'=>$languagesName]);

    }
    protected function validateLanguage($request) {
        return Validator::make($request->all(), [
            'languageName' => ['required', 'string', 'max:255', 'min:1'],
            'languageISO' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }

}
