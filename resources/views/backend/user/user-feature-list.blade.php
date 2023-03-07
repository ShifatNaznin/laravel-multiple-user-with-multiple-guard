@extends('backend.admin')
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
                                <th>Role Name</th>
                                <th>Assigned Features</th>
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
                                    <td>{{ $item->roleName }}</td>
                                    @php
                                        $routeAccessData = explode(',', $item->userFeature ?? '');
                                    @endphp
                                    <td>
                                        @foreach ($feature as $featureItem)
                                            @if (in_array($featureItem->id, $routeAccessData))
                                                <span
                                                    class="route-access-name-design">{{ $featureItem->featureName }}</span>
                                            @endif
                                        @endforeach
                                    <td>
                                        <a class="btn btn-success-soft btn-sm mr-1"
                                            href="{{ route('addUserFeature', $item->id) }}" title="Edit">Add/Edit
                                            Features</a>
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
