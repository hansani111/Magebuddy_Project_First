@extends('employee-layouts.app')

@section('contents')
    <div class="container">
        <h4>Welcome, {{ Auth::guard('emp')->user()->email }}!!!</h4>
        <p>{{ $user->firstname }} Project List....</p>
        <ul>
            @if ($data->count() > 0)
                @foreach ($data as $rs)
                    <li>{{ $rs->project_name }}</li>
                @endforeach
            @else
                <li>Project not found...</li>
            @endif
        </ul>
    </div>
@endsection
