@extends('master')
@section('content')
    <div class="col-6 d-flex">
        <form action="{{ url('upload-image') }}" method="post" id="my-dropzone" class="card d-flex dropzone"
            enctype="multipart/form-data">
            @csrf
            <input type="file" class="file" name="file[]" multiple >
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
        // $("#my-dropzone").dropzone({
        //     url: "upload-image",
        //     addRemoveLinks: true,
        //     acceptedFiles: "image/*",
        //     // clickable:true,
        //     resizeQuality: 0.5,
        //     dictDefaultMessage: `Drag and Drop Image upload`,
        // });
        $('.file').change(function(){
            $('form').submit();
        })
        // Dropzone.options.dropzone = {
        //     maxFilesize:20,
        //     renameFile:function(file) {
        //         var dt = new Date();
        //         var time dt.getTime();
        //         return time+file.name;
        //     }
        //     accepttedFiles:".jpeg,.jpg,.png,.gif,",
        //     addRemoveLinks:true,
        //     success:function(file,res) {
        //        console.log(res)
        //     },
        //     error:function(file,res) {
        //         return false;
        //     }
        // }
        // axios.get('/upload-image')
        //     .then(res => {

        //         console.table(res);

        //     })
        //     .catch(error => {
        //         console.log(error);
        //     })
    </script>
@endsection
