@extends('layouts/base')

@section('content')
    <div class="container">
        <div class="">Login</div>
        <form class="pure-form pure-form-stacked" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <label for="email" class="">E-Mail Address</label>

            <input id="email" type="email" class="pure-input-1-2" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif


            <label for="password" class="">Password</label>

            <input id="password" type="password" class="pure-input-1-2" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>


            <button type="submit" class="pure-button pure-button-primary">
                <i class="fa fa-btn fa-sign-in"></i> Login
            </button>

            <a class="pure-button" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

        </form>
    </div>
@endsection
