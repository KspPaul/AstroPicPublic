@include('Includes/topView')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
<body>
<br>
<br>

<bl
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
          

            <h5 class="card-title text-center">Register</h5>
            <form method="POST" action="{{ route('register') }}">
           {{ csrf_field() }} 
              <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Username" required autofocus>
                <label for="inputUserame">{{ __('Name') }}</label>
              </div>

              <div class="form-label-group">
                  <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Emailaddress" required autofocus>
                <label for="email">Email</label>
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
              
              <div class="form-label-group">
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Password" required autofocus>
                <label for="password-confirm">Confirm password</label>
              </div>

              <button class="btn btn-lg btn-dark btn-block" type="submit">{{ __('Register') }}</button>
              <a class="d-block text-center mt-2 small" href="{{url('login')}}">Sign In</a>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>