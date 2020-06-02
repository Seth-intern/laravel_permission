@extends('layouts.master')

@section('content')

    <div class="col-lg-6 offset-3">

        <h2>Log In</h2>

        <form method="POST" action="/login">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('user.reg') }}" class="btn btn-info">Register</a>
            </div>
            {{--@include('partials.formerrors')--}}
        </form>

    </div>

@endsection