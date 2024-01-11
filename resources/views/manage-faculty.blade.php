@extends('layouts.admin-layout')

@section('title', 'Manage Faculty')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Manage Faculty</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Manage Faculty</li>
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
                            <strong class="card-title">LIST OF FACULTY MEMBERS</strong>
                            <button type="button" class="btn btn-primary float-right rounded" data-toggle="modal" data-target="#addFacultyModal"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Load</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                        <tr>
                                            <td><a href="{{route('profile', $faculty)}}">{{$faculty->name}}</a></td>
                                            <td>{{$faculty->rank}}</td>
                                            <td>{{$faculty->status}}</td>
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
    <div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('add-faculty')}}" method="post" class="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Add Faculty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="card-body card-block">
                            
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Name</div>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Rank</div>
                                        <select name="rank" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                            <option value=""></option>
                                            <option value="Instructor 1">Instructor 1</option>
                                            <option value="Instructor 2">Instructor 2</option>
                                            <option value="Instructor 3">Instructor 3</option>
                                            <option value="Assistant Professor 1">Assistant Professor 1</option>
                                            <option value="Assistant Professor 2">Assistant Professor 2</option>
                                            <option value="Assistant Professor 3">Assistant Professor 3</option>
                                            <option value="Assistant Professor 4">Assistant Professor 4</option>
                                            <option value="Associate Professor 1">Associate Professor 1</option>
                                            <option value="Associate Professor 2">Associate Professor 2</option>
                                            <option value="Associate Professor 3">Associate Professor 3</option>
                                            <option value="Associate Professor 4">Associate Professor 4</option>
                                            <option value="Associate Professor 5">Associate Professor 5</option>
                                            <option value="Professor 1">Professor 1</option>
                                            <option value="Professor 2">Professor 2</option>
                                            <option value="Professor 3">Professor 3</option>
                                            <option value="Professor 4">Professor 4</option>
                                            <option value="Professor 5">Professor 5</option>
                                            <option value="Professor 6">Professor 6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Status</div>
                                        <select name="status" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                            <option value=""></option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Part time">Part time</option>
                                        </select>
                                    </div>
                                </div>
                            
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