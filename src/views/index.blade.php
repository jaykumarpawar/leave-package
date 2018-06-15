<!doctype html>
<html lang="en">

<head>
    <title>@stack('title','Leave')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('leave/resources/css/bootstrap.min.css')}}">
    {{--
    <script type="text/javascript" src="{{asset('leave/resources/js/jquery-latest.js')}}"></script> --}}

    {{-- <link rel="stylesheet" href="{{asset('leave/resources/css/custom.css')}}"> --}}
     {{--
    <link rel="stylesheet" href="{{asset('leave/resources/css/style.css')}}"> --}} {{--
    <link rel="stylesheet" href="{{asset('leave/resources/css/webfont.css')}}"> --}}
    <style>
        body {
            min-height: 65rem;
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

        .pagination{
            float:right;
        }
        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .page-item:last-child .page-link {
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem
        }

        .page-item .page-link {
            z-index: 1;
            color: #fff;
            background-color: #32383e;
            border: 1px solid #dee2e6;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #32383e;
            border: 1px solid #dee2e6;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: disabled;
            background-color: #32383e;
            border: 1px solid #dee2e6;
        }

        .pagination-lg .page-link {
            padding: .75rem 1.5rem;
            font-size: 1.25rem;
            line-height: 1.5
        }

        .pagination-lg .page-item:first-child .page-link {
            border-top-left-radius: .3rem;
            border-bottom-left-radius: .3rem
        }

        .pagination-lg .page-item:last-child .page-link {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem
        }

        .pagination-sm .page-link {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5
        }

        .pagination-sm .page-item:first-child .page-link {
            border-top-left-radius: .2rem;
            border-bottom-left-radius: .2rem
        }

        .pagination-sm .page-item:last-child .page-link {
            border-top-right-radius: .2rem;
            border-bottom-right-radius: .2rem
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
                        @if(Auth::user()->role=='admin')
                        <a class="dropdown-item" href="{{route('user.create')}}">Add</a>
                        <a class="dropdown-item" href="{{route('user.index')}}">List</a>
                        <a class="dropdown-item " href="{{route('user.edit',Auth::id())}}">Profile</a>
                        @else
                        <a class="dropdown-item " href="{{route('user.edit',Auth::id())}}">Profile</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leave</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="{{route('applyleave')}}">Apply Leave</a>
                        @if(Auth::user()->role=='admin')
                        <a class="dropdown-item" href="{{route('listleave')}}">View Leaves</a>
                        @endif
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
    <script src="{{asset('leave/resources/js/jquery.min.js')}}"></script>
    <script src="{{asset('leave/resources/js/popper.min.js')}}"></script>
    <script src="{{asset('leave/resources/js/bootstrap.min.js')}}"></script>

    {{-- JS FOR DATATABLES  --}}
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
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
 @stack('script')
</html>
