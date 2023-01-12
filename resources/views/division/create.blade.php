@extends('layouts.admin')

@section('pagetitle')
    Add Division
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Add Division</h6>
            <a href="{{url('division')}}" class="btn btn-info btn-circle btn-sm" title="Back to Division List">
                <i class="fa-sharp fa-solid fa-rotate-left"></i>
            </a>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'division.store','class'=>'user','enctype'=>'multipart/form-data'])}}
            @include('division.form')

            <div class="form-group">
                {!! Form::submit('Save', ['class'=>'btn btn-sm btn-info btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

