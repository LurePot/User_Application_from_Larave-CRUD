@extends('layouts.admin')

@section('pagetitle')
Edit Aplication
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
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Edit Aplication </h6>
            <a href="{{url('/applicant')}}" class="btn btn-info btn-circle btn-sm" title="Back to Upozila List">
                <i class="fa-sharp fa-solid fa-rotate-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($applicant, ['method' => 'put','enctype'=>'multipart/form-data','class'=>'user','route' => ['applicant.update', $applicant->id]]) !!}
            @include('applicant.form')

            <div class="form-group">
                {!! Form::submit('Update Aplication', ['class'=>'btn btn-info btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

