@extends('layouts.admin')

@section('title')
    Fade Kopi - Dashboard
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                    Fade Kopi Cafe Administrator Panel
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
                                            Customer Analytics</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">{{ $customer }} Loyalty
                                            Customers
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn0.iconfinder.com/data/icons/business-381/500/business-work_12-512.png"
                                            alt="" width="60px;" height="60px;" />
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
                                            Total Revenue</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">IDR {{ $revenue }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn4.iconfinder.com/data/icons/is_beta_accounting/png/256/money.png"
                                            alt="" width="60px;" height="60px;" />
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
                                            Total Transactions</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary">{{ $transaction }} x times
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://cdn4.iconfinder.com/data/icons/business-1219/24/Transaction-256.png"
                                            alt="" width="60px;" height="60px;" />
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
                                            Today Assignment</div>
                                        <div class="h5 mb-0 font-weight-bold text-secondary"><?= date('d-M-Y') ?>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-auto">
                                                                                                                                                                                    <img src="https://cdn3.iconfinder.com/data/icons/cmyk-product-development/128/cmyk-04-512.png"
                                                                                                                                                                                        alt="" width="60px;" height="60px;" />
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>

                                                                                                                                                                

                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row mt-3">
                                                                                                                                            <div class="col-12 mt-2">
                                                                                                                                                <div class="content container-fluid">
                                                                                                                                                    <div class="row justify-content-sm-center text-center py-10">
                                                                                                                                                      <div class="col-sm-7 col-md-8">
                                                                                                                                                        <img class="img-fluid mb-5" src="https://htmlstream.com/front-dashboard/assets/svg/illustrations/graphs.svg" alt="Image Description" style="max-width: 21rem;">
                                                                                                                                                        <h1>Hello Admin <b class="text-danger">{{ Auth::user()->name }}</b>, Nice to see you here!</h1>
                                                                                                                                                        <p>This time You are now manage your cafe product than ever before. Lets Surfing and <u>Watch Your Every Step!</u></p>
                                                                                                                                                        <a class="btn btn-success mt-2" href="{{ route('product.index') }}">Go to Product Management Now</a>
                                                                                                                                                      </div>
                                                                                                                                                    </div>
                                                                                                                                                    <!-- End Row -->
                                                                                                                                                  </div>
                                                                                                                                        </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    


@endsection
