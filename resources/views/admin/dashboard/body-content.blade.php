@extends('admin.admin')
@section('content')
{{URL::to('/')}}
    {{-- @php
        $totalIncome = 0;
        $totalExpense = 0;
    @endphp
    @foreach ($data as $item)
        @if ($item->typeId == 1)
            @php
                $totalIncome = $totalIncome + $item->amount;
            @endphp
        @endif
        @if ($item->typeId == 2)
            @php
                $totalExpense = $totalExpense + $item->amount;
            @endphp
        @endif
    @endforeach
    @php
        $user = Auth::user();
    @endphp --}}
    {{-- @if ($user->status != 'Deactive') --}}
        {{-- <div class="body-content">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats statistic-box mb-4">
                        <div
                            class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                            <div class="card-icon d-flex align-items-center justify-content-center">
                                <i class="typcn typcn-th-large-outline"></i>
                            </div>
                            <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Data</p>
                            <h3 class="card-title fs-18 font-weight-bold">{{ $assetTotal }}
                            </h3>
                        </div>
                        <div class="card-footer p-3">
                            <div class="stats">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats statistic-box mb-4">
                        <div
                            class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                            <div class="card-icon d-flex align-items-center justify-content-center">
                                <i class="typcn typcn-plus"></i>
                            </div>
                            <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Income</p>
                            <h3 class="card-title fs-21 font-weight-bold">$ {{ $totalIncome }}</h3>
                        </div>
                        <div class="card-footer p-3">
                            <div class="stats">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats statistic-box mb-4">
                        <div
                            class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                            <div class="card-icon d-flex align-items-center justify-content-center">
                                <i class="typcn typcn-minus"></i>
                            </div>
                            <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Expense</p>
                            <h3 class="card-title fs-21 font-weight-bold">$ {{ $totalExpense }}</h3>
                        </div>
                        <div class="card-footer p-3">
                            <div class="stats">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- @endif --}}
@endsection
