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
        //$request->user()->authorizeRoles(['admin']);

        $animals = Animal::with('type')->with('breed')->orderBy('birth_date', 'desc')->take(190)->get();

        $data = [
            'animals' => $animals,
        ];

        return view('home', $data) ->with('data', $data);
    }
}
