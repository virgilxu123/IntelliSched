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
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">LIST OF CLASSROOMS</strong>
                            <button type="button" class="btn btn-primary float-right rounded"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div>
                        <div class="card-body ">
                            <div class="table-wrapper-scroll-x my-custom-scrollbar ">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Room #</th>
                                            <th scope="col" colspan="2">7:00 AM</th>
                                            <th scope="col" colspan="2">8:00 AM</th>
                                            <th scope="col" colspan="2">9:00 AM</th>
                                            <th scope="col" colspan="2">10:00 AM</th>
                                            <th scope="col" colspan="2">11:00 AM</th>
                                            <th scope="col" colspan="2">12:00 PM</th>
                                            <th scope="col" colspan="2">1:00 PM</th>
                                            <th scope="col" colspan="2">2:00 PM</th>
                                            <th scope="col" colspan="2">3:00 PM</th>
                                            <th scope="col" colspan="2">4:00 PM</th>
                                            <th scope="col" colspan="2">5:00 PM</th>
                                            <th scope="col" colspan="2">6:00 PM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" colspan="2">601</th>
                                            <td class="fixed-column"></td>
                                            <td colspan="3" class="alert alert-primary m-1"><p>7:30-9:00</p></td>
                                            <td colspan="3">9:00-10:30</td>
                                            <td colspan="3">10:30-12:00</td>
                                            <td colspan="2">12:00-1:00</td>
                                            <td colspan="3">1:00-2:30</td>
                                            <td colspan="3">2:30-4:00</td>
                                            <td colspan="3">4:00-5:30</td>
                                            <td colspan="3">5:30-7:00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">602</th>
                                            <td class="fixed-column"></td>
                                            <td colspan="3">7:30-9:00</td>
                                            <td colspan="3">9:00-10:30</td>
                                            <td colspan="3">10:30-12:00</td>
                                            <td colspan="2">12:00-1:00</td>
                                            <td colspan="3">1:00-2:30</td>
                                            <td colspan="3">2:30-4:00</td>
                                            <td colspan="3">4:00-5:30</td>
                                            <td colspan="3">5:30-7:00</td>
                                            
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
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