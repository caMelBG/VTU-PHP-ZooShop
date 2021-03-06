<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\DB;
use App\Images;
use App\Animal;
use App\AnimalType;
use App\AnimalBreed;
use App\Http\Requests\ImageUpload;

class AnimalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $animals = Animal::all();
        $types = AnimalType::all();
        $breeds = AnimalBreed::all();

        $data = [
            'animals'  => $animals,
            'types'   => $types,
            'breeds' => $breeds
        ];

        return view('animal.index', $data) ->with('data', $data);
    }

    public function create()
    {
        $animal = new Animal;
        $types = AnimalType::all();
        $breeds = AnimalBreed::all();

        $data = [
            'animal'  => $animal,
            'types'   => $types,
            'breeds' => $breeds
        ];

        return view('animal.create', $data) ->with('data', $data);
    }

    public function store(ImageUpload $request)
    {
        $request->validate([
            'name'=>'required|max:128',
            'animal_type_id'=>'required|integer',
            'animal_breed_id'=>'required|integer',
            'birth_date'=>'required|date|date_format:Y-m-d',
        ]);


        $image_id = null;
        $file = $request->file('customImage');
        if (!is_null($file)) {
            $path = $file->store('public/sample-images');
            $image = new Images([
                'fileName' => basename($path),
                'imageDescription' => $request->get('name')
            ]);
            $image->save();
            $image_id = DB::getPdo()->lastInsertId();
        }

        $animal = new Animal;
        $animal->name = $request->get('name');
        $animal->animal_type_id = $request->get('animal_type_id');
        $animal->animal_breed_id = $request->get('animal_breed_id');
        $animal->image_id = $image_id != null ? $image_id : null;
        $animal->birth_date = date($request->get('birth_date'));
        $animal->updated_at = new DateTime;
        $animal->save();

        return redirect('animal')->with('success', 'Animal has been updated successfully');
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $types = AnimalType::all();
        $breeds = AnimalBreed::all();
        $avatar = Images::find($animal->image_id);
        $data = [
            'animal'  => $animal,
            'types'   => $types,
            'breeds' => $breeds,
            'avatar' => $avatar
        ];

        return view('animal.edit', $data) ->with('data', $data);
    }

    public function update(ImageUpload $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name'=>'required|max:128',
            'animal_type_id'=>'required|integer',
            'animal_breed_id'=>'required|integer',
            'birth_date'=>'required|date|date_format:Y-m-d',
        ]);

        $image_id = null;
        $file = $request->file('customImage');
        $animal = Animal::find($request->get('id'));
        if (!is_null($file)) {
            $path = $file->store('public/sample-images');
            $image = new Images([
                'fileName' => basename($path),
                'imageDescription' => $request->get('name')
            ]);
            $image->save();
            $image_id = DB::getPdo()->lastInsertId();
            $animal->image_id = $image_id;
        }


        $animal->name = $request->get('name');
        $animal->animal_type_id = $request->get('animal_type_id');
        $animal->animal_breed_id = $request->get('animal_breed_id');
        $animal->birth_date = date($request->get('birth_date'));
        $animal->updated_at = new DateTime;
        $animal->save();

        return redirect('animal')->with('success', 'Animal has been updated successfully');
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();

        return redirect('animal')->with('success', 'Animal has been deleted successfully');
    }
}
