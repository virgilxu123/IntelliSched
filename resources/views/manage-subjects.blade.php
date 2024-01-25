@extends('layouts.admin-layout')

@section('title', 'Manage Classes')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Manage Subjects</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Manage Subjects</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">LIST OF Subjects</strong>
                            <button type="button" class="btn btn-primary float-right rounded" data-toggle="modal" data-target="#addClassModal"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Description</th>
                                        <th>Units</th>
                                        <th>Year Level</th>
                                        <th>Term</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{$subject->course_code}}</td>
                                            <td>{{$subject->description}}</td>
                                            <td>{{$subject->units}}</td>
                                            <td>{{$subject->year_level}}</td>
                                            <td>{{$subject->term}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                                        <i class="fa fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <div class="dropdown-menu-content">
                                                            <a class="dropdown-item" href="#"><i class="fa fa-edit" style="color: green"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-trash-o" style="color: red"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    {{-- start-Modal --}}
    <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('add-subject')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Add Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-lg-12">
                            <label for="code">Course Code</label>
                            <input type="text" name="course_code" class="form-control" id="code" placeholder="Course Code">
                        </div>
                        <div class="form-group col-lg-6">   
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="units">Units</label>
                            <input type="number" name="units" class="form-control" id="units" placeholder="Units">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="year_level">Year</label>
                            <select id="year_level" name="year_level" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="term">Term</label>
                            <select id="term" name="term" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="Summer">Summer</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="subject_type">Type</label>
                            <select id="subject_type" name="subject_type" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="Minor">Minor</option>
                                <option value="Major">Major</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="laboratory">Laboratory</label>
                            <select id="laboratory" name="laboratory" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- edn modal --}}
@endsection

@section('scripts')
    <script src="{{asset('admin-assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@endsection


    
