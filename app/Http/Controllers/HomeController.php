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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['admin']);

        $animals = Animal::orderBy('birth_date', 'desc')->take(10)->get();
        $images = Images::all()->toArray();
        $types = AnimalType::all()->toArray();
        $breeds = AnimalBreed::all()->toArray();

        $data = [
            'animals' => $animals,
            'images' => $images,
            'types' => $types,
            'breeds' => $breeds,
        ];

        return view('home', $data) ->with('data', $data);
    }
}
