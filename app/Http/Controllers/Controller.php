<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Groups;
use Log;
use Auth;
use App\GroupsModel;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function index(){
        
        /// redirect if guest
        if(!Auth::check())
            return Redirect::to('/');
        
        $groups = GroupsModel::all();
        /* $flights = App\Flight::where('active', 1)
        ->orderBy('name', 'desc')
        ->take(10)
        ->get(); */
       // print_r($groups);
        Log::info($groups);
        
        return view('home');
    }
}
