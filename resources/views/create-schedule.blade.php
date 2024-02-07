@extends('layouts.admin-layout')

@section('title', 'Create Schedule')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/assets/css/drag.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/chosen/chosen.min.css')}}">
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left align-bottom">
                <nav>
                    <div class="nav" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="loading-subject" data-toggle="tab" href="#load-subject" role="tab" aria-controls="load-subject" aria-selected="true">Load Subjects</a>
                        <a class="nav-item nav-link" id="plot-schedule" data-toggle="tab" href="#plot" role="tab" aria-controls="plot" aria-selected="false">Plot Schedule</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('schedule')}}">Schedule</a></li>
                        <li class="active">Manage Schedule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="animated fadein" >
            <div class="row tab-content pl-3 pt-2" id="nav-tabContent">
                <div class="tab-pane fade show active col-lg-12" id="load-subject" role="tabpanel" aria-labelledby="loading-subject">
                    <div class="card">
                        <div class="card-header">
                            Load Subjects
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-3">Name</th>
                                        <th class="col-2">Load</th>
                                        <th class="col-2">Designation</th>
                                        <th class="col-5">Subjects</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                    <tr>
                                        <td><a href="{{route('show-faculty', $faculty)}}">{{$faculty->first_name}} {{$faculty->last_name}}</a></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <select data-placeholder="Add Subjects..." multiple class="standardSelect">
                                                <option value=""></option>
                                                <option value="United States">CS 414 - 4A</option>
                                                <option value="United Kingdom">CS 414 - 4B</option>
                                                <option value="Afghanistan">CS 414 - 4C</option>
                                                <option value="Aland Islands">CS 112 - 1A</option>
                                                <option value="Albania">CS 112 - 1B</option>
                                                <option value="Algeria">CS 112 - 1C</option>
                                                <option value="United States">CS 111 - 1A</option>
                                                <option value="United Kingdom">CS 111 - 1B</option>
                                                <option value="Afghanistan">CS 111 - 1C</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="plot"id role="tabpanel" aria-labelledby="plot-schedule">
                    <div class="card col-lg-2" style="height: 500px;overflow:auto;">
                        <h4 class="mb-3">Subjects</h4>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            CS 112 - A <br>
                            Coravil Joy Avila
                        </div>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            CS 112 - B <br>
                            Coravil Joy Avila
                        </div>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            CS 112 - C <br>
                            Coravil Joy Avila
                        </div>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            CS 112 - D <br>
                            Coravil Joy Avila
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - A <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - B <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - C <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - D <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - E <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            CS 111 - F <br>
                            Cherly Sardovia
                        </div>
                        <div class="badge badge-danger fill mb-3" draggable="true">
                            IT 1 - A <br>
                            Grace Love Tidalgo
                        </div>
                        <div class="badge badge-danger fill mb-3" draggable="true">
                            IT 1 - B <br>
                            Grace Love Tidalgo
                        </div>
                        <div class="badge badge-danger fill mb-3" draggable="true">
                            IT 1 - C <br>
                            Grace Love Tidalgo
                        </div>
                        <div class="badge badge-danger fill mb-3" draggable="true">
                            IT 1 - D <br>
                            Grace Love Tidalgo
                        </div>
                        <div class="badge badge-danger fill mb-3" draggable="true">
                            IT 1 - E <br>
                            Grace Love Tidalgo
                        </div>
                        <div class="badge badge-warning fill mb-3" draggable="true">
                            CS 414 - A <br>
                            Catherine Alimboyong
                        </div>
                        <div class="badge badge-warning fill mb-3" draggable="true">
                            CS 414 - B <br>
                            Catherine Alimboyong
                        </div>
                        <div class="badge badge-warning fill mb-3" draggable="true">
                            CS 414 - C <br>
                            Catherine Alimboyong
                        </div>
                        <div class="badge badge-dark fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-success fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-warning fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-dark fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-success fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-secondary fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-warning fill mb-3" draggable="true">
                            Primary
                        </div>
                        <div class="badge badge-primary fill mb-3" draggable="true">
                            Primary
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card" style="height:500px;overflow:auto;">
                            <div class="card-header">
                                <h5>S.Y. 2023-2024 1st Semester</h5>
                                Monday/Thursday
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col" style="width: 250px;height:60px;">601</th>
                                            <th scope="col" style="width: 250px;height:60px;">602</th>
                                            <th scope="col" style="width: 250px;height:60px;">603</th>
                                            <th scope="col" style="width: 250px;height:60px;">604</th>
                                            <th scope="col" style="width: 250px;height:60px;">501</th>
                                            <th scope="col" style="width: 250px;height:60px;">502</th>
                                            <th scope="col" style="width: 250px;height:60px;">503</th>
                                            <th scope="col" style="width: 250px;height:60px;">ComLab 1</th>
                                            <th scope="col" style="width: 250px;height:60px;">ComLab 2</th>
                                            <th scope="col" style="width: 250px;height:60px;">ComLab 3</th>
                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">7:30-9:00</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">9:00-10:30</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">10:30-12:00</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">12:00-1:00</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">1:00-2:30</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        </tbody>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">2:30-4:00</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="white-space: nowrap;">4:00-5:30</th>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                            <td class="empty"></td>
                                        </tr>
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div> 
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin-assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/drag.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/chosen/chosen.jquery.min.js')}}"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
@endsection