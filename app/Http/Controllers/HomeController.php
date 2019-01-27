<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalType;
use App\AnimalBreed;
use App\Images;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        $type = $request->get('animal_type_id');
        $breed = $request->get('animal_breed_id');

        $animals = Animal::with('type');
        if ($query != null){
            $animals = $animals->where('name', 'LIKE', '%'.$query.'%');
        }
        if ($type != null){
            $animals = $animals->where('animal_type_id', $type);
        }
        if ($breed != null){
            $animals = $animals->where('animal_breed_id', $breed);
        }

        $animals = $animals
            ->with('breed')
            ->orderBy('birth_date', 'desc')
            ->take(9)->get();



        $data = [
            'animals' => $animals,
            'types' => AnimalType::all(),
            'breeds' => AnimalBreed::all(),
            'query' => $query,
            'animal_type_id' => $type,
            'animal_breed_id' => $breed,
        ];

        return view('home', $data) ->with('data', $data);
    }
}
