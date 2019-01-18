<?php

namespace App\Http\Controllers\Admin;

use App\Samples;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subjects;

use App\Http\Requests\SampleRequest;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the subjects
        $samples = Samples::all();

        return view('admin.samples.index')->with('samples', $samples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjectLists = Subjects::all()->pluck('title','id');
        $subjectLists = array('0' => 'Select Subject') + $subjectLists->all();

        return view('admin.samples.create')->with('subjectLists', $subjectLists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SampleRequest $request)
    {
        $path = $request->file('customSample')->store('public/sample');

        $sample = new Samples([
            'sampleName' => basename($path),
            'sampleDescription' => $request->get('sampleDescription'),
            'subject_id' => $request->get('subject_id')
        ]);
        $sample->save();

        return redirect('admin/samples');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $sample = Samples::find($id);
        Storage::delete('public/sample/' . $sample->sampleName);
        $sample->delete();

        return redirect('/admin/sample')->with('success', 'Sample was deleted!');
    }
}
