@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction Detail
@endsection

@section('content')
    <!-- Section Content -->

    <body onload="getStatus();">
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
                    <p class="dashboard-subtitle">
                        Transactions Details
                    </p>
                </div>
                <div class="dashboard-content" id="transactionDetails">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                                class="w-100 mb-3" alt="" />
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-id-512.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Customer
                                                        Name</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->transaction->user->name }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn3.iconfinder.com/data/icons/free-mix/128/business_office_seo_finance_work_coffee_pause_management-09-2-512.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Product
                                                        Name</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->product->name }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn4.iconfinder.com/data/icons/free-color-christmas-icons/24/Christmas_Date-256.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />
                                                        Date of Transaction
                                                    </div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->created_at }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn2.iconfinder.com/data/icons/free-simple-line-mix/48/16-Credit_Card-256.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Payment
                                                        Status</div>
                                                    <input type="text" id="statusBayar"
                                                        style="border: transparent; font-weight: bold;"
                                                        value="{{ $transaction->transaction->transaction_status }}">
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn2.iconfinder.com/data/icons/new-year-resolutions/64/resolutions-16-256.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />
                                                        Total Amount
                                                    </div>
                                                    <div class="product-subtitle">
                                                        IDR {{ number_format($transaction->transaction->total_price) }}
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn0.iconfinder.com/data/icons/shopping-and-ecommerce-15/512/sale_lineal_color_cnvrt-10-256.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />
                                                        Voucher Status
                                                    </div>
                                                    <input type="text" id="voucher_shell"
                                                            style="border: transparent; font-weight: bold; background: transparent;"
                                                            disabled
                                                            value="{{ $transaction->transaction->voucher_id}}">
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="product-title"><img
                                                            src="https://cdn4.iconfinder.com/data/icons/desktop-app-free/32/Desktop_Desktop_App_Telephone_Phone_Comunication-15-256.png"
                                                            alt="icon-address"
                                                            style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />
                                                        Phone Number
                                                    </div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->transaction->user->phone_number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('dashboard-transaction-update', $transaction->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <h5>Shipping Information</h5>
                                            </div>
                                            <div class="col-12">

                                                <div class="row">

                                                    <div class="col-12 col-md-6">

                                                        <div class="product-title"><img
                                                                src="https://cdn1.iconfinder.com/data/icons/bokbokstars-121-classic-stock-icons-1/128/Home-icon.png"
                                                                alt="icon-address"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address
                                                        </div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->address_one }}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn2.iconfinder.com/data/icons/landmark-12/64/Torii-gate-building-landmark-256.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address
                                                            Details</div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->address_two }}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/256/Region_and_Language.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Province
                                                        </div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->provinsi }}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn2.iconfinder.com/data/icons/winter-town-flaticon/64/CITY-building-construction-cities-buildings-128.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />City
                                                        </div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->kota }}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn4.iconfinder.com/data/icons/navigation-98/512/18_direction_street_road._sign._navigate-256.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Postal
                                                            Code</div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->zip_code }}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn1.iconfinder.com/data/icons/DarkGlass_Reworked/128x128/actions/flag.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Country
                                                        </div>
                                                        <div class="product-subtitle">
                                                            {{ $transaction->transaction->user->country }}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-title"><img
                                                                src="https://cdn0.iconfinder.com/data/icons/e-commerce-328/2048/tag_sale_coupon_price_tag-256.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Airways
                                                            Bill or Resi Number</div>
                                                        <input type="text" id="NoResi"
                                                            style="border: transparent; font-weight: bold; color: red; display: none; background: transparent;"
                                                            disabled value="{{ $transaction->transaction->resi }}">
                                                    </div>
                                                    <div class="col-12 col-md-3 mt-3">
                                                        <div class="product-title"><img
                                                                src="https://cdn0.iconfinder.com/data/icons/shopping-and-ecommerce-15/512/sale_lineal_color_cnvrt-06-256.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Shipping
                                                            Status</div>
                                                        <input type="text" id="status"
                                                            style="border: transparent; font-weight: bold; background: transparent;"
                                                            disabled
                                                            value="{{ $transaction->transaction->transaction_status }}">
                                                    </div>
                                                    <div class="col-12 col-md-3 mt-3">
                                                        <div class="product-title"><img
                                                                src="https://cdn0.iconfinder.com/data/icons/work-from-home-19/512/FoodDelivery-food-delivery-meal-order-256.png"
                                                                alt="icon-address2"
                                                                style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Tracking
                                                            Status</div>
                                                        <input type="text" id="TracStatus" disabled
                                                            style="border: transparent; font-weight: bold; background: transparent; align:justify;"
                                                            value="{{ $transaction->transaction->manual_status }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 text-right">
                                                <p>
                                                    <img src="/images/wa.svg" alt="" class=""
                                                        style="width: 25px; height: 25px; margin-bottom: 3px;" />
                                                    <a target="blank" style=""
                                                        href="https://api.whatsapp.com/send?phone=6285811379583&text=Hallo%20Admin%20Majelis%20Cafe.%20Saya%20mau%20Konfirmasi%20Pemesanan%20Saya%20Sudah%20Saya%20Terima.%20Berikut%20Saya%20Upload%20Foto%20Untuk%20Produk: ">Confirm
                                                        Us if your package has arrived</a>
                                                </p>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var transactionDetails = new Vue({
            el: "#transactionDetails",
            data: {
                status: "{{ $transaction->shipping_status }}",
                resi: "{{ $transaction->resi }}",
            },
        });
    </script>

    <script>
        function getStatus() {
            var inpx = document.getElementById("status").value;
            if (inpx == 'SHIPPING') {
                document.getElementById("status").style.color = "Green";
                document.getElementById("NoResi").style.display = "block";
            } else if (inpx == 'PENDING') {
                document.getElementById("status").style.color = "Red";
                document.getElementById("NoResi").style.display = "block";
                document.getElementById("NoResi").value = "-Unprocessed Shipment-";
            } else {
                document.getElementById("NoResi").style.display = "none";
            }

            var inpt = document.getElementById("statusBayar").value;
            if (inpt == 'SHIPPING') {
                document.getElementById("statusBayar").style.color = "Green";
                document.getElementById("statusBayar").value = "Successful Payment";
            } else if (inpt == 'PENDING') {
                document.getElementById("statusBayar").style.color = "Red";
                document.getElementById("statusBayar").value = "Pending Payment";
            } else {
                document.getElementById("statusBayar").value = "Successful Payment";
            }

            var inp = document.getElementById("TracStatus").value;
            if (inp == 'SUCCESS') {
                document.getElementById("TracStatus").style.color = "Lime";
                document.getElementById("TracStatus").value = "SUCCESS - Package Delivered";
            } else if (inp == 'ON THE WAY') {
                document.getElementById("TracStatus").style.color = "Orange";
                document.getElementById("TracStatus").value = "On Process - Package OTW";

            } else {
                document.getElementById("TracStatus").style.color = "Red";
                document.getElementById("TracStatus").value = "Waiting Payment";
            }

            var vouc = document.getElementById("voucher_shell").value;
            if(vouc == 'NULL'){
                document.getElementById("voucher_shell").style.color = "Red";
                document.getElementById("voucher_shell").value = "Not Using Voucher"; 
            }
            else{
                document.getElementById("voucher_shell").style.color = "Blue";
                document.getElementById("voucher_shell").value = "Yes. Using Voucher"; 
            }
        }
    </script>
@endpush
