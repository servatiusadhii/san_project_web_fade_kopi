@extends('layouts.success')

@section('title')
    Transactions Success
@endsection

@section('content')
    <div class="page-content page-success">
        <div class="section-success" data-aos="zoom-in">
            <div class="container">
                <div class="row align-items-center row-login justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>
                            Transaction Processed!
                        </h2>
                        <img src="/images/success_bag.svg" alt="" class="mb-4" width="250px" height="250px" />

                        <p>
                            Selamat, Transaksi kamu telah kami terima <br>
                            <span style="color: green;">Silahkan Selesaikan Pembayaranmu </span> dan <span
                                style="color: red;">Tunggu 2x24 Jam </span> Untuk Konfirmasi Lanjutan
                            dan
                            Pengiriman
                            Produk.
                            <br><br><b>Atau, Kamu Bisa Mempercepat Verifikasi <br>Pembayaranmu dengan</b><br><br>
                            Mengupload Bukti Pembayaranmu ke Whatsapp Admin Majelis-Cafe <b>Melalui
                                link
                                dibawah ini :</b> <br> <br>
                            <img src="/images/wa.svg" alt="" class=""
                                style="width: 25px; height: 25px; margin-bottom: 3px;" />
                            <a target="blank" style=""
                                href="https://api.whatsapp.com/send?phone=6285811379583&text=Hallo%20Admin%20Majelis%20Cafe.%20Saya%20mau%20upload%20Bukti%20Pembayaran%20Saya%20Untuk%20Produk: ">Whatsapp
                                Our Admin</a>
                        </p>

                        <div>
                            <a href="{{ route('dashboard-user') }}" class="btn btn-success w-50 mt-4">
                                My Dashboard
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">
                                Go To Shopping
                            </a>
                        </div>
                        <form>
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
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032
                                        900 977
                                        1</div>
                                    <div class="product-subtitle">Bank BCA
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <div class="product-title text-danger"><img
                                            src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                            alt="icon-address2"
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />010
                                        642 703
                                        8</div>
                                    <div class="product-subtitle">Bank BNI
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <div class="product-title text-danger"><img
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLOwnz7Qw36yU8rjAg45jCDEG-pE-7SZc5l582RQ7kihzYXQbyXU6WJA53L0PraFs8siU&usqp=CAU"
                                            alt="icon-address2"
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032
                                        900 977
                                        1</div>
                                    <div class="product-subtitle">Go Pay
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <div class="product-title text-danger"><img
                                            src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"
                                            alt="icon-address2"
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032
                                        900 977
                                        1</div>
                                    <div class="product-subtitle">PayPal
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <div class="product-title text-danger"><img
                                            src="https://i.pinimg.com/originals/9c/0a/ff/9c0affaaa53d71f6d20aa3a79a4d8d1f.png"
                                            alt="icon-address2"
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032
                                        900 977
                                        1</div>
                                    <div class="product-subtitle">OVO
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <div class="product-title text-danger"><img
                                            src="https://image.apktoy.com/img/78/id.dana/icon.png" alt="icon-address2"
                                            style="width: 30px; height: 35px; margin-right: 3px; margin-bottom: 5px;" />032
                                        900 977
                                        1</div>
                                    <div class="product-subtitle">DANA
                                        Transfer</div>
                                    <small>Pay To :<b> Fade Kopi</b></small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
