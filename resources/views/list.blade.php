@extends('master')
@section('content')

    @if ($mas = Session::get('trash-delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $mas }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <h1 class="text-center text-capitalize p-3 border-bottom border-2 border-success text-success">product data will
        show here</h1>
    <div class="d-flex gap-3">
        <a href="{{ url('trash-list') }}" class="btn btn-dark">trushed</a>
        <a class="btn delete-all btn-danger">Delete all</a>
        <a href="{{url('create')}}" class="btn btn-success">Create</a>
    </div>

    <div class="table-data">

        @include('product_paginate')

        {{-- <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col" colspan="2">action</th>
              </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>edit</td>
                <td>delete</td>
              </tr>
                @endforeach


            </tbody>

          </table>

        <div class="mx-auto w-100">{{$users->links()}}</div> --}}


    </div>

    @endsection


    @section('script')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // select all data
        $(document).on('click', '.select-all', function() {
            $('.select-item').prop('checked', $(this).prop('checked'));
        })
        // select all data

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            // console.log(page);

            pagination(page)


        })

        $('.delete-all').click(function(e) {
            e.preventDefault();
            // console.log('hello world')
            allDataGet('soft-delete-all', 'soft-delete-data')

        })

        // select all data and request
        function allDataGet(url, notify) {
            var selectData = []

            $('.select-item:checked').each(function() {
                selectData.push($(this).attr('id'))
            })
            console.log(selectData)

            $.ajax({
                type: "post",
                url: url,
                data: {
                    id: selectData,
                },
                success: function(res) {
                    $('body').prepend(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>${res[notify]}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `)

                    $('.select-item:checked').each(function() {
                        $(this).parent().parent('tr').slideUp(300)
                    })

                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
                error:function(res) {
                    console.log(res);
                }
            });
        }
        // select all data and request

        function pagination(page) {

            $.ajax({
                // type: "method",
                url: "product-paginate?page=" + page,
                // data: "data",
                // dataType: "dataType",
                success: function(res) {
                    $(".table-data").html(res)
                }
            });
        }
    </script>
    @endsection
