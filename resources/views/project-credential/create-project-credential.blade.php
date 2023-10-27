@extends('admin.admin-layouts.app')

@section('contents')
    <h1 class="mb-0 mt-4">Add Project</h1>
    <hr />
    <form action="{{ route('project-credentials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">

            <div class="col">
                <label for="project_name">Name</label>
                <input type="text" name="project_name" class="form-control" placeholder="Name">
            </div>


            <div class="col">
                <label for="emp_id">Assigned To</label>
                <select name="assigned_to" id="emp_id" class="form-control">
                    <option value="">Select a Employee</option>
                    @foreach ($users as $row)
                        <option value="{{ $row->id }}">{{ $row->username }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="project_url">Url</label>
                <input type="url" name="project_url" class="form-control" placeholder="Project Url">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col">
                <label for="project_username">Username</label>
                <input type="text" name="project_username" class="form-control" placeholder="Username">
            </div>

            <div class="col">
                <label for="project_password">Password</label>
                <input type="text" name="project_password" class="form-control" placeholder="Password">
            </div>

        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
@endsection
