<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $applicants = Applicant::with('division', 'district', 'upozila')->paginate(10);
        return view('dashboard', compact('applicants'));
    }
}
