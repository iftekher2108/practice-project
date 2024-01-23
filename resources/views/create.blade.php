@extends('master')
@section('content')
<h1 class="text-center mb-3">form data insert</h1>
<a href="{{url('list')}}" class="btn btn-dark mb-3">User List</a>
    <form action="{{url('add-user')}}" class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
       @csrf
        <input type="text" name="name" class="form-control" placeholder="name">
        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="picture">
        @error('picture')
        <span>{{ $message }}</span>
        @enderror
        <input type="email" name="email" class="form-control" placeholder="email">
        <input type="text" name="password" class="form-control" placeholder="password">
        <button class="btn btn-dark">submit data</button>
    </form>
@endsection

