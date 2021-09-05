@extends('layouts.app')

@section('title')
    Fade Kopi - Details Products
@endsection

@section('content')
    <!-- Page Content -->


    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('categories') }}">
                                        {{ $product->category_name }}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Product Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery mb-3" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                                alt="" />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                                data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image"
                                        :class="{ active: index == activePhoto }" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="category float-right text-right text-primary" id="category_badge"> Category<br>
                                <img src="/images/starr.png" alt="" class="mb-1" style="height: 30px; width:30px;" />
                                <span style="text-transform: capitalize; color:orange;">{{ $product->category_name }}
                                    Product</span>
                            </div>
                            <h1>{{ $product->name }}</h1>
                            <div class="owner">By <span
                                    style="text-transform: capitalize;">{{ $product->user->name }}</span>
                                Store
                            </div>

                            <div class="price">IDR {{ number_format($product->price) }}</div>

                            <div class="category float-right text-right text-primary" id="recomend_badge"> Recommended
                                By<br>
                                {{-- <img src="/images/ribbon.png" alt="" class="rounded-circle"
                                    style="height: 30px; width:30px;" /> --}}
                                <span style="text-transform: capitalize; color:red;">
                                    {{ $product->recomend_by }}</span>
                            </div>
                            <div class="stars">
                                @php
                                    $route = '';
                                    $bintang = '';
                                    if (!Auth::user()) {
                                        $token = '';
                                    } else {
                                        $userid = Auth::user()->id;
                                        $token = $userid;
                                    }
                                    $avgStar = \App\Ratings::where('products_id', $product->id)->avg('rate');
                                    $rate = \App\Ratings::where('products_id', $product->id)
                                        ->where('usersId', $token)
                                        ->first();
                                    // dd($rate->id)
                                    if (!$rate) {
                                        $route = route('detail.store');
                                        $bintang = '';
                                    } else {
                                        $route = route('detail.update', $rate->id);
                                        $bintang = $rate->rate;
                                    }
                                @endphp

                                <form action="{{ $route }}" method="post">
                                    <h1 class="owner" style="text-transform: capitalize;">Yuk, Berikan Penilaian Anda
                                        <br>Tentang
                                        Produk Ini</h1>
                                    @csrf
                                    <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                                    <input class="star star-5" id="star-5" type="radio" name="rate" value="5"
                                        {{ $bintang == 5 ? 'checked' : '' }} />
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="rate" value="4"
                                        {{ $bintang == 4 ? 'checked' : '' }} />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="rate" value="3"
                                        {{ $bintang == 3 ? 'checked' : '' }} />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="rate" value="2"
                                        {{ $bintang == 2 ? 'checked' : '' }} />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="rate" value="1"
                                        {{ $bintang == 1 ? 'checked' : '' }} />
                                    <label class="star star-1" for="star-1"></label>


                                    <div class="price">Rating : {{ Str::replaceFirst('000', '', $avgStar) }}</div>
                                    <div>
                                        @php
                                            if (!Auth::user()) {
                                                $token = '';
                                            } else {
                                                $userid = Auth::user()->id;
                                                $token = $userid;
                                            }
                                            $keranjang = \App\Ratings::where('products_id', $product->id)->get();
                                            $total = 0;
                                        @endphp

                                        <i class="fa fa-user">
                                            {{ count($keranjang) }}
                                        </i>

                                    </div>
                                    @php
                                     $rate = \App\Ratings::where('products_id', $product->id)->first(); 
                                     @endphp
                                    @if(!$rate)
                                    <button type="submit" class="btn btn-danger owner mt-2" style="color: white;">
                                        Submit Your Rating
                                    </button>
                                    @else
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            @auth
                                <form action="{{ route('detail-add', $product->id, $product->name) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                                    Sign in to Add
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-4 mb-3 ">
                            <h5>Fade Kopi Store Details </h5>
                            <marquee direction="left">~ A Place to Exchange Between Kopi, Rokok dan Fana ~</marquee>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/maps.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Find Us On Maps</h5>
                                        Fade Kopi. Jl. Waru Doyong, RT.11/RW.8, Jatinegara, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13930<a target="blank" class="float-right"
                                            href="https://www.google.com/maps/dir/-6.3256872,106.9476776/majelis+cafe/@-6.3050136,106.9004479,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e69f3220145441b:0x75c1210f7b68172c!2m2!1d106.8969785!2d-6.289107">
                                            Navigate Now
                                        </a>
                                    </div>
                                </li>
                                <br>
                                <li class="media mb-2">
                                    <img src="/images/ig.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Find us Instagram</h5>
                                        Search us on Instagram : <b> @fadekopi_</b> <a class="float-right"
                                            target="blank" href="https://www.instagram.com/fadekopi_/">Follow
                                            Here</a>
                                    </div>
                                </li>
                                <br>

                                <li class="media mb-2">
                                    <img src="/images/gojek.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Verified with Go-Food </h5>
                                        Another Path to Search us at Gofood App : <b>Fade Kopi - GoFood</b> <a
                                            class="float-right" target="blank"
                                            href="https://gofood.co.id/bahasa/jakarta/restaurant/fade-kopi">Explore
                                            Here</a>
                                    </div>
                                </li>
                                <br>
                                <li class="media">
                                    <img src="https://cdn4.iconfinder.com/data/icons/social-media-flat-7/64/Social-media_Whatsapp-256.png"
                                        alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Fade Kopi Help Desk</h5>
                                        If you have <b>any questions</b>, please contact us via our <b>Whatsapp
                                            Admin.</b>
                                        <a class="float-right" target="blank"
                                            href="https://api.whatsapp.com/send?phone=6285811379583&text=Hallo%20Admin%20Fade%20Kopi.%20Saya%20Mau%20Tanya%20Mengenai%20: ">Contact
                                            Here</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection



@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($product->galleries as $gallery)
                        {
                        id: {{ $gallery->id }},
                        url: "{{ Storage::url($gallery->photos) }}",
                        },
                    @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>


@endpush
