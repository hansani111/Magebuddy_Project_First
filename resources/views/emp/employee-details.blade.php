@extends('employee-layouts.app')

@section('contents')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="container">
        <h4> Employee Details </h4>
        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    {{-- <th>Password</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->firstname }}</td>
                    <td class="align-middle">{{ $user->lastname }}</td>
                    <td class="align-middle">{{ $user->username }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    {{-- <td class="align-middle">{{ $user->password }}</td> --}}
                </tr>
            </tbody>
        </table>
    </div>
@endsection
