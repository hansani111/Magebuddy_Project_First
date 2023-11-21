@extends('admin.admin-layouts.app')

@section('contents')
    {{-- <h1 class="mb-0 mt-4">Detail Project</h1>
    <hr /> --}}
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>


    <div class="container">
        <h4 class="mb-0 mt-4">Detail Project</h4>

        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    {{-- <th>Password</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{{ $project->id }}</td>
                    <td class="align-middle">{{ $project->project_name }}</td>
                    <td class="align-middle">{{ $project->project_url }}</td>
                    <td class="align-middle">{{ $project->project_username }}</td>
                    <td class="align-middle">{{ $project->project_password }}</td>
                    <td class="align-middle">{{ $project->created_at }}</td>
                    <td class="align-middle">{{ $project->updated_at }}</td>
                </tr>
            </tbody>
        </table>




    </div>

    {{-- <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="project_name" class="form-control" placeholder="Project Name"
                value="{{ $project->project_name }}" readonly>
        </div> --}}

    {{-- <div class="col mb-3">
            <label for="emp_id">Assigned To</label>
            <select name="assigned_to" id="emp_id" class="form-control" value="{{ $project->assigned_to }}" readonly>
                <option value="">Select a Employee</option>
                @foreach ($users as $row)
                    <option
                        value="{{ $row->id }}"{{ isset($project->id) && $project->assigned_to == $row->id ? 'selected' : '' }}>
                        {{ $row->username }}</option>
                @endforeach
            </select>
        </div> --}}

    {{-- <div class="col mb-3">
            <label class="form-label">Url</label>
            <input type="url" name="project_url" class="form-control" placeholder="Project Url"
                value="{{ $project->project_url }}" readonly>
        </div>
    </div> --}}


    {{-- <div class="row">
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
    </div> --}}
@endsection
