@extends('layouts.admin')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
@section('pagetitle')
    Add Division
@endsection

@section('content')
    @include('partial.flash')
    @include('partial.error')
    {{-- 'route' => 'applicantdata.store','method'=>'POST', --}}
    {{ Form::open(['route' => 'applicant.store','class' => 'user', 'id' => 'pinfo', 'enctype' => 'multipart/form-data']) }}
  
    @method('post')
    @csrf

    <div class="form-group row mb-3">
        <h5>Personal Info</h5>
        <div class="col-sm-6 mb-3 mb-sm-0">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', Auth::user()?->name, [
                'required',
                'class' => 'form-control',
                'id' => 'name',
                'placeholder' => 'Name',
            ]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::email('email', Auth::user()?->email, [
                'required',
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
            {!! Form::select('division_id', $divisions, null, [
                'required',
                'class' => 'form-control',
                'id' => 'division_id',
                'placeholder' => 'Select Division',
            ]) !!}
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            {!! Form::label('district_id', 'District', ['class' => 'form-label']) !!}
            {!! Form::select('district_id', $districts, null, [
                'required',
                'class' => 'form-control',
                'id' => 'district_id',
                'placeholder' => 'Select District',
            ]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('upozila_id', 'Upazila', ['class' => 'form-label']) !!}
            {!! Form::select('upozila_id', $upozilas, null, [
                'required',
                'class' => 'form-control',
                'id' => 'upozila_id',
                'placeholder' => 'Select Upazila',
            ]) !!}
        </div>
    </div>
    <div class="form-group row mb-3">
        <div class="col-sm-12 mb-3 mb-sm-0">
            {!! Form::label('address', 'Address Details', ['class' => 'form-label']) !!}
            {!! Form::textarea('address', null, [
                'required',
                'class' => 'form-control',
                'id' => 'address',
                'rows' => '1',
                'placeholder' => 'Address',
            ]) !!}
        </div>
    </div>
    <div class="form-group row mb-3">
        {{-- <div class="col-sm-12 mb-3 mb-sm-0">
            <p>Programming Language:</p>
            {!! Form::checkbox('language', 'php', false, ['class' => 'form-check-input language', 'id' => 'php']) !!}
            {!! Form::label('php', 'PHP', ['class' => 'form-label']) !!}
        </div> --}}
    </div>
    <div class="form-group row mb-3">
        <h5>Programming Language:</h5>
        <div class="col-sm-4 mb-3 mb-sm-0 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'PHP', null) !!}</span>
            {!! Form::label('php', 'PHP', ['class' => 'form-label']) !!}
        </div>
        <div class="col-sm-4 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'Python', null) !!}</span>
            {!! Form::label('python', 'Python', ['class' => 'form-label']) !!}
        </div>
        <div class="col-sm-4 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'JavaScript', null) !!}</span>
            {!! Form::label('javascript', 'JavaScript', ['class' => 'form-label']) !!}
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-sm-4 mb-3 mb-sm-0 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'Java', null) !!}</span>
            {!! Form::label('java', 'Java', ['class' => 'form-label']) !!}
        </div>
        <div class="col-sm-4 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'C++', null) !!}</span>
            {!! Form::label('c', 'C++', ['class' => 'form-label']) !!}
        </div>
        <div class="col-sm-4 d-flex align-self-center">
            <span class='btn border me-1'>{!! Form::checkbox('language[]', 'Laravel', null) !!}</span>
            {!! Form::label('laravel', 'Laravel', ['class' => 'form-label']) !!}
        </div>
    </div>
    <div class="form-group row mb-3">
        <div class="col-sm-6">
            <h5>Photo:</h5>
            {!! Form::file('photo', ['class' => 'form-control', 'id' => 'photo', 'title' => 'Profile Picture']) !!}
        </div>
        <div class="col-sm-6">
            <h5>Resume:</h5>
            {!! Form::file('cv', ['class' => 'form-control', 'id' => 'cv', 'title' => 'Resumre']) !!}
        </div>
    </div>
    {{-- <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-sm btn-info btn-block', 'id' => 'parsubmit']) !!}
    </div>
    {!! Form::close() !!} --}}


    {{-- 'route' => 'education.store',  --}}
    {{ Form::open(['route' => 'education.store','class' => 'user', 'id' => 'eduinfo', 'enctype' => 'multipart/form-data']) }}
    @csrf
    {{-- @method('post') --}}
    <div class="form-group row mb-3">
        <p>Educational Qualification:</p>
        <div class="col-sm-3 mb-3 mb-sm-0">
            {!! Form::label('exam', 'Exam', ['class' => 'form-label']) !!}
            {!! Form::select(
                'exam[]',
                [
                    'SSC' => 'SSC',
                    'HSC' => 'HSC',
                    'BA' => 'Honours',
                    'MA' => 'Masters',
                ],
                null,
                ['required', 'class' => 'form-control exam', 'placeholder' => 'Select'],
            ) !!}
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
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
                null,
                ['required', 'class' => 'form-control university', 'placeholder' => 'Select'],
            ) !!}
        </div>
        <div class="col-sm-2 mb-3 mb-sm-0">
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
                null,
                ['required', 'class' => 'form-control board', 'placeholder' => 'Select'],
            ) !!}
        </div>
        <div class="col-sm-2 mb-3 mb-sm-0">
            {!! Form::label('cgpa', 'CGPA', ['class' => 'form-label']) !!}
            {!! Form::text('cgpa[]', null, ['required', 'class' => 'form-control', 'placeholder' => 'CGPA']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::label('action', 'Action', ['class' => 'form-label']) !!}
            <br>
            <a class="btn btn-sm btn-block btn-info addMoreButton" id="addMoreButton" >+ Add More</a>
        </div>
    </div>
    <div id="addMore"></div>

    {{-- <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-sm btn-info btn-block', 'id' => 'edusubmit']) !!}
    </div>
    {!! Form::close() !!} --}}

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
    <div class="form-group row mb-3" id="training">
        <div class="col-sm-5 mb-3 mb-sm-0">
            {!! Form::label('tname', 'Training Name', ['class' => 'form-label']) !!}
            {!! Form::text('tname', null, [ 'class' => 'form-control', 'placeholder' => 'Training Name', 'id' => 'tname']) !!}
        </div>
        <div class="col-sm-5 mb-3 mb-sm-0">
            {!! Form::label('tdetail', 'Training Details', ['class' => 'form-label']) !!}
            {!! Form::text('tdetail', null, [
                'class' => 'form-control',
                'placeholder' => 'Training Details', 'id' => 'tdetail'
            ]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::label('action', 'Action', ['class' => 'form-label']) !!}
            <br>
            <a class="btn btn-sm btn-info" id="addMoreTraining">+ Add More</a>
        </div>
    </div>
    <div id="addTraining"></div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-sm btn-info btn-block', 'id' => 'Trasubmit']) !!}
    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>

</html>
