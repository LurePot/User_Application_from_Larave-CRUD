@extends('layouts.admin')

@section('pagetitle')
    Division Details
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Division Details</h6>
        <a href="{{url('division')}}" class="btn btn-sm btn-info btn-circle btn-sm" title="Back to Division List">
            <i class="fa-sharp fa-solid fa-rotate-left"></i>
        </a>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-responsive">
            <tr class="table-bordered">
                <th>Id</th>
                <td>{{ $division->id }}</td>
            </tr>
            <tr class="table-bordered">
                <th>Name</th>
                <td>{{ $division->name }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection