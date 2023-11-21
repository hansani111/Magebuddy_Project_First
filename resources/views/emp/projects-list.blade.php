@extends('employee-layouts.app')

@section('contents')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>

    <div class="container">
        <h4>Projects List</h4>
        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    {{-- <th>Project ID</th> --}}
                    <th>Project URL</th>
                    <th>Project Username</th>
                    <th>Project Password</th>
                </tr>
            </thead>
            <tbody>
                @if ($project1->count() > 0)
                    @foreach ($project1 as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->project_name }}</td>
                            {{-- <td class="align-middle">{{ $rs->id }}</td> --}}
                            <td class="align-middle"><a href="http://">{{ $rs->project_url }}</a></td>
                            <td class="align-middle">{{ $rs->project_username }}</td>
                            <td class="align-middle">{{ $rs->project_password }}</td>
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
