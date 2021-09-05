@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Product Name</td>
                                    <td>Price</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0 @endphp
                                @php $productsName = "" @endphp

                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 20%;">
                                            @if ($cart->product->galleries)
                                                <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                    alt="" class="cart-image" />
                                            @endif
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">{{ $cart->product->name }}</div>
                                            <div class="product-subtitle">By <span
                                                    style="text-transform: capitalize;">{{ $cart->product->user->name }}</span>
                                                Store
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">IDR {{ number_format($cart->product->price) }}
                                            </div>
                                            <div class="product-subtitle">Indonesia Rupiah</div>
                                        </td>
                                        <td style="width: 20%;">
                                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-remove-cart" type="submit">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $totalPrice += $cart->product->price @endphp
                                    @php $productsName = $cart->product->name @endphp

                                @endforeach
                                @php $totalPrice = $totalPrice+10000 @endphp

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Details</h2>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="total_price" name="total_price" value="{{ $totalPrice }}">
                    <input type="hidden" name="products_name" value="{{ $productsName }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one"><img
                                        src="https://cdn1.iconfinder.com/data/icons/bokbokstars-121-classic-stock-icons-1/128/Home-icon.png"
                                        alt="icon-address"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address</label>
                                <input type="text" class="form-control" id="address_one" name="address_one" readonly
                                    value="{{ Auth::user()->address_one }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two"><img
                                        src="https://cdn2.iconfinder.com/data/icons/landmark-12/64/Torii-gate-building-landmark-256.png"
                                        alt="icon-address"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address
                                    Details</label>
                                <input type="text" class="form-control" id="address_two" name="address_two" readonly
                                    value="{{ Auth::user()->address_two }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinces_id"><img
                                        src="https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/256/Region_and_Language.png"
                                        alt="icon-address2"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Province</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                    value="{{ Auth::user()->provinsi }}" readonly />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regencies_id"><img
                                        src="https://cdn2.iconfinder.com/data/icons/winter-town-flaticon/64/CITY-building-construction-cities-buildings-128.png"
                                        alt="icon-address2"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />City</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                    value="{{ Auth::user()->kota }}" readonly />

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip_code"><img
                                        src="https://cdn4.iconfinder.com/data/icons/navigation-98/512/18_direction_street_road._sign._navigate-256.png"
                                        alt="icon-address2"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Postal
                                    Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                    value="{{ Auth::user()->zip_code }}" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country"><img
                                        src="https://cdn1.iconfinder.com/data/icons/DarkGlass_Reworked/128x128/actions/flag.png"
                                        alt="icon-address2"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Country</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    value="{{ Auth::user()->country }}" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number"><img
                                        src="https://cdn4.iconfinder.com/data/icons/desktop-app-free/32/Desktop_Desktop_App_Telephone_Phone_Comunication-15-256.png"
                                        alt="icon-address"
                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Phone
                                    Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" readonly
                                    value="{{ Auth::user()->phone_number }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Additional Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title text-primary">Majelis Cafe</div>
                            <div class="product-subtitle">Shipper</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-danger">{{ Auth::user()->name }}</div>
                            <div class="product-subtitle">Consignee</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title text-info">IDR 10,000</div>
                            <div class="product-subtitle">All Product Include Shipping Price</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div id="total_product_price" class="product-title text-success">IDR {{ $totalPrice }}</div>
                            
                            <div class="product-subtitle">Grand Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <div class="form-group">
                                <label for="">
                                    &nbsp;
                                </label>
                                    @php 
                                    $token= Auth::user()->id ?? 0;
                                    $voucher = \App\Voucher::where('user_id', $token)->get();
                                    @endphp
                                    <select class="form-control mt-n2" id="voucher" name="voucher">
                                        <option value="" disabled selected>Pilih Voucher</option>
                                        
                                    @foreach($voucher as $vc)  
                                        <option value="{{$vc->voucher}}"> {{$vc->voucher}} -> Exp: {{$vc->exp}}</option>
                                        
                                        @endforeach
                                    </select>
                                    
                            </div>
                        </div>
                        <div class="col-8 col-md-3 float-right">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                Checkout Now
                            </button>
                        </div>
                    </div>
                    <br>

                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <h2 class="mt-1">Transaction Payment Method </h2>
                        </div>
                    </div>
                    <div class="row pt-1" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-md-4 pt-3">
                            <div class="product-title text-danger"><img
                                    src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BCA-512.png"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032 900 977
                                1</div>
                            <div class="product-subtitle">Bank BCA
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="product-title text-danger"><img
                                    src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />010 642 703
                                8</div>
                            <div class="product-subtitle">Bank BNI
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="product-title text-danger"><img
                                    src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/Mandiri-512.png"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />111 00
                                0459047 4</div>
                            <div class="product-subtitle">Bank Mandiri
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="product-title text-danger"><img
                                    src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032 900 977
                                1</div>
                            <div class="product-subtitle">PayPal
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="product-title text-danger"><img
                                    src="https://rec-data.kalibrr.com/logos/Z76AQN3EMBCGU75JCX7KTYE5T9PMMWDHP39GFGAU-5b9b2eab.jpg"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032 900 977
                                1</div>
                            <div class="product-subtitle">OVO
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="product-title text-danger"><img
                                    src="https://key-science.com/wp-content/uploads/2020/04/Aplikasi-Dana-5-2.png"
                                    alt="icon-address2"
                                    style="width: 50px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032 900 977
                                1</div>
                            <div class="product-subtitle">DANA
                                Transfer</div>
                            <small>Atas Nama :<b> Fade Kopi</b></small>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                },
            }
        });
        $(document).ready(function(){
           let potong = $('#voucher').change(function(){
               if(potong.done) return;
                    total =  $('#total_price').val(),
                    hasildiskon = total - 5000,
                    total_price = $('#total_price').val(hasildiskon);
                    let total_price2 = $('#total_product_price').html("IDR " + hasildiskon);
                    alert("Menggunakan diskon");
                    potong.done = true;
                })
            })
    </script>
@endpush
