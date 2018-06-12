<form action="{{route('user.destroy',$user)}}" method="post">
@method('delete')
@csrf
<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-outline-danger">Delete</button>
</form>
