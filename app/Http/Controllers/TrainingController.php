<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingRequest $request)
    {
        $request->tname = json_encode($request->tname);
        $tname = str_replace('"', '', trim($request->tname, '[]'));
        $request->tdetail = json_encode($request->tdetail);
        $tdetail = str_replace('"', '', trim($request->tdetail, '[]'));

        // dd($request);
        $training = new Training([
            'applicant_id' => 2,
            'tname' => $tname,
            'tdetail' => $tdetail,
            
        ]);
        $training->save();
        return redirect('/applicant/create')->with('success', 'Applicanttion submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingRequest  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
