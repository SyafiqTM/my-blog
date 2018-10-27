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
    <form action="{{route('user.loginCustomer')}}" method="post">
      @csrf
        <h2 class="pull-left">Sign In</h2>
        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' || $errors->has('messages') ? ' has-danger' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <small class="form-control-feedback"> {{ $errors->first('email') }}</small>
            @elseif ($errors->has('messages'))
                <small class="form-control-feedback"> {{ $errors->first('messages') }}</small>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' || $errors->has('messages') ? ' has-danger' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <small class="form-control-feedback"> {{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
          <div class="checkbox checkbox-primary pull-right p-t-0">
              <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox-signup"> Remember me </label>
          </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase">Log in</button>
        </div>
        <div class="clearfix">
              <p class="text-center">- or -</p>
            <p class="text-center"><a href="{{route('user.register')}}">Create an Account</a></p>
        </div>
    </form>

</div>
@endsection
