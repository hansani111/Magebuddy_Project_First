@extends('admin.admin-layouts.app')

@section('contents')

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0 mt-4">List of Employees</h1>
            <a href="{{ route('employee.create') }}" class="btn btn-primary">+ Add Employee</a>
        </div>
        <hr />
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    {{-- <th>Project<br>Assigned To</th> --}}
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($employee->count() > 0)
                    @foreach ($employee as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->firstname }}</td>
                            <td class="align-middle">{{ $rs->lastname }}</td>
                            <td class="align-middle">{{ $rs->username }}</td>
                            <td class="align-middle">{{ $rs->email }}</td>
                            <td class="align-middle">{{ $rs->password }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('employee.show', $rs->id) }}" type="button"
                                        class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('employee.edit', $rs->id) }}" type="button"
                                        class="btn btn-warning">Edit</a>

                                    <form action="{{ route('employee.destroy', $rs->id) }}" method="POST" type="button"
                                        class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Project not found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
