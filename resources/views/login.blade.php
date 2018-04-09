<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/main.css') }}">
    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('css/signin.css') }}" rel="stylesheet"> -->
  </head>

  <body class="text-center">
    <div class="container">
      @if ( Session::get('message') != '' )
        
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Danger!</strong> {{  Session::get('message') }}
          </div>  
        
      @endif

      @if( Session::get('registration') != '')
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{  Session::get('registration') }}
      </div>
      @endif 

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <a href="#" class="active" id="login-form-link">Login</a>
                </div>
                <div class="col-xs-6">
                  <a href="#"   id="register-form-link">Register</a>
                </div>
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="{{ route('postlogin') }}" method="post" role="form" style="display: block;">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="email" id="login-username" tabindex="1" class="form-control" placeholder="Email" value="" required autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group text-center">
                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                      <label for="remember"> Remember Me</label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                            <div class="row">
                              <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="row back-home">
                              <a href="{{ url('/index') }}" tabindex="5" class="back">Back to Home</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <form id="register-form" action="{{ route('register') }}" method="post" role="form" style="display: none;">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="username" id="register-username"  class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Please insert your username" value="{{ old('username') }}" required autofocus>
                      @if ($errors->has('username'))
                        <div class="invalid-feedback">
                          {{ $errors->first('username') }}
                        </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="register-email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email Address" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                        <div class="invalid-feedback">
                           {{ $errors->first('email') }}
                        </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="register-password"  class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
                      @if ($errors->has('password'))
                        <div class="invalid-feedback">
                           {{ $errors->first('password') }}
                        </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="register-confirm-password"  class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Confirm Password" required>
                      @if ($errors->has('password'))
                        <div class="invalid-feedback">
                          {{ $errors->first('password') }}
                        </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="register-submit" id="register-submit"  class="form-control btn btn-register" value="Register Now">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script> 

    @if ($errors->has('username') or $errors->has('email') or $errors->has('password'))
      <script type="text/javascript">
        $("#register-form").fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $('#register-form-link').addClass('active');
      </script> 
    @endif

  </body>
</html>



