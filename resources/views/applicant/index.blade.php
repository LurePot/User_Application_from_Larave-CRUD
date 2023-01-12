@extends('layouts.admin')

@section('pagetitle')
    Applicant
@endsection

@section('content')
    <!-- Card Header - Dropdown -->
    {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Applicant List</h6>
        <a class="btn btn-primary btn-sm" href="{{url('applicant/create')}}">
            <i class="fas fa-plus fa-sm"></i>
            Add
        </a>
    </div> --}}

    @include('partial.flash')
    @include('partial.error')
    <!-- Card Body -->
    <main>
        <div class="container-fluid px-4">
            {{-- <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> --}}
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Primary Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Warning Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <style>
                    td {
                        max-width: 100px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        border: solid 1px #fab;
                    }

                    td.skip {
                        max-width: 100% !important;
                    }
                </style>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr class="text-light">
                                <th class="bg-danger">ID</th>
                                <th class="bg-success">Name</th>
                                <th class="bg-success">Email</th>
                                <th class="bg-info">Division</th>
                                <th class="bg-info">District</th>
                                <th class="bg-info">Thana</th>
                                <th class="bg-info ">Address</th>
                                <th class="bg-warning">Language</th>
                                <th class="bg-primary">Exam</th>
                                <th class="bg-primary">Board</th>
                                <th class="bg-primary">Year</th>
                                <th class="bg-primary">CGPA</th>
                                <th class="bg-secondary">Training</th>
                                <th class="bg-dark">Photo</th>
                                <th class="bg-primary">CV</th>
                                <th class="bg-danger" width="180px">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Upozila</th>
                                <th>Address</th>
                                <th>Language</th>
                                <th>Exam</th>
                                <th>Board</th>
                                <th>Year</th>
                                <th>CGPA</th>
                                <th>Training</th>
                                <th>Photo</th>
                                <th>CV</th>
                                <th width="180px">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($applicants as $applicant)
                                <tr class="text-light">
                                    <td class="bg-danger">{{ $applicant->id }}</td>
                                    <td class="bg-success">{{ $applicant->name }}</td>
                                    <td class="bg-success">{{ $applicant->email }}</td>
                                    <td class="bg-info">{{ $applicant->division->name }}</td>
                                    <td class="bg-info">{{ $applicant->district->name }}</td>
                                    <td class="bg-info">{{ $applicant->upozila->name }}</td>
                                    <td class="bg-info">{{ $applicant->address }}</td>
                                    <td class="bg-warning">{{ $applicant->language }}</td>
                                    <td class="bg-primary">{{ $applicant->exam }}</td>
                                    <td class="bg-primary">{{ $applicant->board }}</td>
                                    <td class="bg-primary">{{ $applicant->year }}</td>
                                    <td class="bg-primary">{{ $applicant->cgpa }}</td>
                                    <td class="bg-secondary">{{ $applicant->tname }}</td>
                                    {{-- <td>{{ $applicant->tdetail }}</td> --}}
                                    <td class="bg-dark">
                                        <img src="{{ url(Storage::url('public/photo/' . $applicant->photo)) }}"
                                            class="image" alt="image" width="30px">
                                    </td>
                                    <td><a href="{{ url(Storage::url('public/cv/' . $applicant->cv)) }}"
                                            class="text-decoration-none" target="_blank">View</a></td>

                                    <td class="d-flex bg-dark skip">
                                        <form action="{{ route('applicant.destroy', $applicant->id) }}" method="POST" id="deleteform"
                                            class="d-flex">
                                            <a class="btn btn-sm btn-info me-1"
                                                href="{{ route('applicant.show', $applicant->id) }}">Show</a>
                                            <a class="btn btn-sm btn-primary me-1"
                                                href="{{ route('applicant.edit', $applicant->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"  onclick="event.preventDefault();if (!confirm('Are you sure?')) return; document.getElementById('deleteform').submit();">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
{{-- {!! $applicants->links() !!} --}}
