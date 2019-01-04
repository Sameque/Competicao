@extends('templates.default')

@section('content')


    <!-- resources/views/auth/register.blade.php -->

    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <div>
            <div>
                Name
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div>
                Password
                <input type="password" name="password" class="form-control">
            </div>

            <div>
                Confirm Password
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <br/>

            <div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
    </form>

    </div>
@stop