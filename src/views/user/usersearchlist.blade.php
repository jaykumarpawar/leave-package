@if(count($users) > 0)
<div class="table-responsive">
    <table class="table table-dark table-hover table-striped table-bordered" id="userTable" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Middle</th>
                <th scope="col">Last</th>
                <th scope="col">Contact</th>
                <th scope="col">State</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-capitalize" scope="row">{{$user->id}}</td>
                <td class="text-capitalize">{{$user->firstname}}</td>
                <td class="text-capitalize">{{$user->middlename}}</td>
                <td class="text-capitalize">{{$user->lastname}}</td>
                <td>{{$user->contact}}</td>
                <td class="text-capitalize">{{$user->state}}</td>
                <td class="text-capitalize">{{$user->city}}</td>
                <td class="text-capitalize">
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
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
@else
<div class="table-responsive">
    <table class="table table-dark table-hover table-striped table-bordered text-center" id="userTable" style="width:100%">
        <th>
            <b>{{$search}}</b> was not found.</th>
    </table>
    <p class="text-center text-white"></p>
</div>
@endif
