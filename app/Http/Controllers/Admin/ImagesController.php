<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Images;
use App\Http\Requests\ImageUpload;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the subjects
        $images = Images::all();


        return view('admin.images.index') ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageUpload $request)
    {
        $path = $request->file('customImage')->store('public/sample-images');

        $image = new Images([
            'fileName' => basename($path),
            'imageDescription' => $request->get('imageDescription')
        ]);
        $image->save();

        return redirect('admin/images');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Images::find($id);
        Storage::delete('public/sample-images/' . $image->fileName);
        $image->delete();

        return redirect('/admin/images')->with('success', 'Image was deleted!');
    }
}
