@extends('admin.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-xl-10">
            @include('flash::message')

            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">User Feature</h6>
                            </div>
                            <div class="col-sm-4 text-right p-0">
                                <a href="{{ route('userFeatureList') }}" class="btn btn-success mb-2 mr-1">
                                    <i class="typcn typcn-arrow-back-outline mr-2"></i>Back</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('storeUserFeature') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="font-weight-600">Role Name</label>
                                <input type="text" name="roleName" class="form-control" placeholder="Enter User Role"
                                    required value="{{ $data->roleName }}" readonly>
                                @if ($errors->has('roleName'))
                                    <div class="invalid-feedback">
                                        {{ 'This field is required' }}
                                    </div>
                                @endif
                            </div>
                            @php
                                $routeAccessData = explode(',', $data->userFeature ?? '');
                            @endphp
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="font-weight-600">Select Feature</label>
                                <select class="form-control js-example-basic-multiple" placeholder="Select Text"
                                    name="userFeature[]" multiple="multiple" id="areaTextShow">
                                    @foreach ($feature as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, $routeAccessData) ? 'selected' : '' }}>
                                            {{ $item->featureName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success mr-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
