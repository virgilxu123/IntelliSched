@extends('layouts.admin-layout')

@section('title', 'Manage Classes')

@section('links')
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->


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
                                        <tr data-course_code="{{$subject->course_code}}" data-description="{{$subject->description}}" data-units="{{$subject->units}}" data-year_level="{{$subject->year_level}}" data-term="{{ optional($subject->term)->term ?? '' }}" data-subject_type="{{$subject->subject_type}}" data-laboratory="{{$subject->laboratory}}" data-subject_id="{{$subject->id}}">
                                            <td>{{$subject->course_code}}</td>
                                            <td>{{$subject->description}}</td>
                                            <td>{{$subject->units}}</td>
                                            <td>{{$subject->year_level}}</td>
                                            <td>{{ optional($subject->term)->term ?? '' }}</td>
                                            <td class="text-center">
                                                <span class="ti-pencil p-1 text-light rounded-lg bg-success" data-toggle="modal" data-toggle="tooltip" data-target="#editSubjectModal" data-placement="top" title="Edit"  style="cursor: pointer"></span>
                                                <span class="ti-trash rounded-lg p-1 bg-danger text-light" data-toggle="modal" data-toggle="tooltip" data-target="#deleteSubject" data-placement="top" title="Delete" style="cursor: pointer"></span>
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
                            <input type="text" name="course_code" class="form-control" id="code" >
                        </div>
                        <div class="form-group col-lg-6">   
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="units">Units</label>
                            <input type="number" name="units" class="form-control" id="units" >
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
                            <select id="term" name="term_id" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                @foreach ($terms as $term)
                                    <option value="{{$term->id}}">{{$term->term}}</option>
                                @endforeach
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
                        <button type="button" class="btn btn-dark rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- edn modal --}}
    {{-- update-modal --}}
    <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="post" id='update'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Update Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-lg-12">
                            <label for="code2">Course Code</label>
                            <input type="text" name="course_code" class="form-control" id="code2" placeholder="Course Code">
                        </div>
                        <div class="form-group col-lg-6">   
                            <label for="description2">Description</label>
                            <input type="text" name="description" class="form-control" id="description2" placeholder="Description">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="units2">Units</label>
                            <input type="number" name="units" class="form-control" id="units2" placeholder="Units">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="year_level2">Year</label>
                            <select id="year_level2" name="year_level" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="term2">Term</label>
                            <select id="term2" name="term_id" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                @foreach ($terms as $term)
                                    <option value="{{$term->id}}">{{$term->term}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="subject_type2">Type</label>
                            <select id="subject_type2" name="subject_type" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="Minor">Minor</option>
                                <option value="Major">Major</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="laboratory2">Laboratory</label>
                            <select id="laboratory2" name="laboratory" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                <option value=""></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
    {{-- update-modal --}}
    {{-- Delete confirmation modal --}}
    <div class="modal fade" id="deleteSubject" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="" method="post" id="deleteSubjectForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="mediumModalLabel">Delete Subject!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body card-block">
                            <p id="deleteSubjectMessage" class="card-content text-danger"></p>
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
        document.addEventListener('DOMContentLoaded', function () {
            // Attach event listener to a parent element that exists when the page loads
            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('ti-pencil')||event.target.classList.contains('ti-trash')) {
                    let pencilTrash = event.target;
                    let tr = pencilTrash.closest('tr');
                    let subjectId = tr.getAttribute('data-subject_id');
                    // Make AJAX request to fetch subject details
                    fetch(`{{ route('show-subject', ':subjectId') }}`.replace(':subjectId', subjectId))
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json(); // Parse the JSON response
                        })
                        .then(data => {
                            // Populate the edit modal with fetched data
                            let deleteModal = document.querySelector('#deleteSubject');
                            let editForm = document.querySelector('#editSubjectModal');
                            editForm.querySelector('[name="course_code"]').value = data.course_code;
                            editForm.querySelector('[name="description"]').value = data.description;
                            editForm.querySelector('[name="units"]').value = data.units;
                            editForm.querySelector('[name="year_level"]').value = data.year_level;
                            editForm.querySelector('[name="term_id"]').value = data.term_id;
                            editForm.querySelector('[name="laboratory"]').value = data.laboratory;
                            editForm.querySelector('[name="subject_type"]').value = data.subject_type;

                            deleteModal.querySelector('#deleteSubjectMessage').textContent = `Are you sure you want to delete ${data.course_code} ${data.description}?`;

                            // Update action URL of the form
                            document.querySelector('#update').setAttribute('action', '{{ route("update-subject", ":subjectId") }}'.replace(':subjectId', subjectId));
                            document.querySelector('#deleteSubjectForm').setAttribute('action', '{{ route("delete-subject", ":subjectId") }}'.replace(':subjectId', subjectId));
                            console.log(document.querySelector('#deleteSubjectMessage').getAttribute('action'));
                        })
                        .catch(error => {
                            
                            console.error('There was a problem with the fetch operation:', error);
                        });
                }
            });
            // Function to make AJAX request and handle response
            function handleFormSubmission(formId, successCallback, actionType) {
                document.querySelector(formId).addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Get the form data
                    let formData = new FormData(this);

                    // Get the action URL from the form's action attribute
                    let actionUrl = this.getAttribute('action');

                    // Make an AJAX request
                    fetch(actionUrl, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token header
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Parse the JSON response
                    })
                    .then(data => {
                        // Call the success callback function with the response data
                        successCallback(data);

                        // Manually trigger the modal close event after successful submission
                        let closeButton = document.querySelector(`${formId} .close`);
                        if (closeButton) closeButton.click(); // Simulate a click on the close button

                        // Show toast message
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
                        console.error('There was a problem with the fetch operation:', error);
                        // Handle errors here (e.g., display an error message)
                    });
                });
            }

            // Call the function for update form
            handleFormSubmission('#update', function(data) {
                let tableRow = document.querySelector(`tr[data-subject_id="${data.updatedData.id}"]`);
                tableRow.querySelector('td:nth-child(1)').textContent = data.updatedData.course_code;
                tableRow.querySelector('td:nth-child(2)').textContent = data.updatedData.description;
                tableRow.querySelector('td:nth-child(3)').textContent = data.updatedData.units;
                tableRow.querySelector('td:nth-child(4)').textContent = data.updatedData.year_level;
                tableRow.querySelector('td:nth-child(5)').textContent = data.updatedData.term_name;
            }, 'update');

            // Call the function for delete form
            handleFormSubmission('#deleteSubjectForm', function(data) {
                let tableRow = document.querySelector(`tr[data-subject_id="${data.deletedData.id}"]`);
                tableRow.remove();
            }, 'delete');
        });
    </script>
@endsection


    
