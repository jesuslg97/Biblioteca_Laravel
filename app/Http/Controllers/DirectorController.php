<?php

namespace App\Http\Controllers;

use App\Director;
use App\Nationality;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class DirectorController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){
        
        $nationalities = Nationality::all();
        $directorsName = null;
        $directorSurname = null;
        $directorDate = null;
        $directorNationality = null;
        if($request->has('directorName') || $request->has('directorSurname') || $request->has('directorDate') || $request->has('directorNationality')) {
            $directorsName = $request->directorName;
            $directorSurname = $request->directorSurname;
            $directorDate = $request->directorDate;
            $directorNationality = $request->directorNationality;
            if($request->has('directorNationality') && !empty($directorNationality)){
                $nationalityId = Nationality::where('name','=',$directorNationality)->get()->first();
                if($nationalityId){
                    $id = $nationalityId->id;
                }else{
                    
                    $id = 0;
                }
               
            }else{
             
                $id = '';
            }
         
           
            $directors = Director::where('name', 'like', '%'. $directorsName . '%')
            ->where('surname', 'like', '%'. $directorSurname . '%')
            ->where('date', 'like', '%'. $directorDate . '%')
            ->where('nationality', 'like', '%'. $id . '%')
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $directors = Director::paginate(self::PAGINATE_SIZE);
            

        }
        
        return view('directors.index', ['directors'=>$directors, 'directorName'=>$directorsName,'nationalities'=>$nationalities,'directorSurname'=>$directorSurname,'directorDate'=>$directorDate,'directorNationality'=>$directorNationality]);
    }

    public function create(){
        $nationalities = Nationality::all();
       
        return view('directors.create',[ 'nationalities'=>$nationalities]);
    }
    

    public function store(Request $request){
        $this->validateDirector($request)->validate();
        Log::info('aa',array($request->directorNationality));
        $director = new Director();
        $director->name = $request->directorName;
        $director->surname = $request->directorSurname;
        $director->date = $request->directorDate;
        $director->nationality = $request->directorNationality;
        $director->save();

        return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_created_successfully'));
    }

    public function edit(Director $director){
        $nationalities = Nationality::all();
        return view('directors.edit', ['director'=>$director,'nationalities'=>$nationalities]);
    }

    public function update(Request $request, Director $director){
        $this->validateDirector($request)->validate();
        Log::info('Fallo',array($director));
        $director->name = $request->directorName;
        $director->surname = $request->directorSurname;
        $director->date = $request->directorDate;
        $director->nationality = $request->directorNationality;
        $director->save();

        return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_update_successfully'));
    }

    public function delete(Request $request, Director $director){
        if($director != null) {
            $director->delete();
            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_delete_successfully'));
        }
        return redirect()->route('directors.index')->with('error', Lang::get('alerts.directors_delete_error'));
    }

    public function find(Request $request){
        
        $nationalities = Nationality::all();
        $directorsName = null;
        if($request->has('directorFind')) {
            $directorsName = $request->directorFind;
            
            if($request->has('directorFind') && !empty($directorsName)){
                $nationalityId = Nationality::where('name','=',$directorsName)->get()->first();
                if($nationalityId){
                    $id = $nationalityId->id;
                }else{
                    
                    $id = 0;
                }
               
            }else{
             
                $id = '';
            }
         
            
            $directors = Director::where('name', 'like', '%'. $directorsName . '%')
            ->orWhere('surname', 'like', '%'. $directorsName . '%')
            ->orWhere('date', 'like', '%'. $directorsName . '%')
            ->orWhere('nationality', 'like', '%'. $id . '%')
            ->paginate(self::PAGINATE_SIZE);
        } else {
            $directors = Director::paginate(self::PAGINATE_SIZE);
            

        }
        
        return view('directors.index', ['directors'=>$directors, 'directorFind'=>$directorsName,'nationalities'=>$nationalities]);
    }

    protected function validateDirector($request) {
        return Validator::make($request->all(), [
            'directorName' => ['required', 'string', 'max:255', 'min:1'],
            'directorSurname' => ['required', 'string', 'max:255', 'min:1'],
            'directorDate' => ['required', 'date'],
            'directorNationality' => ['required', 'int']
        ]);
    }

}
