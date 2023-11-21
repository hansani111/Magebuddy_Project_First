@extends('admin.admin-layouts.app')

@section('contents')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="container">
        <h4 class="mb-0 mt-4">Edit Project</h4>
        <hr />
        <form action="{{ route('project-credentials.update', $project->id) }}" class="active" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="project_name" class="form-control" placeholder="Project Name"
                        value="{{ $project->project_name }}">
                </div>

                {{-- <div class="col mb-3">
                <label for="emp_id">Assigned To</label>

                <select name="assigned_to" id="emp_id" class="form-control">
                    <option value="">Select a Employee</option>
                    @foreach ($users as $row)
                        <option value="{{ $row->id }}"
                            {{ isset($project->emp_id) && $project->emp_id == $row->id ? 'selected' : '' }}>
                            {{ $row->username }}</option>
                    @endforeach

                </select>
            </div> --}}

                <div class="col mb-3">
                    <label class="form-label">Url</label>
                    <input type="url" name="project_url" class="form-control" placeholder="Project Url"
                        value="{{ $project->project_url }}">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="project_username" class="form-control" placeholder="Project Username"
                        value="{{ $project->project_username }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Password</label>

                    <input type="text" name="project_password" class="form-control" placeholder="Project Password"
                        value="{{ $project->project_password }}">

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
