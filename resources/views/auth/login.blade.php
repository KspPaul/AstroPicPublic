@include('Includes/topView')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">



<body>
<br>
<br>

<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
          

            <h5 class="card-title text-center">Login</h5>
            <form method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
              

              <div class="form-label-group">
                  <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Emailaddress" required autofocus>
                <label for="email">{{ __('email') }}</label>
              </div>
              
              

             <div class="form-label-group">
                <input name="password"  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                <label for="password">Password</label>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            <div class="form-group row">
                            <div class="col-md-6 offset-md-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
              <button class="btn btn-lg btn-dark btn-block" type="submit">{{ __('Login') }}</button>
              <a class="d-block text-center mt-2 small" href="{{url('register')}}">Sign up</a>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
