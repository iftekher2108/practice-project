@extends('master')
@section('content')
    <div class="col-6 d-flex">
        <form action="#" method="post" id="my-dropzone" class="card d-flex dropzone" enctype="multipart/form-data">
            @csrf
            <input type="file" class="file" name="file[]" multiple>
        </form>
    </div>


    <div class="dropjone-list my-5">
        <div class="d-flex gap-3">
            @foreach ($medias as $media )
            @foreach ($media->picture as $picture )
                    {{ $Picture }}
                     {{-- <img src="{{ asset('storage/uploads/images',) }}" class="img-fluid" alt="picture"> --}}
            @endforeach
                    {{ $media->picture}}
                     {{-- <img src="{{ asset('storage/uploads/images',) }}" class="img-fluid" alt="picture"> --}}
            @endforeach

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.file').change(function() {
            // $('form').submit();
            var form = new FormData($('form')[0]);

            $.ajax({
                type: "post",
                url: "upload-image",
                data: form,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log(res.picture.picture);
                   var fes_data = JSON.parse(res.picture.picture)
                    $.each(fes_data, function (key, value) {
                            picture =`<img src="{{ asset('public/uploads/images/`+value+`')}}" class="img-fluid" width="100" alt="picture">`
                            $('.dropjone-list div').append(picture)
                            console.log(value)
                    });


                }
            });


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
