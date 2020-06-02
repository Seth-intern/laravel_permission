@extends('layouts.master')

@section('content')

    <div class="col-xl-6 offset-3">
        <h2>Register</h2>
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('user.log') }}" class="btn btn-info">Login</a>
            </div>
            {{--@include('partials.formerrors')--}}
        </form>
    </div>

@endsection