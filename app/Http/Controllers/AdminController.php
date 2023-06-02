<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('admin',[
            'user' => $user,
            'animal' => \App\Models\Animal::all()
        ]);
    }

    public function ban(Request $request){
        $userToBan = $request->user;
        $bannedUser = \App\Models\User::all()->where("name", $userToBan)->first();
        if($bannedUser != null){
            $bannedUser->banned = 'yes';
            \App\Models\Animal::where("owner", $bannedUser->id)->delete();
            if(\App\Models\Application::first() != null){
                \App\Models\Application::first()->where("applicant_name", $userToBan)->delete();
            }

            try{
                $bannedUser->save();
                return redirect('/admin');
            }
            catch(Exception $e){
                return redirect('/admin');
            }
        } else {
            return redirect('/admin');
        }
    }

    public function removeAnimal($id){
        $user = Auth::user();
        \App\Models\Animal::where('animal_id', $id)->delete();

        return redirect('/admin');
    }
}
