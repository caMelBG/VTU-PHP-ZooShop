<?php

namespace App\Http\Controllers;

use App\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalTypes = AnimalType::all();

        return view('animalType.index', $animalTypes) ->with('animalTypes', $animalTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animalType.create');
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
            'name'=>'required|max:128'
        ]);

        $animalType = new AnimalType;
        $animalType->name = $request->get('name');
        $animalType->save();

        return redirect('animalType')->with('success', 'Animal type has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animalType = AnimalType::find($id);
        return view('animalType.edit', $animalType) ->with('animalType', $animalType);
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
            'name'=>'required|max:128'
        ]);

        $animalType = AnimalType::find($id);
        $animalType->name = $request->get('name');
        $animalType->save();

        return redirect('animalType')->with('success', 'Animal type has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animalType = AnimalType::find($id);
        $animalType->delete();

        return redirect('animalType')->with('success', 'Animal type has been deleted successfully');
    }
}
