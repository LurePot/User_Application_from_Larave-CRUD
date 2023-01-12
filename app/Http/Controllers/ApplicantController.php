<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\District;
use App\Models\Division;
use App\Models\Education;
use App\Models\Training;
use App\Models\Upozila;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::with('division', 'district', 'upozila')->paginate(10);
        return view('applicant.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::pluck('name', 'id');
        $districts = [];
        $upozilas = [];
        // $applicant = Applicant::all();

        return view('applicant.create')->with(compact('divisions', 'districts', 'upozilas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicantRequest $request)
    {
        // Checkbox
        $request->language = json_encode($request->language);
        $lan = str_replace('"', '', trim($request->language, '[]'));


        // Photo
        if ($request->file('photo')) {
            // $qid  = Applicant::orderBy('id', 'desc')->first()->id;
            if (empty(Applicant::all()->last()->id)) {
                $filename = 1 . '.jpg';
            } else {
                $qid  = Applicant::all()->last()->id;
            $filename = $qid + 1 . '.jpg';
            }
            
            
            // dd($filename);
            $path = $request->file('photo')?->storeAs('public/photo', $filename);

            $storagepath = Storage::path($path);
            // desired format ->fit(330, 330)
            $img = Image::make($storagepath);
            // save image
            $img->save($storagepath);
        }
// Resume
        if ($request->file('cv')) {
           
            $qid  = Applicant::all()->last()?->id;
            $extension = $request->file('cv')->getClientOriginalName();
            $cv = $qid + 1 . '_'. $extension;
            // dd($cv);
            $path = $request->file('cv')?->storeAs('public/CV', $cv);
        }
// Education
        $request->exam = json_encode($request->exam);
        $exam = str_replace('"', '', trim($request->exam, '[]'));

        $request->board = json_encode($request->board);
        $board = str_replace('"', '', trim($request->board, '[]'));

        $request->year = json_encode($request->year);
        $year = str_replace('"', '', trim($request->year, '[]'));
        // dd($year );
        $request->cgpa = json_encode($request->cgpa);
        $cgpa = str_replace('"', '', trim($request->cgpa, '[]'));
// Training
        $request->tname = json_encode($request->tname);
        $tname = str_replace('"', '', trim($request->tname, '[]'));
        $request->tdetail = json_encode($request->tdetail);
        $tdetail = str_replace('"', '', trim($request->tdetail, '[]'));

     $applicant = new Applicant([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upozila_id' => $request->upozila_id,
            'address' => $request->address,
            'language' => $lan,
            'photo' => $filename ?? false,
            'cv' => $cv ?? false,
            'exam' => $exam,
            'board' => $board,
            'year' => $year,
            'cgpa' => $cgpa,
            'tname' => $tname ?? false,
            'tdetail' => $tdetail ?? false,
        ]);
        $applicant->save();
        return redirect('/applicant')->with('success', 'Applicanttion submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        $divisions = Division::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        $upozilas = Upozila::pluck('name', 'id');
        return view('applicant.show', compact('applicant'))
            ->with('divisions', $divisions)
            ->with('districts', $districts)
            ->with('upozilas', $upozilas)
            ->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $divisions = Division::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        $upozilas = Upozila::pluck('name', 'id');
        return view('applicant.edit', compact('applicant'))
            ->with('divisions', $divisions)
            ->with('districts', $districts)
            ->with('upozilas', $upozilas)
            ->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicantRequest  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicantRequest $request, Applicant $applicant)
    {
        
        $request->language = json_encode($request->language);
        $lan = str_replace('"', '', trim($request->language, '[]'));
        // Education
        $request->exam = json_encode($request->exam);
        $exam = str_replace('"', '', trim($request->exam, '[]'));

        $request->board = json_encode($request->board);
        $board = str_replace('"', '', trim($request->board, '[]'));

        $request->year = json_encode($request->year);
        $year = str_replace('"', '', trim($request->year, '[]'));
        // dd($year );
        $request->cgpa = json_encode($request->cgpa);
        $cgpa = str_replace('"', '', trim($request->cgpa, '[]'));
// Training
        $request->tname = json_encode($request->tname);
        $tname = str_replace('"', '', trim($request->tname, '[]'));
        $request->tdetail = json_encode($request->tdetail);
        $tdetail = str_replace('"', '', trim($request->tdetail, '[]'));


       //delete previous photo
       $u = User::find(Auth::id());
       $p = $u->applicant;
       $filename = $p?->photo;

       if ($request->file('photo')) {
           if ($filename) {
               Storage::delete($filename);
           }
           // if you manually delete the image from the profile table folder
           if (!$filename) {
               $filename = $p->photo;
           }
           // Image rename and replace the file name with desired name
           $path = $request->file('photo')->storeAs('public/photo', $filename);
           $storagepath = Storage::path($path);
           $img = Image::make($storagepath)->fit(330, 330);
           $img->save($storagepath);
       } else {
           if ($p?->photo) {
               $path = $filename;
           } else {
               $path = null;
           }
       }
        
       if ($request->file('cv')) {
           
        $qid  = Applicant::all()->last()?->id;
        $extension = $request->file('cv')->getClientOriginalName();
        $cv = $qid + 1 . '_'. $extension;
        // dd($cv);
        $path = $request->file('cv')?->storeAs('public/CV', $cv);
    }

        $applicant->update($request->except('language','exam','board', 'year', 'cgpa','tname', 'tdetail'));
        // $quiz->subcategory_id = $request->subcategory_id=='0'? null : $request->subcategory_id;
        // $quiz->topic_id = $request->topic_id=='0'? null : $request->topic_id;
        $applicant->language = $lan;
        $applicant->exam = $exam;
        $applicant->board = $board;
        $applicant->year = $year;
        $applicant->cgpa = $cgpa;
        $applicant->tname = $tname ?? false;
        $applicant->tdetail = $tdetail ?? false;

        //  dd($request->ans,  $quiz->ans,$opt);


        if ($applicant->update()) {
            return back()->with('message', "Update Successfully!");
        } else {
            return back()->with('message', "Update Failed!");
        }
    }
    public function getDistricts($id)
    {
        $districts = District::where('division_id', $id)->pluck('name', 'id');
        return json_encode($districts);
    }

    public function getUpozilas($id)
    {
        $upozilas = Upozila::where('district_id', $id)->pluck('name', 'id');
        return json_encode($upozilas);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        if (Applicant::destroy($applicant->id)) {
            return back()->with('message', $applicant->id . ' has been deleted!');
        } else {
            return back()->with('message', 'Delete Failed!');
        }
    }
}
