<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MyUserController extends Controller
{
    public function all()
    {
        $users = DB::table('myusers')->get();
        return  json_encode($users);
    }


    public function getid(Request $request)
    {
       
        $user = DB::table('myusers')->where('open_id', '=',$request->open_id)->first();
        if(json_encode($user) !='null'){
            return $user->user_id;
        }   

        else{
            $id  = DB::table('myusers')->insertGetId(
                ['open_id' => $request->open_id , 'user_name' =>$request->user_name ]
            );
            return  $id ;
         
        }
   
    }
}
