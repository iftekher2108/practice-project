@extends('master')
@section('content')
    <div class="col-6">
        <form action="{{ url('upload-image') }}" method="post" id="my-dropzone" class="card dropzone"
            enctype="multipart/form-data">
            @csrf
        </form>
    </div>


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
            acceptedFiles: "image/*",
            // clickable:true,
            resizeQuality: 0.5,
            dictDefaultMessage: `Drag and Drop Image upload`,
        });
        // axios.get('/upload-image')
        //     .then(res => {

        //         console.table(res);

        //     })
        //     .catch(error => {
        //         console.log(error);
        //     })
    </script>
@endsection
