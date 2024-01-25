@extends('master')
@section('content')


    <form action="{{ url('') }}" method="post" id="my-dropzone" class="card dropzone" enctype="multipart/form-data">
    </form>



@endsection

@section('script')
<script>

$("#my-dropzone").dropzone({ url: "/file/post" });

</script>
@endsection

