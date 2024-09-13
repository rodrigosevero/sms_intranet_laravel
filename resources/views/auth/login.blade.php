@extends('layouts.admin._masterlogin')

@section('content')
<div class="login-box-body"><!-- {{ __('Login') }} -->
<p class="login-box-msg">Entre para iniciar a sessão</p>

<form method="POST" action="{{ route('login') }}">
 @csrf

<div class="form-group has-feedback">
<input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
@if ($errors->has('email'))
<span class="invalid-feedback">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
<input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
@if ($errors->has('password'))
<span class="invalid-feedback">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>

<div class="row">
<div class="col-xs-8">
<div class="checkbox icheck">
<label>
<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
</label>
</div>
</div>
<div class="col-xs-4">
<button type="submit" class="btn btn-success btn-block btn-flat">{{ __('Login') }}</button>
</div>
</div>
</form>


<a class="btn-link" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>


</div>
@endsection
