@extends('layouts.admin-layout')

@section('title', 'Create Schedule')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/assets/css/drag.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/chosen/chosen.min.css')}}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('admin-assets/assets/css/schedule.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet">
    
    
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <p class=" breadcrumb">S.Y. {{$academicYearTerm->academic_year->year_start}}-{{$academicYearTerm->academic_year->year_start + 1}}:<em>{{$academicYearTerm->term->term}}</em></p>
                </div>
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
        <div class="tab-group bg-light">
            <section id="tab1" title="Classes/Blocks" class="p-3">
                <div id="toolbar">
                    <button id="button" class="btn btn-primary rounded"><i class="fa fa-plus-square"></i> Open</button>
                </div>
                <table id="table" data-toggle="table" data-toolbar="#toolbar" data-click-to-select="true"  data-search="true" data-height="530" class="table table-bordered bg-white">
                    <thead>
                        <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="course_code" data-sortable="true">Subject Code</th>
                        <th data-field="description" data-sortable="true">Description</th>
                        <th data-field="year_level" data-sortable="true" >Year Level</th>
                        <th data-field="blocks" data-sortable="true">Blocks</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr data-subject-id="{{$subject->id}}">
                                <td></td>
                                <td>{{$subject->course_code}}</td>
                                <td>{{$subject->description}}</td>
                                <td>{{$subject->year_level}}</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <section id="tab2" title="Load Subjects">
                @include('pages.load-subjects')
            </section>
            <section id="tab3" title="Plot Schedule">
                @include('pages.plot-schedule')
            </section>
          </div>
        {{-- <div class="animated fadeIn" >
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
        </div>  --}}
    </div>
    {{-- open classes modal --}}
    <div id="openClasses" class="modal fade fadeIn" tabindex="-1">
        <div class="modal-dialog">
            <form action="" method="POST">
            @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Open New Classes/Blocks</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="blocks">Enter number of blocks for selected subjects</label>
                        <input id="blocks" class="form-control" type="number">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary rounded">Ok</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- open classes modal --}}
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script  src="{{asset('admin-assets/assets/js/script.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/drag.js')}}"></script>
    <script>
        $(document).ready(function () {
            var $table = $('#table')
            var $table = $('#table');
            var $button = $('#button');
            var $modal = $('#openClasses');
            $button.click(function () {
                if($table.bootstrapTable('getSelections').length > 0){
                    $modal.modal('show');
                }else {
                    alert('Please select a subject');
                }
            });
        });
    </script>
@endsection