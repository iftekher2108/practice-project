@extends('master')
@section('content')


    <form action="{{ url('') }}" method="post" id="my-dropzone" class="card d-flex dropzone" enctype="multipart/form-data">
    </form>

    <div class="dropjone-list my-5">
        <div class="d-flex gap-3">
            <img src="" class="img-fluid" alt="picture">
            <img src="" class="img-fluid" alt="picture">
            <img src="" class="img-fluid" alt="picture">
        </div>

    </div>


@endsection

@section('script')
<script>

$("#my-dropzone").dropzone({
    url: "upload-image",
    addRemoveLinks: true,
    acceptedFiles:"image/*",
    // clickable:true,
    resizeQuality: 0.5,
});

</script>
@endsection

