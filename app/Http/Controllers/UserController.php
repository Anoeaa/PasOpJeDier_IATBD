<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;

class UserController extends Controller
{
    public function animalList(){
       $user = Auth::user();

        return view('index', [
            'user' => $user,
            'animal' => \App\Models\Animal::all(),
            'breed' => \App\Models\Breed::all()
        ]);
    }

    public function userProfile($id){
        $user = Auth::user();

        return view ('userProfile', [
            'user' => $user,
            'userProfile' => \App\Models\User::find($id),
            'review' => \App\Models\Review::all()->where('reviewed', $id),
            'image' => \App\Models\Image::all()->where('user', $id),
            'animal' => \App\Models\Animal::all()->where('owner', $id),
            'application' => \App\Models\Application::all()->where('owner', $id)
        ]);
    }

// Image uploading
    public function uploadImage(){
        $user = Auth::user();

        return view ('uploadImage', [
            'user' => $user,
        ]);
    }

    public function saveImage(Request $request, \App\Models\Image $image){
        $user = Auth::user();

        $imageToSave = $request->image;
        $fileSize = filesize($imageToSave);
        if($fileSize > 0){
            $imageName= $request->image->getClientOriginalName();
            $imageToSave->storeAs('public/images', $imageName);
            $image->image_name = $imageName;
            $image->user =  $user->id;
            try{
                $image->save();
                return redirect("/user/$user->id");
            }
            catch(Exception $e){
                return redirect("/");
            }
        } else {
            return redirect('/');
        }
    }

// Application
    public function acceptApplication($id, $animal){
        $user = \App\Models\Application::where('application_id', $id)->first();
        \App\Models\Application::where('application_id', $id)->delete();
        \App\Models\Animal::where('animal_id', $animal)->delete();

        return redirect("/review/{$user->applicant}");
    }

    public function rejectApplication($id){
        $user = Auth::user();
        \App\Models\Application::where('application_id', $id)->delete();

        return redirect("/user/$user->id");
    }


// Review
    public function makeReview($id){
        $user = Auth::user();
        return view('makeReview', [
            'user' => $user,
            'userReview' => \App\Models\User::find($id)
        ]);
    }

    public function saveReview(Request $request, \App\Models\Review $review){
        $user = Auth::user();
        $review->reviewer = $user->name;
        $review->reviewed = $request->input('reviewed');
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');

        try {
            $review->save();
            return redirect('/');
        }
        catch(Exception $e) {
            return redirect('/');
        }
    }

    public function bannedUser(){
        return view('banned');
    }
}
