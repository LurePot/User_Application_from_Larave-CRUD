<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Applicant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
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
     * @param  \App\Http\Requests\StoreEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {

        $request->exam = json_encode($request->exam);
        $exam = str_replace('"', '', trim($request->exam, '[]'));

        $request->board = json_encode($request->board);
        $board = str_replace('"', '', trim($request->board, '[]'));

        $request->year = json_encode($request->year);
        $year = str_replace('"', '', trim($request->year, '[]'));
        // dd($year );
        $request->cgpa = json_encode($request->cgpa);
        $cgpa = str_replace('"', '', trim($request->cgpa, '[]'));

        // $applicant = DB::table('applicants')->where('user_id', Auth::user()->id)->get();
        // // dd( $applicant);
        // // Applicant::where('id', Auth::user()->id)->get();

        // $u = Applicant::find(Auth::id());
        // $apid = $u->id;
        

       

        // dd( $apid);

        $education = new Education([
            'applicant_id' => 2,
            'exam' => $exam,
            'board' => $board,
            'year' => $year,
            'cgpa' => $cgpa,
            
        ]);
        $education->save();
        return redirect('/applicant/create')->with('success', 'Applicanttion submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducationRequest  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
