@if(count($users) > 0)
<div class="table-responsive">
    <table class="table table-dark tablesorter table-hover table-striped table-bordered" id="userTable" style="width:100%">
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
@else
<div class="table-responsive">
    <table class="table table-light tablesorter table-hover table-striped table-bordered text-center" id="userTable" style="width:100%">
    <td><b>{{$search}}</b> was not found.</td>
    </table>

        <p class="text-center text-white"></p>
</div>
@endif
