@extends('admin.admin')
@section('content')
    @include('flash::message')
    <div class="content-header row align-items-center m-0">
        <div class="col-sm-8 header-title p-0">
            <div class="media">

                <div class="media-body">
                    <h1 class="font-weight-bold">List of User</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 text-right p-0">
            {{-- <a href="{{ route('createAsset') }}" class="btn btn-success mb-2 mr-1">
            <i class="typcn typcn-plus mr-2"></i>Add Asset</a> --}}
        </div>
    </div>

    <div class="body-content">

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0">User</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover multi-tables dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Points</th>
                                <th>Code</th>
                                <th>Url</th>
                                <th>Registration Code</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Share</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->user_role->roleName ?? '' }}</td>
                                    <td>{{ $item->point }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td><a href="{{ URL::to('/').$item->url }}" target="_blank">{{ URL::to('/').$item->url }}</a></td>
                                    <td>{{ $item->registrationCode }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <label class="switch" for="{{ $item->id }}">
                                            <input type="checkbox" class="makePendingBtnClass" id="{{ $item->id }}"
                                                {{ $item->status == 'Active' ? 'checked' : '' }}
                                                data-id="{{ $item->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="btn btn-success-soft btn-sm mr-1"
                                        href="{{ URL::to('/').$item->url }}" target="_blank">Share link</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success-soft btn-sm mr-1"
                                            href="{{ route('editUser', $item->id) }}" title="Edit"><i
                                                class="far fa-edit"></i></a>
                                        <a href="{{ route('deleteUser', $item->id) }}"
                                            class="btn btn-danger-soft btn-sm deleteItem" title="Delete"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                    
                                </tr>
                                @php
                                    $index++;
                                @endphp
                                
                            @endforeach

                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.deleteItem', function(event) {
                    const url = $(this).attr('href');
                    event.preventDefault();
                    swal({
                            title: `Are you sure you want to delete this Item?`,
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = url;
                            }
                        });
                });
            });
        </script>
        <script>
            $(function() {
                $('.makePendingBtnClass').click(function(e) {
                    // alert('ok');
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "{{ route('changeUserStatus') }}",
                        type: "GET",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            location.reload();
                        }
                    })
                });
            });
        </script>
    @endpush
@endsection
