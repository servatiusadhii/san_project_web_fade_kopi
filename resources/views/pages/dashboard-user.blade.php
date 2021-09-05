@extends('layouts.dashboard')

@section('title')
    User Dashboard
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                    Congratulations. You've been spent your money for :
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                            Number ID</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">{{ Auth::user()->id }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-group-512.png"
                                            alt="" width="50px;" height="50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-2">
                                            Role Level Club</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">CUSTOMER
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn1.iconfinder.com/data/icons/award-flat-3/64/Favourite-256.png"
                                            alt="" width="50px;" height="50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-2">
                                            User Created At </div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">
                                            {{ Auth::user()->created_at }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn2.iconfinder.com/data/icons/new-year-resolutions/64/resolutions-04-256.png"
                                            alt="" width="50px;" height="50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-2">
                                            Last Update</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->updated_at }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn4.iconfinder.com/data/icons/refresh_cl/256/System/RefreshCL.png"
                                            alt="" width="50px;" height="50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 mt-2">
                            <h5 class="mb-3">Recent Transactions</h5>
                            @foreach ($buyTransactions as $transaction)
                                <a href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                                    class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                                    class="w-75" />
                                            </div>
                                            <div class="col-md-4">
                                                {{ $transaction->product->name ?? '' }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $transaction->transaction->user->name ?? '' }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $transaction->created_at ?? '' }}
                                            </div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/images/dashboard-arrow-right.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
