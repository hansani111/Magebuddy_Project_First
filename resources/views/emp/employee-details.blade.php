@extends('employee-layouts.app')

@section('contents')
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->firstname }}</td>
                    <td class="align-middle">{{ $user->lastname }}</td>
                    <td class="align-middle">{{ $user->username }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
