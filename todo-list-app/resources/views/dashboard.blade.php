@extends('layouts.main')
@push('head')
    <title>Todoist-Dashboard</title>
@endpush

@section('main-section')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <a href="{{route('todo.welcome')}}" class="btn btn-primary btn-lg">Back</a>
            <div class="h2">All Todos</div>
            <a href="{{route('todo.create')}}" class="btn btn-primary btn-lg">Add Todo</a>
        </div>
        <table class="table table-stripted table-dark">
            <tr>
                <th>Name</th>
                <th>Work</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
            @foreach($todos as $todo)
                <tr valign='middle'  >
                    <td>{{$todo->name}}</td>
                    <td>{{$todo->work}}</td>
                    <td>{{$todo->duedate}}</td>
                    <td>
                        <a href="{{route('todo.update',$todo->id)}}" class="btn btn-success btn-sm">Update</a>
                        <a href="{{route('todo.delete',$todo->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection