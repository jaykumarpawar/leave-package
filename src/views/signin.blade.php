<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('leave/resources/css/bootstrap.min.css')}}">
    <title>Signin</title>
    <!-- Custom styles for this template -->
    <link href="{{asset('leave/resources/css/floating-labels.css')}}" rel="stylesheet">
    <style>
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #ffc800f5;
        }

        .was-validated .form-control:invalid {
            border-color: #dc3545;
            border-radius: 0px;
        }
    </style>
</head>

<body class="bg-dark">
    <form novalidate class="needs-validation form-signin bg-secondary rounded pr-3 pl-3" action="{{route('signin')}}" method="post">
        @csrf
        <div class="text-center mb-4">
            <img class="mb-4 mt-3" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2000px-Google_%22G%22_Logo.svg.png"
                alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal text-light">SIGNIN</h1>
        </div>
        <div class="form-label-group">
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
            <div class="invalid-feedback">
                Valid email is required.
            </div>
        </div>

        <div class="form-label-group">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
            <div class="invalid-feedback">
                Valid password is required.
            </div>
        </div>

        <div class="checkbox mb-3">
            <label></label>
            {{-- <a href="{{route('signup')}}" class="text-white float-right">Click to Signup</a> --}}
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-4 mb-2 text-center text-light">&copy; 2017-2018</p>
    </form>
</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</html>
