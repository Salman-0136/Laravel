@extends('layouts.main')
@push('head')
    <title>Todoist-Home Page</title>
@endpush

@section('main-section')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="lead display-4 mt-5">Finally, get your life and job organized with <span class="text-danger fw-normal">Todoist</span></h1>
                <p class="lead mt-5 text-danger">Manage your tasks easily and efficiently.</p>
                <p class="lead mt-3 text-danger">Become focused, organized, and calm with Todoist. The world’s #1 task manager and to-do list app.</p>
                <a href="{{route('todo.dashboard')}}" class="btn btn-danger btn-lg mt-5">Get Started</a>
            </div>
        </div>
    </div>
@endsection
