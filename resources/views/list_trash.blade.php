@extends('master')
@section('content')
    @if ($mas = Session::get('restore_deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $mas }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($mas = Session::get('parmanent-delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $mas }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="text-center text-capitalize p-3 border-bottom border-2 border-success text-success">product data will
        show here</h1>

    <div class="d-flex gap-3">
        <a href="{{ url('list') }}" class="btn btn-dark">User List</a>
        <a href="" class="btn restore-all btn-success">Restore all</a>
        <a href="" class="btn delete-all btn-danger">delete all</a>
    </div>


    <div class="table-data">

        {{-- @include('product_paginate') --}}

        <table class="table table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" class="bg-danger select-all"></th>
                    <th scope="col">id</th>
                    <td scope='col'>picture</td>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col" colspan="2">action</th>
                </tr>
            </thead>

            <tbody>
                @if (!$users->isEmpty())
                @foreach ($users as $user)

                        <tr>
                            <td><input type="checkbox" id="{{ $user->id }}" class="select-item"></td>
                            <th scope="row">{{ $user->id }}</th>
                            <td><img src="{{ asset(url('storage/uploads/images/thumb',$user->picture)) }}" alt="picture"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td><a href="{{ url('restore-product', $user->id) }}" class="btn btn-success">restore</a></td>
                            <td><a href="" class="btn btn-danger">parmanent delete</a></td>
                        </tr>
                @endforeach
                @else
                <td colspan="12">there is no records</td>
                @endif



            </tbody>

        </table>

        <div class="mx-auto w-100">{{ $users->links() }}</div>


    </div>
    @endsection

    @section('script')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select-all').click(function() {
            $('.select-item').prop('checked', $(this).prop('checked'));
        })

        // restore data
        $('.restore-all').click(function(e) {
            e.preventDefault();
            // console.log('iftekher mahmud')
            allDataGet('restore-all','restore_deleted_all','success')
        })

        $('.delete-all').click(function(e){
            e.preventDefault()
            // console.log('iftekher mahmud')
            if(confirm('are you sure you want to delete') === true) {
              allDataGet('parmanent-delete','parmanent-delete-all','danger')
            }
            else {
                alert('delete cancelled')
            }

        })

        // select all data and request
        function allDataGet(url,notify,color) {
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
                    <div class="alert alert-${color} alert-dismissible fade show" role="alert">
                        <strong>${res[notify]}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `)

                    $('.select-item:checked').each(function() {
                        $(this).parent().parent('tr').slideUp(300)
                    })

                    setTimeout(() => {
                        window.location.reload()
                    }, 1500);

                }
            });
        }
        // select all data and request
    </script>
    @endsection
