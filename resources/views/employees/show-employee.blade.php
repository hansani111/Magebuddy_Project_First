@extends('admin.admin-layouts.app')

@section('contents')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="container">
        <h4 class="mb-0 mt-4">Detail Employee</h4>
        <hr />

        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Projects Assigned</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    {{-- <th>Password</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{{ $employee->id }}</td>
                    <td class="align-middle">{{ $employee->firstname }}</td>
                    <td class="align-middle">{{ $employee->lastname }}</td>
                    <td class="align-middle">{{ $employee->username }}</td>

                    <td class="align-middle">
                        <ul>
                            @foreach ($projects as $data)
                                <li> {{ $data->project_name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="align-middle">{{ $employee->email }}</td>
                    <td class="align-middle">{{ $employee->password }}</td>
                    <td class="align-middle">{{ $employee->created_at }}</td>
                    <td class="align-middle">{{ $employee->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>











    {{-- <div class="row mb-3">

        <div class="col">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" placeholder="First Name"
                value="{{ $employee->firstname }}" readonly>
        </div>


        <div class="col">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" placeholder="Last Name"
                value="{{ $employee->lastname }}" readonly>
        </div>

        <div class="col">
            <label for="employeename">employeename</label>
            <input type="text" name="employeename" class="form-control" placeholder="employee Name"
                value="{{ $employee->employeename }}" readonly>
        </div>

        <div class="col">

            <label for="projectassignedto">Project Assigned To</label>

            <select name="assigned_to" id="assigned_to" class="form-control"> 

            <select name="projectassignedto[]" id="projectassignedto" class="form-control" multiple>
                $  = json_decode($ -> ) 
                <option value="">Select a Project</option>
                @foreach ($projects as $row)
                    <option value="{{ $row->id }}"{{ in_array($row->id, $selected) ? 'selected' : '' }}>
                        {{ $row->project_name }}</option>
                @endforeach
            </select>


    </div>
    </div> --}}

    {{-- <div class="row mb-3">

        <div class="col">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $employee->email }}"
                readonly>
        </div>

        <div class="col">
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password"
                value="{{ $employee->password }}" readonly>
        </div>

    </div> --}}

    {{-- <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $employee->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $employee->updated_at }}" readonly>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
