@extends('admin.admin-layouts.app')

@section('contents')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="container">
        <h4 class="mb-0 mt-4">Edit Employee</h4>
        <hr />

        <form action="{{ route('employee.update', $employee->id) }}" class="active" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">

                <div class="col">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="First Name"
                        value="{{ $employee->firstname }}">
                </div>


                <div class="col">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name"
                        value="{{ $employee->lastname }}">
                </div>

                <div class="col">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        value="{{ $employee->username }}">
                </div>

                <div class="col mb-3">
                    <label for="projectassignedto">Project Assigned To</label>

                    <select name="projectassignedto[]" id="projectassignedto" class="form-control" multiple>
                        <option value="">Selected Projects</option>
                        @foreach ($projects as $row)
                            <option value="{{ $row->id }}"
                                {{ isset($employee->projectassignedto) && in_array($row->id, $intArray) ? 'selected' : '' }}>
                                {{ $row->project_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row mb-3">

                <div class="col">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email"
                        value="{{ $employee->email }}">
                </div>

                <div class="col">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password"
                        value="{{ $employee->password }}">
                </div>

            </div>

            <div class="row">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>

        </form>
    </div>
@endsection
