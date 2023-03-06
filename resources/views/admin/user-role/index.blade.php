@extends('admin.admin')
@section('content')
@include('flash::message')
<div class="content-header row align-items-center m-0">
    <div class="col-sm-8 header-title p-0">
        <div class="media">

            <div class="media-body">
                <h1 class="font-weight-bold">List of User Role</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4 text-right p-0">
        <button type="button" class="btn btn-success mb-2 mr-1" data-toggle="modal" data-target="#addModal">
            <i class="typcn typcn-plus mr-2"></i>ADD User Role</button>
    </div>
</div>

<div class="body-content">

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0">User Role</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table display table-bordered table-striped table-hover multi-tables dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
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
                            <td>{{ $item->roleName ?? '' }}</td>
                            <td>
                                <button type="button" value="{{ $item->id }}"
                                    class="editbtn btn btn-success-soft btn-sm mr-1" data-toggle="modal"
                                    data-target="#editModal{{ $item->id }}" title="Edit"><i
                                        class="far fa-edit"></i></button>
                                <a href="{{ route('deleteUserRole', $item->id) }}"
                                    class="btn btn-danger-soft btn-sm deleteItem" title="Delete"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @php
                        $index++;
                        @endphp
                        <div class="modal fade bd-example-modal-lg show" id="editModal{{ $item->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel3" aria-modal="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-600" id="exampleModalLabel3">Update User Role
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('updateUserRole') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="font-weight-600">Role Name</label>
                                                    <input type="text" name="roleName" class="form-control" placeholder="Enter Role Name"
                                                        required value="{{ $item->roleName}}" required>
                                                    @if ($errors->has('roleName'))
                                                    <div class="invalid-feedback">
                                                        {{ 'This field is required' }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">UPDATE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>
{{-- create modal --}}
<div class="modal fade bd-example-modal-lg show" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel3" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('storeUserRole') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600" id="exampleModalLabel3">Add User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-600">Role Name</label>
                            <input type="text" name="roleName" class="form-control" placeholder="Enter Role Name"
                                required value="{{ old('roleName') }}" required>
                            @if ($errors->has('roleName'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">ADD</button>
                </div>
            </form>
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
    $(document).ready(function() {
        $(function() {
            $( "#my_date_picker" ).datepicker();
        });
    })
</script>
<script type="text/javascript">
    $(".datePickerCls").click(function() {
        var t = $(this).val();
        // alert(t);
        $('#date_picker' + t).datepicker();
    });
</script>
@endpush
@endsection