<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\diagnosis as diagnos;
use App\User;
use Auth;
class diagnosis extends Controller
{
    //
    public function add(Request $request){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
        
        $diag=diagnos::create([
        'temperature'=>$request->input('temperature'),
        'blood_pressure'=>$request->input('blood_pressure'),
        'diagnosis'=>$request->input('diagnosis'),
        'comments'=>$request->input('comments'),
        'doctor_id'=>$request->input('doctor_id'),
        'patient_id'=>$request->input('patient_id'),
        'sugar_level'=>$request->input('sugar_level')
        ]);

            }
    }
    public function get_diagnosis_pat($id){
        
        $diag=diagnos::where('patient_id',$id)->paginate(15);
        return $diag;
    }
    public function get_diagnosis_doctor($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
           $diag=diagnos::where('doctor_id',$id)->paginate(15);
            return $diag;
        }
    }
    public function get_diagnosis($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
        
        $diag=diagnos::findOrFail($id);
        return $diag;
        }
    }
    public function del_diagnosis($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
        
        $diag=diagnos::findOrFail($id);
        $diag->delete();
        }
    }
}
