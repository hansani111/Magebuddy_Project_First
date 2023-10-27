@extends('admin.admin-layouts.app')

@section('contents')
    <h1 class="mb-0 mt-4">Detail Project</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="project_name" class="form-control" placeholder="Project Name"
                value="{{ $project->project_name }}" readonly>
        </div>

        <div class="col mb-3">
            <label for="emp_id">Assigned To</label>
            <select name="assigned_to" id="emp_id" class="form-control" value="{{ $project->assigned_to }}" readonly>
                <option value="">Select a Employee</option>
                @foreach ($users as $row)
                    <option
                        value="{{ $row->id }}"{{ isset($project->id) && $project->assigned_to == $row->id ? 'selected' : '' }}>
                        {{ $row->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="col mb-3">
            <label class="form-label">Url</label>
            <input type="url" name="project_url" class="form-control" placeholder="Project Url"
                value="{{ $project->project_url }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="project_username" class="form-control" placeholder="Project Username"
                value="{{ $project->project_username }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="project_password" class="form-control" placeholder="Project Password"
                value="{{ $project->project_password }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $project->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $project->updated_at }}" readonly>
        </div>
    </div>
@endsection
