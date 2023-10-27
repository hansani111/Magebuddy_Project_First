@extends('employee-layouts.app')

@section('contents')

    <div class="container">
        <h4>Projects List</h4>
        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Project ID</th>
                    <th>Project URL</th>
                    <th>Project Username</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() > 0)
                    @foreach ($data as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->project_name }}</td>
                            <td class="align-middle">{{ $rs->id }}</td>
                            <td class="align-middle"><a href="http://">{{ $rs->project_url }}</a></td>
                            <td class="align-middle">{{ $rs->project_username }}</td>
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
