@extends('dashboard.app')
@section('content')

@push('styles')
<style>
  .login-form {
    margin: auto;
    margin-top: 5%;
    width: 400px;
    padding: 10px;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
        line-height: 1.1;
        font-family: "Montserrat",sans-serif;
        font-size: 32px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
</style>
@endpush

<div class="login-form">
    <form action="{{route('user.register')}}" method="post">
      @csrf
        <h2 class="pull-left">Register Account</h2>

        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}" >
            <input type="text" name="name" class="form-control" placeholder="Name" required="required" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <small class="form-control-feedback"> {{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <small class="form-control-feedback"> {{ $errors->first('email') }}</small>
            @endif

        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <small class="form-control-feedback"> {{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type Password" required="required">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase">Register</button>
        </div>
        <div class="clearfix">
              <p class="text-center">- or -</p>
            <p class="text-center"><a href="{{route('user.login')}}">Login Your Account</a></p>
        </div>
    </form>

</div>
@endsection
