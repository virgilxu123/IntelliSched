@extends('layouts.admin-layout')

@section('title', 'Schedule')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Schedule</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Schedule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    

@endsection
@section('content')
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary rounded mt-2" data-toggle="modal" data-target="#mediumModal">
            <i class="fa fa-plus-circle"></i> Create New
        </button>
        <div class="animated fadeIn mt-2">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Schedules</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Academic Year</th>
                                        <th>First Semester</th>
                                        <th>Second Semester</th>
                                        <th>Summer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023-2024</td>
                                        <td><a href=""><em>1st-Semester</em></a></td>
                                        <td>
                                            
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <div class="dropdown-menu-content">
                                                        <a class="dropdown-item" href="#"><i class="fa fa-plus" style="color: blue"></i> New</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-edit" style="color: green"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-trash-o" style="color: red"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2022-2023</td>
                                        <td><a href="#"><em>1st-Semester</em></a></td>
                                        <td><a href=""><em>2nd-Semester</em></a></td>
                                        <td><a href=""><em>Summer</em></a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <div class="dropdown-menu-content">
                                                        <a class="dropdown-item" href="#"><i class="fa fa-edit" style="color: green"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-trash-o" style="color: red"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021-2022</td>
                                        <td><a href=""><em>1st-Semester</em></a></td>
                                        <td><a href=""><em>2nd-Semester</em></a></td>
                                        <td><a href=""><em>Summer</em></a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    <div class="dropdown-menu-content">
                                                        <a class="dropdown-item" href="#"><i class="fa fa-edit" style="color: green"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-trash-o" style="color: red"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>


    <!-- Add Term Modal -->
<div class="modal fade" id="addTermModal" tabindex="-1" role="dialog" aria-labelledby="addTermModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTermModalLabel">Add Term Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to add a new term?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmAddTerm" data-dismiss="modal">Add Term</button>
            </div>
        </div>
    </div>
</div>


    {{-- modal --}}
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Create New Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <label for="year" class=" form-control-label">Academic Year</label>
                                    <input type="text" id="year" name="year" placeholder="Enter Acad Yr.." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="term" class=" form-control-label">Term</label>
                                    <select name="term" id="term" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">Summer</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}

    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Class</a>
                    </li>
                </ul>
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Room 601 </strong>
                                        <span class="dropdown">
                                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <div class="dropdown-menu-content scrollable shadow">
                                                    <a class="dropdown-item" href="#">601</a>
                                                    <a class="dropdown-item" href="#">602</a>
                                                    <a class="dropdown-item" href="#">603</a>
                                                    <a class="dropdown-item" href="#">604</a>
                                                    <a class="dropdown-item" href="#">605</a>
                                                    <a class="dropdown-item" href="#">606</a>
                                                </div>
                                            </div>
                                        </span>
                                        Schedule
                                        
                                        <span class="float-right"><button class="btn btn-primary rounded"><i class="fa fa-plus"></i> Generate</button></span>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Monday</th>
                                                    <th scope="col">Tuesday</th>
                                                    <th scope="col">Wednesday</th>
                                                    <th scope="col">Thursday</th>
                                                    <th scope="col">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th rowspan="2" >7:00-8:00</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td rowspan="2"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3" class="bg-success text-light">
                                                            CS 111 <span class="float-right">7:30-9:00</span>  <br>
                                                            <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light">
                                                        CS 213 <span class="float-right">7:30-9:00</span>  <br>
                                                        <b>Roque Day</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-success text-light">
                                                        CS 111 <span class="float-right">7:30-9:00</span>  <br>
                                                        <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light">
                                                        CS 213 <span class="float-right">7:30-9:00</span>  <br>
                                                        <b>Roque Day</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >8:00-9:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >9:00-10:00</th>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 411 <span class="float-right">9:00-10:30</span>  <br>
                                                        <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 312 <span class="float-right">9:00-10:30</span>  <br>
                                                        <b>Kevin Salcedo</b>
                                                    </td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 411 <span class="float-right">9:00-10:30</span>  <br>
                                                        <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 312 <span class="float-right">9:00-10:30</span>  <br>
                                                        <b>Kevin Salcedo</b>
                                                    </td>
                                                </tr>
                                                <tr>

                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >10:00-11:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 412 <span class="float-right">10:30-12:00</span>  <br>
                                                        <b>Josephine Bulilan</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light"> 
                                                        CS 211 <span class="float-right">10:30-12:00</span>  <br>
                                                        <b>Grace Love Tidalgo</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 412 <span class="float-right">10:30-12:00</span>  <br>
                                                        <b>Josephine Bulilan</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light"> 
                                                        CS 211 <span class="float-right">10:30-12:00</span>  <br>
                                                        <b>Grace Love Tidalgo</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >11:00-12:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >12:00-1:00</th>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >1:00-2:00</th>
                                                    <td rowspan="3" class="bg-success text-light"> 
                                                        CS 114 <span class="float-right">1:00-2:30</span>  <br>
                                                        <b>Cherly Sardovia</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 311 <span class="float-right">1:00-2:30</span>  <br>
                                                        <b>Esmail Maliberan</b>
                                                    </td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="3" class="bg-success text-light"> 
                                                        CS 114 <span class="float-right">1:00-2:30</span>  <br>
                                                        <b>Cherly Sardovia</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 311 <span class="float-right">1:00-2:30</span>  <br>
                                                        <b>Esmail Maliberan</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >2:00-3:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3" class="bg-success text-light"> 
                                                        CS 112 <span class="float-right">2:30-4:00</span>  <br>
                                                        <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light"> 
                                                        CS 212 <span class="float-right">2:30-4:00</span>  <br>
                                                        <b>Born Christian Isip</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-success text-light"> 
                                                        CS 112 <span class="float-right">2:30-4:00</span>  <br>
                                                        <b>Coravil Joy Avila</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-info text-light"> 
                                                        CS 212 <span class="float-right">2:30-4:00</span>  <br>
                                                        <b>Born Christian Isip</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >3:00-4:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >4:00-5:00</th>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 413 <span class="float-right">4:00-5:30</span>  <br>
                                                        <b>Sheila Ann Pacheco</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 313 <span class="float-right">4:00-5:30</span>  <br>
                                                        <b>Kevin Salcedo</b>
                                                    </td>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="3" class="bg-danger text-light"> 
                                                        CS 413 <span class="float-right">4:00-5:30</span>  <br>
                                                        <b>Sheila Ann Pacheco</b>
                                                    </td>
                                                    <td rowspan="3" class="bg-warning text-light"> 
                                                        CS 313 <span class="float-right">4:00-5:30</span>  <br>
                                                        <b>Kevin Salcedo</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" >5:00-6:00</th>
                                                    <td rowspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3>This page will display the assigned subjects of each faculty in tabular format</h3>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h3>This displays the class schedules</h3>
                    </div>
                </div>


            </div>
        </div>
    </div> --}}
    
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add a click event listener to the "Add Term" buttons in the modal
            $('.add-term-btn').click(function () {
                // Get the id from the associated <a> tag
                var termId = $(this).prev('a').attr('id');
    
                // Set the term id in the modal confirmation button
                $('#confirmAddTerm').data('term-id', termId);
            });
    
            // Add a click event listener to the "Add Term" button in the modal
            $('#confirmAddTerm').click(function () {
                // Get the term id from the modal confirmation button data attribute
                var termId = $(this).data('term-id');
    
                // Use the term id as needed
                console.log('Selected term id:', termId);
    
                // Implement your logic to create the term here
    
                // Close the modal after confirmation
                $('#addTermModal').modal('hide');
            });
        });
    </script>


@endsection