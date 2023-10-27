@extends('admin.admin-layouts.app')

@section('contents')
    <h1 class="mb-0 mt-4">Detail Employee</h1>
    <hr />

    <div class="row mb-3">

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
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="User Name"
                value="{{ $employee->username }}" readonly>
        </div>
    </div>

    <div class="row mb-3">

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

    </div>

    <div class="row">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
