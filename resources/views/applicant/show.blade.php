@extends('layouts.admin')

@section('pagetitle')
    Upozila
@endsection
@php
$lan = explode(',', $applicant->language);
$exams = explode(',', $applicant->exam);
$boards = explode(',', $applicant->board);
$years = explode(',', $applicant->year);
$cgpas = explode(',', $applicant->cgpa);
$tnames = explode(',', $applicant->tname);
$tdetails = explode(',', $applicant->tdetail);

// dd($lan, $exams, $boards, $years, $cgpas);

@endphp
@section('content')
<div class="card card-hover shadow mb-4 disabled">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Details</h6>
        <a href="{{url('applicant')}}" class="btn btn-info btn-circle btn-sm" title="Back to Upozila List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="form-group row mb-3">
            <h5>Personal Info</h5>
            <div class="col-sm-6 mb-3 mb-sm-0">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', Auth::user()?->name, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'name',
                    'placeholder' => 'Name',
                ]) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                {!! Form::email('email', Auth::user()?->email, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'Email',
                ]) !!}
            </div>
        </div>
        <div class="form-group row mb-3">
            <h5>Address:</h5>
            <div class="col-sm-4 mb-3 mb-sm-0">
                {!! Form::label('division_id', 'Division', ['class' => 'form-label']) !!}
                {!! Form::select('division_id', $divisions, $applicant->division_id, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'division_id',
                    'placeholder' => 'Select Division',
                ]) !!}
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                {!! Form::label('district_id', 'District', ['class' => 'form-label']) !!}
                {!! Form::select('district_id', $districts, $applicant->district_id, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'district_id',
                    'placeholder' => 'Select District',
                ]) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('upozila_id', 'Upazila', ['class' => 'form-label']) !!}
                {!! Form::select('upozila_id', $upozilas, $applicant->upozila_id, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'upozila_id',
                    'placeholder' => 'Select Upazila',
                ]) !!}
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-sm-12 mb-3 mb-sm-0">
                {!! Form::label('address', 'Address Details', ['class' => 'form-label']) !!}
                {!! Form::textarea('address', $applicant->address, [
                    'required','disabled',
                    'class' => 'form-control',
                    'id' => 'address',
                    'rows' => '1',
                    'placeholder' => 'Address',
                ]) !!}
            </div>
        </div>
        <div class="form-group row mb-3">
        
        </div>
        <div class="form-group row mb-3">
            <h5>Programming Language:</h5>
            <div class="col-sm-4 mb-3 mb-sm-0 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'PHP', in_array('PHP', $lan)) !!}</span>
                {!! Form::label('php', 'PHP', ['class' => 'form-label']) !!}
            </div>
            <div class="col-sm-4 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'Python', in_array('Python', $lan)) !!}</span>
                {!! Form::label('python', 'Python', ['class' => 'form-label']) !!}
            </div>
            <div class="col-sm-4 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'JavaScript', in_array('JavaScript', $lan)) !!}</span>
                {!! Form::label('javascript', 'JavaScript', ['class' => 'form-label']) !!}
            </div>
        </div>
        
        <div class="form-group row mb-3">
            <div class="col-sm-4 mb-3 mb-sm-0 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'Java', in_array('Java', $lan)) !!}</span>
                {!! Form::label('java', 'Java', ['class' => 'form-label']) !!}
            </div>
            <div class="col-sm-4 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'C++', in_array('C++', $lan)) !!}</span>
                {!! Form::label('c', 'C++', ['class' => 'form-label']) !!}
            </div>
            <div class="col-sm-4 d-flex align-self-center">
                <span class='btn border me-1 disabled'>{!! Form::checkbox('language[]', 'Laravel', in_array('Laravel', $lan)) !!}</span>
                {!! Form::label('laravel', 'Laravel', ['class' => 'form-label']) !!}
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-sm-3">
                <h5>Photo:</h5>
                {{-- {!! Form::file('photo', ['class' => 'form-control', 'id' => 'photo', 'title' => 'Profile Picture']) !!} --}}
                
            </div>
            <div class="col-sm-3 mt-4">
                <img src="{{ url(Storage::url('public/photo/' . $applicant->photo)) }}" class="image mb-1" alt="image"
                width="50px">
            </div>
            <div class="col-sm-3">
                <h5>Resume:</h5>
                {{-- {!! Form::file('cv', ['class' => 'form-control', 'id' => 'cv', 'title' => 'Resumre']) !!} --}}
            </div>
            <div class="col-sm-3 mt-4">
                <a href="{{ url(Storage::url('public/cv/' . $applicant?->cv)) }}"
                    class="text-decoration-none" target="_blank" title="{{ $applicant?->cv }}"><h2><i class="fa-solid fa-eye"></i></h2></a>
            </div>
        </div>
        
      
        <div class="form-group row mb-3">
            <p>Educational Qualification:</p>
            <div class="col-3 mb-3 mb-sm-0">
                @foreach ($exams as $exam)
                    <div class="col-sm-3 mb-3 mb-sm-1 form-control">
                        {!! Form::label('exam', 'Exam', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'exam[]',
                            [
                                'SSC' => 'SSC',
                                'HSC' => 'HSC',
                                'BA' => 'Honours',
                                'MA' => 'Masters',
                            ],
                            $exam,
                            ['required','disabled', 'class' => 'form-control exam', 'placeholder' => 'Select'],
                        ) !!}
                    </div>
                @endforeach
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                @foreach ($boards as $board)
                    <div class="col-sm-3 mb-3 mb-sm-1 form-control">
                        {!! Form::label('board', 'University / Board', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'board[]',
                            [
                                'DU' => 'Dhaka University',
                                'RU' => 'Rajshahi University',
                                'KU' => 'Khulna University',
                                'CU' => 'Chittagong University',
                                'DHA' => 'Dhaka Board',
                                'KHU' => 'Khulna Board',
                                'BAR' => 'Barisal Board',
                                'MAD' => 'Madrasah Board',
                            ],
                            $board,
                            ['required','disabled', 'class' => 'form-control university', 'placeholder' => 'Select'],
                        ) !!}
                    </div>
                @endforeach
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                @foreach ($years as $year)
                    <div class="col-sm-2 mb-3 mb-sm-1 form-control">
                        {!! Form::label('year', 'Passing Year', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'year[]',
                            [
                                '2022' => '2022',
                                '2021' => '2021',
                                '2020' => '2020',
                                '2019' => '2019',
                                '2018' => '2018',
                                '2017' => '2017',
                                '2016' => '2016',
                                '2015' => '2015',
                            ],
                            $year,
                            ['required','disabled', 'class' => 'form-control board', 'placeholder' => 'Select'],
                        ) !!}
                    </div>
                @endforeach
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                @foreach ($cgpas as $cgpa)
                    <div class="col-sm-2 mb-3 mb-sm-1 form-control">
                        {!! Form::label('cgpa', 'CGPA', ['class' => 'form-label']) !!}
                        {!! Form::text('cgpa[]', $cgpa, ['required','disabled', 'class' => 'form-control', 'placeholder' => 'CGPA']) !!}
                    </div>
                @endforeach
            </div>
        
        </div>
        
        <div id="addMore"></div>
        
        {{-- 'route' => 'training.store',  --}}
        {{ Form::open(['route' => 'training.store', 'class' => 'user', 'id' => 'trninfo', 'enctype' => 'multipart/form-data']) }}
        
        <div class="form-group row mb-3">
            <div class="col-sm-12 mt-3 mb-sm-0">
                <p>Training:</p>
                {{ Form::radio('training', 'yes', '', ['class' => 'form-check-input training', 'id' => 'yes']) }}
                {{ Form::label('yes', 'Yes', ['class' => 'form-check-labe ']) }}
        
                {{ Form::radio('training', 'no', '', ['class' => 'form-check-input training', 'id' => 'no']) }}
                {{ Form::label('no', 'No', ['class' => 'form-check-label']) }}
            </div>
        </div>
        <div class="form-group row mb-3 training2" id="training">
           <div class="col-sm-6">
            @foreach ($tnames as $tname)
            <div class="col-sm-6 mb-3 mb-sm-1 form-control">
                {!! Form::label('tname', 'Training Name', ['class' => 'form-label']) !!}
                {!! Form::text('tname', $tname, [
                    'required','disabled',
                    'class' => 'form-control',
                    'placeholder' => 'Training Name',
                    'id' => 'tname',
                ]) !!}
            </div>
            @endforeach
            </div>
            <div class="col-sm-6">
            @foreach ($tdetails as $tdetail)
            <div class="col-sm-6 mb-3 mb-sm-1 form-control">
                {!! Form::label('tdetail', 'Training Details', ['class' => 'form-label']) !!}
                {!! Form::text('tdetail', $tdetail, [
                    'required','disabled',
                    'class' => 'form-control',
                    'placeholder' => 'Training Details',
                    'id' => 'tdetail',
                ]) !!}
            </div>
            @endforeach
            </div>
    </div>
</div>
@endsection