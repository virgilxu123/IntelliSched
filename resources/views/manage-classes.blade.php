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
                    <h1>Manage Classes</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Manage Classes</li>
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
                            <strong class="card-title">LIST OF CLASS GROUP</strong>
                            <button type="button" class="btn btn-primary float-right rounded" data-toggle="modal" data-target="#addClassModal"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Year</th>
                                        <th>Blocks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CS 111</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 112</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-US</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-MMW</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-PC</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Math 1</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IT 1</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PE 1</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>NSTP 1</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>CS 121</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 122</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 123</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-BC</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-STS</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-E</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Ge-CW</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PE 2</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>NSTP 2</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>CS 211</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 212</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 213</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 214</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Entrep 1</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-AA</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PE 3</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>CS 221</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 222</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CS 223</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Math</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Entrep 1</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GE-AA</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PE 3</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <form action="" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Course Code</div>
                                    <input type="text" id="code" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Year</div>
                                    <select data-placeholder="Choose a Country..." class="form-control standardSelect" tabindex="1">
                                        <option value=""></option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Blocks</div>
                                    <input type="number" id="blocks" name="blocks" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
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


    
