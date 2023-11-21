@extends('admin.admin-layouts.app')

@section('contents')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="mb-0 mt-4">List of Projects</h4>
            <a href="{{ route('project-credentials.create') }}" class="btn btn-primary">+ Add Project</a>
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
                    <th>Name</th>
                    {{-- <th>Assigned To</th> --}}
                    <th>Url</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($project->count() > 0)
                    {{-- {{ dd($project) }} --}}
                    @foreach ($project as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->project_name }}</td>
                            {{-- <td class="align-middle">{{ $rs->emp_id }}</td> --}}
                            <td class="align-middle"><a href="http://">{{ $rs->project_url }}</a></td>
                            <td class="align-middle">{{ $rs->project_username }}</td>
                            <td class="align-middle">{{ $rs->project_password }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('project-credentials.show', $rs->id) }}" type="button"
                                        class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('project-credentials.edit', $rs->id) }}" type="button"
                                        class="btn btn-warning">Edit</a>

                                    <form action="{{ route('project-credentials.destroy', $rs->id) }}" method="POST"
                                        type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
