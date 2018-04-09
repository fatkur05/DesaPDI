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
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
      <label for="inputEmail" class="sr-only">Name</label>
      <input type="text" name="name" id="inputName" class="form-control" placeholder="Please insert your name" required autofocus>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputPassword" class="sr-only">Password Confirmation</label>
      <input type="password" name="passwordconfirm" id="inputPasswordConfirmation" class="form-control" placeholder="Password Confirmation" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>