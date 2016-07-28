<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Log;
use App\SpendingsModel;
//use App\SpendingsModel;


class Spendings extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    } */
    //
    public function create(){
        $user = json_decode(Auth::user());
        $user=$user->id;
       
        //Log::Info(Auth::user());
        $model = new SpendingsModel;
        $model->created_at=date("Y-m-d H:i:s");
        $model->created_by=$user;
        $model->group_id=$_POST['group'];
        $model->total_amount=$_POST['amount'];
        $model->description=$_POST['description'];
        $model->short_description="";
        $model->save();
        
    }
}
