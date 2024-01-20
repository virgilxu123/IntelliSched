@extends('layouts.admin-layout')

@section('title', 'Profile')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('manage-faculty')}}">Manage Faculty</a></li>
                        <li class="active">Profile</li>
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
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mx-autod-block">
                                <div class="row justify-content-md-center">
                                    <img class="rounded-circle col-lg-9" src="{{asset('admin-assets/images/no-image-icon.png')}}" alt="Profile Pic">
                                </div>
                                <h5 class="text-sm-center mt-2 mb-1">{{$faculty->name}}</h5>
                                <div class="location text-sm-center">{{$faculty->rank}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Personal Details</strong>
                        </div>
                        
                            <div class="card-body card-block">
                                <form action="" method="post" class="">
                                    <div class="form-group col-lg-12">
                                        <label for="name" class=" form-control-label">Name</label>
                                        <input type="text" id="name" name="name" value="{{$faculty->name}}" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="rank" class=" form-control-label">Rank</label>
                                        <select name="rank" data-placeholder="sdfasfsa" class="form-control standardSelect" tabindex="1">
                                            <option value="{{$faculty->rank}}">{{$faculty->rank}}</option>
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
                                    <div class="form-group col-lg-6">
                                        <label for="nf-password" class=" form-control-label">Status</label>
                                        <select name="status" data-placeholder="" class="form-control standardSelect" tabindex="1">
                                            <option value="{{$faculty->status}}">{{$faculty->status}}</option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Part time">Part time</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="workload" class=" form-control-label">Units</label>
                                        <input type="text" id="workload" name="workload" disabled="" value="21" class="form-control disabled">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="workload" class=" form-control-label">Designation</label>
                                        <input type="text" id="workload" name="workload" value="ICT Director" class="form-control disabled">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded mx-3 float-right">Update</button>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Work Load</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">Day/Time</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Students</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection