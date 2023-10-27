@extends('admin.admin-layouts.app')

@section('contents')
    <h1 class="mb-0 mt-4">Add Employee</h1>
    <hr />
    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">

            <div class="col">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="First Name">
            </div>


            <div class="col">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last Name">
            </div>

            <div class="col">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="User Name">
            </div>
        </div>

        <div class="row mb-3">

            <div class="col">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="col">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>

        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
@endsection
