<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patients as patient;
use App\User;
use Auth;
class patients extends Controller
{
    //
    public function create(Request $request){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="patient"||$user->user_type=="doctors"){
        $pat=patient::create([
        'name'=>$request->input('name'),
        'address'=>$request->input('address'),
        'age'=>$request->input('age'),
        'blood_group'=>$request->input('blood_group'),
        'contact'=>$request->input('contact'),
        'doctor_id'=>"null",
        'user_id'=>Auth::guard('api')->id()
        ]);
        return $pat;
        
        }
    }
    public function get_profile($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="patient"){
        $pat=patient::findOrFail($id);
        return $pat;
        }
    }
    public function get_patients($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
            $pat=patient::where('doctor_id',$id)->paginate(15);
            return $pat;
            }
    }
    public function get_patients_all(){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
            $pat=patient::paginate(15);
            return $pat;
            }
    }
}
