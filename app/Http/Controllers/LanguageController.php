<?php

namespace App\Http\Controllers;

use App\Models\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function change(Request $request)
    {
        
        App::setLocale($request->lang);
        
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }

    public function getCode($slugid){

        $data = DB::table('language')->where('code','=',$slugid)->get();
        
        return response()->json($data);
    }
   
    public function getLangauage()
    {
         $data = DB::table('language')->where('status','=','true')->orderBy('language','asc')->get();

         return response()->json($data);
    }
}
