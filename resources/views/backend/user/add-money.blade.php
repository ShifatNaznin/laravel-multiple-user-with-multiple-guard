@extends('backend.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6 col-xl-6">
            @include('flash::message')

            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Add Money</h6>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('user.storeMoney') }}" method="post" id="personal-info-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-600">Amount</label>
                                <input type="text" class="form-control" name="amount" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" placeholder="Enter Amount"
                                    value="{{ old('amount') }}">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-600">Details</label>
                                <textarea class="form-control" name="details" id="" cols="10" rows="5"></textarea>
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
    @push('js')
    @endpush
@endsection
