<table class="table table-hover">
    <thead>
      <tr>
        <th><input type="checkbox"  class="select-all"></th>
        <th scope="col">id</th>
        <th scope="col">picture</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col" colspan="2">action</th>
      </tr>
    </thead>

    <tbody>

        @if (!$users->isEmpty())
        @foreach ( $users as $user)
      <tr>
        <td><input type="checkbox" id="{{$user->id}}" class="select-item"></td>
        <th scope="row">{{$user->id}}</th>
        <td><img src="{{asset(url('storage/uploads/images/thumb',$user->picture))}}" class="img-thumbnail p-2" alt="picture"></td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td><a href="{{url('edit',$user->id)}}" class="btn btn-dark">edit</a></td>
        <td><a href="{{url('soft-delete',$user->id)}}" class="btn btn-danger">delete</a></td>
      </tr>
        @endforeach
        @else
        <td colspan="12">there is no records</td>
        @endif

    </tbody>

  </table>

<div class="mx-auto w-100">{{$users->links()}}</div>
