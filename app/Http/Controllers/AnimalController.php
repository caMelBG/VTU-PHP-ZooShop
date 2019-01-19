<?php

namespace App\Http\Controllers;

use DateTime;
use App\Animal;
use App\AnimalType;
use App\AnimalBreed;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:128',
            'animal_type_id'=>'required|integer',
            'animal_breed_id'=>'required|integer',
            'birth_date'=>'required|date|date_format:Y-m-d',
        ]);

        $animal = new Animal;
        $animal->name = $request->get('name');
        $animal->animal_type_id = $request->get('animal_type_id');
        $animal->animal_breed_id = $request->get('animal_breed_id');
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

        $data = [
            'animal'  => $animal,
            'types'   => $types,
            'breeds' => $breeds
        ];

        return view('animal.edit', $data) ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:128',
            'animal_type_id'=>'required|integer',
            'animal_breed_id'=>'required|integer',
            'birth_date'=>'required|date|date_format:Y-m-d',
        ]);

        $animal = Animal::find($id);
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
