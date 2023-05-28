<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6',
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'type' => $request->type,
            // 'photo'=>$request->photo,
            'created_at'=>Carbon::now()
        ]);

        return true;
    }
    function index(){
        return User::orderBy('id','DESC')->get();

    }
    function destroy($id){
        User::where('id',$id)->delete();
        return ['msg'=>'user deleted'];
    }
    function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'sometimes|min:6',
        ]);
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'type' => $request->type,
            // 'photo'=>$request->photo,
            'created_at'=>Carbon::now()
        ]);
        return ['msg'=>'user deleted'];
    }


}
