@extends('layouts.admin-layout')

@section('title', 'Manage Faculty')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        {{-- Toast for success message --}}
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
                <div class="toast-header text-light">
                    <strong class="mr-auto"></strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body text-success" style="background-color: rgb(255, 255, 255)">
                </div>
            </div>
        </div>
        {{-- Toast for success message --}}
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
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                        <tr data-facultyId="{{$faculty->id}}">
                                            <td><a href="{{route('show-faculty', $faculty)}}">{{$faculty->first_name}} {{$faculty->last_name}}</a></td>
                                            <td>{{$faculty->rank}}</td>
                                            <td>{{$faculty->status}}</td>
                                            <td class="text-center">
                                                <span class="ti-pencil p-1 text-light rounded-lg bg-success" data-toggle="modal" data-toggle="tooltip" data-target="#updateFacultyModal" data-placement="top" title="Edit"  style="cursor: pointer"></span>
                                                <span class="ti-trash rounded-lg p-1 bg-danger text-light" data-toggle="modal" data-toggle="tooltip" data-target="#deleteFaculty" data-placement="top" title="Delete" style="cursor: pointer"></span>
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
    <div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="addFaculty" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('add-faculty')}}" method="post" id="addFacultyForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFaculty">Add Faculty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="card-body card-block">
                            
                                <div class="form-group col-lg-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="rank">Rank</label>
                                    <select id="rank" name="rank" data-placeholder="" class="form-control standardSelect" tabindex="1">
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
                                <div class="form-group col-lg-12">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                        <option value=""></option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Part time">Part time</option>
                                    </select>
                                </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- edn modal --}}
    {{-- edit modal --}}
    <div class="modal fade" id="updateFacultyModal" tabindex="-1" role="dialog" aria-labelledby="updateFaculty" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="post" id="updateFacultyForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateFaculty">Update Faculty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="card-body card-block">
                            
                                <div class="form-group col-lg-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="rank">Rank</label>
                                    <select id="rank" name="rank" data-placeholder="" class="form-control standardSelect" tabindex="1">
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
                                <div class="form-group col-lg-12">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                        <option value=""></option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Part time">Part time</option>
                                    </select>
                                </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- edit modal --}}
    {{-- Delete confirmation modal --}}
    <div class="modal fade" id="deleteFaculty" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="" method="post" id="deleteFacultyForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Delete Faculty!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body card-block">
                            <p id="deleteFacultyMessage" class="card-content text-danger"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Delete confirmation modal --}}
    
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event){
                if(event.target.classList.contains('ti-pencil')||event.target.classList.contains('ti-trash')) {
                    let facultyId  = event.target.closest('tr').getAttribute('data-facultyId');
                    fetch(`{{ route('show-faculty', ':facultyId') }}`.replace(':facultyId', facultyId), {
                        method: 'GET', // Use the appropriate HTTP method
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest', // Set the X-Requested-With header
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Set the CSRF token header
                        }
                    })
                        .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json(); // Parse the JSON response
                            })
                        .then(data => {
                            if(event.target.classList.contains('ti-pencil')) {
                                let updateFacultyForm = document.getElementById('updateFacultyForm');
                                updateFacultyForm.action = `{{ route('update-faculty', ':facultyId') }}`.replace(':facultyId', facultyId);
                                updateFacultyForm.first_name.value = data.first_name;
                                updateFacultyForm.last_name.value = data.last_name;
                                updateFacultyForm.rank.value = data.rank;
                                updateFacultyForm.status.value = data.status;
                            } else {
                                let deleteFacultyForm = document.getElementById('deleteFacultyForm');
                                deleteFacultyForm.action = `{{ route('delete-faculty', ':facultyId') }}`.replace(':facultyId', facultyId);
                                let deleteFacultyMessage = document.getElementById('deleteFacultyMessage');
                                deleteFacultyMessage.textContent = `Are you sure you want to delete ${data.first_name} ${data.last_name} from the record?`;
                            }
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                }
            });
            function handleFormSubmission(formId, successCallback, actionType) {
                document.getElementById(formId).addEventListener('submit', function(event){
                    event.preventDefault();
                    let formData = new FormData(this);
                    let url = this.getAttribute('action');
                    fetch(url, {
                        method: 'POST', // Use the appropriate HTTP method
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest', // Set the X-Requested-With header
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Set the CSRF token header
                        },
                        body: formData // Set the body as a form data object
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json(); // Parse the JSON response
                        })
                        .then(data => {
                            successCallback(data);

                            let closeButton = document.querySelector(`#${formId} .close`);
                            if (closeButton) closeButton.click(); // Simulate a click on the close button
            
                            // Show toast message
                            console.log(data);
                            let toastElement = document.querySelector('.toast');
                            let toastInstance = new bootstrap.Toast(toastElement);
                            let toastBody = toastElement.querySelector('.toast-body');
                            toastBody.textContent = data.message;
                            let toastHeader = toastElement.querySelector('.toast-header');

                            if (actionType === 'update') {
                                toastHeader.classList.remove('bg-danger');
                                toastHeader.classList.add('bg-success');
                                toastBody.classList.remove('text-danger');
                                toastBody.classList.add('text-success');
                                toastElement.querySelector('strong').textContent = 'Saved!';
                            } else if (actionType === 'delete') {
                                toastHeader.classList.remove('bg-success');
                                toastHeader.classList.add('bg-danger');
                                toastBody.classList.remove('text-success');
                                toastBody.classList.add('text-danger');
                                toastElement.querySelector('strong').textContent = 'Deleted!';
                            }
                            toastInstance.show();
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                });
            }
            handleFormSubmission('updateFacultyForm', function(data) {
                let tableRow = document.querySelector(`tr[data-facultyId="${data.updatedData.id}"]`);
                let facultyId = data.updatedData.id;
                tableRow.querySelector('td:nth-child(1)').innerHTML = `<a href="{{ route('show-faculty', ':facultyId') }}">${ data.updatedData.first_name} ${ data.updatedData.last_name }</a>`.replace(':facultyId', facultyId);
                tableRow.querySelector('td:nth-child(2)').textContent = data.updatedData.rank;
                tableRow.querySelector('td:nth-child(3)').textContent = data.updatedData.status;
            }, 'update');
            handleFormSubmission('deleteFacultyForm', function(data) {
                let tableRow = document.querySelector(`tr[data-facultyId="${data.deletedData.id}"]`);
                tableRow.remove();
            }, 'delete');
        });                                           

    </script>    
    
@endsection