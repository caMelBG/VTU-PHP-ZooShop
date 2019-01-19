<?php

namespace App\Http\Controllers;

use App\AnimalBreed;
use Illuminate\Http\Request;

class AnimalBreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalBreeds = AnimalBreed::all();

        return view('animalBreed.index', $animalBreeds) ->with('animalBreeds', $animalBreeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animalBreed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $animalBreed = new AnimalBreed;
        $animalBreed->name = $request->get('name');
        $animalBreed->save();

        return redirect('animalBreed')->with('success', 'Animal Breed has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animalBreed = AnimalBreed::find($id);
        return view('animalBreed.edit', $animalBreed) ->with('animalBreed', $animalBreed);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $animalBreed = AnimalBreed::find($id);
        $animalBreed->name = $request->get('name');
        $animalBreed->save();

        return redirect('animalBreed')->with('success', 'Animal Breed has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animalBreed = AnimalBreed::find($id);
        $animalBreed->delete();

        return redirect('animalBreed')->with('success', 'Animal Breed has been deleted successfully');
    }
}
