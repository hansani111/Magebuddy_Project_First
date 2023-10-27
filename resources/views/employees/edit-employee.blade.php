@extends('admin.admin-layouts.app')

@section('contents')
    <h1 class="mb-0 mt-4">Edit Employee</h1>
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
@endsection
