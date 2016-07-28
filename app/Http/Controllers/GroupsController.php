<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Groups;
use App\GroupsModel;
use App\User;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Hash;
use Log;

class GroupsController extends Controller
{
    //
    public function create(){
        $error=array();
        /// add group to table
        $groupModel = new GroupsModel();
        $groupModel->group_name	= $_POST['group_name'];
        $groupModel->user_id = json_decode(Auth::user())->id;
        $groupModel->save();
 
/*        $groupModel->create([
                 'group_name'	=> $_POST['group_name'],
                 'user_id'       => json_decode(Auth::user())->id
                
         ]);
         print_r( $groupModel->group_id );

 */
        
        
        /// Send mail to all assigned emails
        try{
            foreach(explode(",",$_POST['emails']) as $email){
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    
                    $checkUser = User::where('email',$email)->first();
                   // Log::Info();
                    
                    if(isset($checkUser->id)){
                        
                        $groupModel->delete();
                        return array("Email already Exists");
                    }
                    //die("die");
                    
                    /// Create user with email
                    $user = new User;
                    $user->email = $email;
                    $user->name = $email;
                    $user->mobile = '';
            
                    $password = $this->generateRandomString();
            
                    $user->password = Hash::make($password);
                    $user->group_id = $groupModel->group_id;
                    $user->save();
            
                    /*
                     * @todo        send mails to users.
                     */ 
            
            
            
                } else {
                    // return Redirect::back()->withErrors($errors)
                    $error[] = "$email is not valid email, hence skipped";
                }
            }
        }
        catch(Exception $e){
            Log::Info("start e");
            $groupModel->delete();
            return array("Email already Exists");
        }
        
        if(count($error)){
            Log::Info("start");
            $groupModel->delete();
             return array("Email already Exists");
        }
        
        
        
        /// assign group id to admin user
        $userModel= User::find(json_decode(Auth::user())->id);
//         print_r($userModel->name);
        $userModel->group_id = $groupModel->group_id;
        $userModel->save();
        
        return $error;
//         session()->flash('msg', 'Successfully done the operation.');
//         return redirect()->back();
    }
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
