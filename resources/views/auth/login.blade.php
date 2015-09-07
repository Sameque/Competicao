@extends('templates.default')

@section('content')

    <!-- resources/views/auth/login.blade.php -->
    <div class="formLog">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div>
                Password
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div>
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </div>
        </form>
    </div>
@stop