@extends('leave::index') @push('title') Leave @endpush @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-secondary rounded">
                <div class="card-header">
                    <h4 class="card-title text-white">Users</h4>
                    <div class="card-title">
                        <form class="" id="userform" method="get" action="{{url('searchuser')}}">
                            @csrf
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search" id="search" required> {{--
                            <button class="btn btn-outline-primary" type="submit">Search</button> --}}
                        </form>
                    </div>
                </div>
                <div class="result">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-striped table-bordered" id="userTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="headerSortUp">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Middle</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{$loop->index + 1}}</td>
                                    <td>{{$user->firstname}}</td>
                                    <td>{{$user->middlename}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->contact}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>{{$user->state}}</td>
                                    <td>{{$user->city}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        {{$users->render()}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('script')


<script type="text/javascript">
    $('html').bind('keypress', function (e) {
        if (window.event.keyCode == 13) return false;
    });

    $('#search').keyup(function (e) {
        e.preventDefault();
        if ($(this).val() === '') {
            var url = '{{url('getuser')}}';
            var get = $('#userform').attr('method');
            $.ajax({
                type: get,
                url: url
            }).done(function (data) {
                $('.result').html(data);
            })
        } else {
            var url = $('#userform').attr('action');
            var data = $('#userform').serializeArray();
            var get = $('#userform').attr('method');
            $.ajax({
                type: get,
                url: url,
                data: data
            }).done(function (data) {
                $('.result').html(data);
            })
        }
    });


    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getUsers(page, $('#search').val());
    })

    function getUsers(page, search) {
        var url = "{{url('searchuserpage')}}";
        $.ajax({
            type: 'get',
            url: url + '?page=' + page,
            data: {
                'search': search
            }
        }).done(function (data) {
            $('.result').html(data);
        })
    }

</script>
@endpush
{{-- var data = $('.result').html() console.log($('.result').html()); $('.result').html(data); --}} {{-- $('#search').keyup(function
(e) { e.preventDefault(); console.log($("#search").val()); if ($("#search").val() == '') { $data = getAllUsers(); var data
= $data.html() console.log($('.result').html()); } }); --}} {{-- function getAllUsers() { var url = "{{url('user')}}"; $.ajax({
type: 'get', url: url, }).done(function (data) { console.log(data); }) } --}} {{-- user search form js --}} {{-- $('#userform').on('submit',
function (e) { e.preventDefault(); var url = $(this).attr('action'); var data = $(this).serializeArray(); var get = $(this).attr('method');
$.ajax({ type: get, url: url, data: data }).done(function (data) { console.log(data); $('.result').html(data); }) }); --}}
