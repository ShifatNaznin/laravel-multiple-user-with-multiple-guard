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
                            <h6 class="fs-17 font-weight-600 mb-0">Edit Transactions</h6>
                        </div>
                        <div class="col-sm-4 text-right p-0">
                            <a href="{{ route('dataList') }}" class="btn btn-success mb-2 mr-1">
                                <i class="typcn typcn-arrow-back-outline mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('updateData') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-600">Date</label>
                            <input type="date" name="date" class="form-control" required value="{{$data->date}}"
                                required>
                            @if ($errors->has('date'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-600">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30"
                                rows="10">{{$data->description}}</textarea>
                            @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-600">Type</label>
                            <select class="form-control" name="typeId" required>
                                <option value="{{ $data->typeId }}">{{ $data->get_type->typeName }}</option>
                                @foreach ($type as $typeData)
                                <option value="{{ $typeData->id }}">{{ $typeData->typeName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('typeId'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-600">Asset</label>
                            <select class="form-control" name="assetId" required>
                                <option value="{{ $data->assetId }}">{{ $data->get_asset->assetName }}</option>
                                @foreach ($asset as $assetData)
                                <option value="{{ $assetData->id }}">{{ $assetData->assetName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('assetId'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-600">Amount</label>
                            <input type="text"
                                onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                name="amount" class="form-control" required value="{{$data->amount}}" required>
                            @if ($errors->has('amount'))
                            <div class="invalid-feedback">
                                {{ 'This field is required' }}
                            </div>
                            @endif
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