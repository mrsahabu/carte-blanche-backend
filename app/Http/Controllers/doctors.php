<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctors as doctor;
use App\User;
use Auth;
class doctors extends Controller
{
    public function create(Request $request){

    $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
        $doc=doctor::create([
        'first_name' =>$request->input('first_name'),
        // 'address'=>$request->input('address'),
        'last_name'=>$request->input('last_name'),
        'college'=>$request->input('college'),
        'qualification'=>$request->input('qualification'),
        'hospital_id'=>$request->input('hospital_id'),
        'user_id'=>Auth::guard('api')->id()
        ]);
        return $doc;
        }

    }
    public function get_profile($id){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"||$user->user_type=="patient"){
        $doc=doctor::findOrFail($id);
        return $doc;
        }
    }
    public function get_all_doctors(){
        $doc=doctor::paginate(15);
        return $doc;
    }
    public function add_patient($did,$pid){
        $user=User::findOrFail(Auth::guard('api')->id());
        if($user->user_type=="doctor"){
        
        $pat=patients::findOrFail($pid);
        $pat->update(['doctor_id'=>$did]);
        }
    }
}
