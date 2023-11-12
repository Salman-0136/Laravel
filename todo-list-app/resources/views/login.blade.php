@extends('layouts.main')
@push('head')
    <title>Todoist-Home Page</title>
@endpush

@section('main-section')
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control">
                                <div class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror    
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                <div class="text-danger">
                                    @error('password')
                                        {{$message}}
                                    @enderror    
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div class="mt-3">
                            <p class="mb-1">Don't have an account? <a href="#">Sign up here</a></p>
                            <p class="mb-0"><a href="#">Forgot your password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
