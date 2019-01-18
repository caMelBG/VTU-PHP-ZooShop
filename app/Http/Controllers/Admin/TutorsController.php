<?php

namespace App\Http\Controllers\Admin;

use App\Tutors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreTutor;
use App\Http\Requests\UpdateTutor;

class TutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTutors = Tutors::paginate(1);

        return view('admin.tutors.index')->with('allTutors', $allTutors);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutors.create');
        //
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
            'title' => 'bail|required|unique:tutors|max:255',
        ]);

        $tutor = new Tutors([
            'title' => $request->get('title')
        ]);

        $tutor->save();

        return redirect('admin/tutors');


        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = Tutors::find($id);

        return view('admin.tutors.edit', compact('tutor','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTutor $request, $id)
    {
        $tutor = Tutors::find($id);
        $tutor->title = $request->get('title');
        $tutor->save();
        return redirect('/admin/tutors')->with('success', 'Task was successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutor = Tutors::find($id);
        $tutor->delete();

        return redirect('/admin/tutors')->with('success', 'Task was successful!');
    }
}
