@extends('layouts.admin')

@section('pagetitle')
    Update Upozila
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Update Upozila</h6>
            <a href="{{url('upozila')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Upozila List">
                <i class="fa-sharp fa-solid fa-rotate-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($upozila, ['method' => 'put','enctype'=>'multipart/form-data','class'=>'user','route' => ['upozila.update', $upozila->id]]) !!}
            @include('upozila.form')

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-sm btn-info btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

