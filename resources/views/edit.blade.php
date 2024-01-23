@extends('master')
@section('content')
<h1 class="text-center mb-3">form data insert</h1>
<a href="{{url('list')}}" class="btn btn-dark mb-3">User List</a>
    <form action="{{url('user-edit',$user->id)}}" class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="name">
        <input type="file" name="picture" value="{{$user->picture}}" class="form-control" placeholder="picture">
        <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email">
        <input type="text" name="password" value="{{$user->password}}" class="form-control" placeholder="password">
        <button class="btn btn-dark">submit data</button>
    </form>
@endsection


