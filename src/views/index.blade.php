<!doctype html>
<html lang="en">

<head>
    <title>@stack('title','Leave')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/navbar-fixed/navbar-top-fixed.css">  --}}
    {{--
    <script type="text/javascript" src="{{asset('leave/resources/js/jquery-latest.js')}}"></script> --}} {{--
    <link rel="stylesheet" href="{{asset('leave/resources/css/custom.css')}}"> --}} {{--
    <link rel="stylesheet" href="{{asset('leave/resources/css/style.css')}}"> --}} {{--
    <link rel="stylesheet" href="{{asset('leave/resources/css/webfont.css')}}"> --}}
    <style>
        body {
            min-height: 60rem;
            padding-top: 4.5rem;
        }
        .navbar {
            -webkit-box-shadow: 0px 6px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 6px 5px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 6px 5px 0px rgba(0, 0, 0, 0.75);
        }

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
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Leave Package</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="{{route('user.create')}}">Add</a>
                        <a class="dropdown-item" href="{{route('user.index')}}">List</a>
                        <a class="dropdown-item " href="{{route('user.show',Auth::id())}}">Profile</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leave</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="{{route('leave')}}">Apply Leave</a>
                        <a class="dropdown-item" href="{{route('leave')}}">View Leave</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('signout')}}">Signout</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    {{-- JS FOR DATATABLES --}} {{--
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="{{asset('leave/resources/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('leave/resources/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('leave/resources/js/dataTables.select.min.js')}}"></script> --}}
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
{{--
<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            select: true
        });
    });

</script> --}} @stack('script')

</html>
