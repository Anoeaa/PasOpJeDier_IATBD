<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AnimalController extends Controller
{
    public function animalProfile($id){
        $user = Auth::user();

        return view ('animalProfile', [
            'user' => $user,
            'animal' => \App\Models\Animal::all()->where('animal_id', $id)->first()
        ]);
    }

    public function makeApplication(){
        $user = Auth::user();
        return view('makeApplication',[
            'user' => $user,
            'breed' => \App\Models\Breed::all()
        ]);
    }

    public function saveApplication(Request $request, \App\Models\Animal $animal){
        $user = Auth::user();
        $imageToSave = $request->image;
        $fileSize = filesize($imageToSave);
        if($fileSize > 0){
            $animal->owner = $user->id;
            $animal->name = $request->input('name');
            $animal->age = $request->input('age');
            $animal->breed = $request->input('breed');
            $animal->location = $request->input('location');
            $animal->salary = $request->input('salary');
            $animal->start_date = $request->input('start_date');
            $animal->from_time = $request->input('from_time');
            $animal->end_date = $request->input('end_date');
            $animal->to_time = $request->input('to_time');
            $animal->comment = $request->input('comment');

            $imageName= $request->image->getClientOriginalName();
            $imageToSave->storeAs('public/images', $imageName);
            $animal->image = $imageName;

            try{
                $animal->save();
                return redirect('/');
            }
            catch(Exception $e){
                return redirect('/');
            }
        }

        
        

        
    }


    public function removeAnimal($id){
        $user = Auth::user();
        \App\Models\Animal::where('animal_id', $id)->delete();

        return redirect('/');
    }

    public function animalApply(Request $request, \App\Models\Application $application, $id){
        $user = Auth::user();
        $owner = \App\Models\Animal::all()->where('animal_id', $id)->where('owner', $user->id)->first();

        $application->animal = $request->input('animal');
        $application->animal_name = $request->input('animal_name');
        $application->owner = $request->input('owner');
        
        $application->applicant_name = $user->name;
        $application->applicant = $user->id;

        try {
            $application->save();
            return redirect('/');
        }
        catch(Exception $e) {
            return redirect('/');
        }
    }
}
