<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Signup</title>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <form class="form-signin bg-secondary rounded pr-3 pl-3" action="{{route('signup')}}" method="post">
        @csrf
        <div class="text-center mb-4">
            <img class="mb-4 mt-3" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2000px-Google_%22G%22_Logo.svg.png"
                alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal text-light">SIGNUP</h1>
        </div>

        <div class="form-label-group">
            <input name="name" type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>
            <label for="inputName">Name</label>
        </div>

        <div class="form-label-group">
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <div class="form-label-group">
            <input name="password_confirmation" type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
            <label for="inputConfirmPassword">Confirm Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <a href="{{route('signin')}}" class="text-white float-right">Signin</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <p class="mt-4 mb-2 text-center text-light">&copy; 2017-2018</p>
    </form>
</body>

</html>
