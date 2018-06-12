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
                                    {{--
                                    <th scope="col">DOB</th> --}} {{--
                                    <th scope="col">Gender</th> --}}
                                    <th scope="col">Contact</th>
                                    {{--
                                    <th scope="col">Country</th> --}}
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-capitalize" scope="row">{{$loop->index + 1}}</td>
                                    <td class="text-capitalize">{{$user->firstname}}</td>
                                    <td class="text-capitalize">{{$user->middlename}}</td>
                                    <td class="text-capitalize">{{$user->lastname}}</td>
                                    {{--
                                    <td>{{$user->dob}}</td> --}} {{--
                                    <td class="text-capitalize">{{$user->gender}}</td> --}}
                                    <td>{{$user->contact}}</td>
                                    {{--
                                    <td class="text-capitalize">{{$user->country}}</td> --}}
                                    <td class="text-capitalize">{{$user->state}}</td>
                                    <td class="text-capitalize">{{$user->city}}</td>
                                    <td class="text-capitalize">
                                        <a href="{{route('user.show',$user->id)}}" class="btn btn-primary">Edit</a>
                                        <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onClick="destroy('{{ URL::to('user/' . $user->id .'')}}','Delete User');">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        {{$users->render()}} Showing {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} entries
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

<!-- Destroy Modal -->
<div class="modal fade " id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
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

    function destroy(url, title) {
        $.ajax({
            url: url,
            method: "GET",
            success: function (data) {
                //$('#editModal .modal-body').html(data);
                $('#destroyModal').modal();
                $('#destroyModal').on('shown.bs.modal', function () {
                    $('#destroyModal .modal-footer').html(data);
                    $('#destroyModal .modal-title').html(title);
                });
                $('#destroyModal').on('hidden.bs.modal', function () {
                    $('#destroyModal .modal-body').empty();
                });
            }
        });
    }

</script>
@endpush
