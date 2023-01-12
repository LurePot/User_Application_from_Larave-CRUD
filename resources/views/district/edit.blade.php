@extends('layouts.admin')

@section('pagetitle')
    Update District
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Update District</h6>
            <a href="{{url('district')}}" class="btn btn-info btn-circle btn-sm" title="Back to District List">
                <i class="fa-sharp fa-solid fa-rotate-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($district, ['method' => 'put','enctype'=>'multipart/form-data','class'=>'user','route' => ['district.update', $district->id]]) !!}
            @include('district.form')

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-sm btn-info btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

