@extends('layouts.admin-layout')

@section('title', 'Manage Rooms')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/assets/css/table.css')}}">
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Manage Classrooms</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Manage Classrooms</li>
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
                            <strong class="card-title">LIST OF CLASS GROUP</strong>
                            <button type="button" class="btn btn-primary float-right rounded" data-toggle="modal" data-target="#addRoomModal"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Room #</th>
                                        <th>Type</th>
                                        <th>Capacity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{$room->room_number}}</td>
                                            <td>{{$room->type}}</td>
                                            <td>{{$room->capacity}}</td>
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
    <div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('add-room')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Room #</div>
                                    <input type="text" id="room" name="room_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Capacity</div>
                                    <input type="number" id="capacity" name="capacity" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Type</div>
                                    <select name="type" data-placeholder="Choose a type..." class="form-control standardSelect" tabindex="1">
                                        <option value=""></option>
                                        <option value="Lecture">Lecture</option>
                                        <option value="Laboratory">Laboratory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end modal --}}
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