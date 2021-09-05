@extends('layouts.auth')

@section('title')
    Fade Kopi - Sign Up
@endsection

@section('content')

    <div class="page-content page-auth" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="/images/regis-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none" />
                    </div>
                    <div class="col-lg-5">
                        <h2>
                            <span style="font-weight: 900; color:red;">Daftar Sekarang</span> &
                        </h2>
                        <h2 class="text-center">
                            Nikmati Kopi <span style="font-weight: 800; color: green;"> dari Fade Kopi</span>
                        </h2>
                        <form class="mt-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input v-model="name" id="name" type="text" onkeyup="NoSpam();"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" placeholder="Your Name"
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input v-model="email" @change="checkForEmailAvailability()" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    :class="{ 'is-invalid': this.email_unavailable }" name="email"
                                    placeholder="youremail@gmail.com" value="{{ old('email') }}" required
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Your Password">
                            </div>

                            <div class="form-group" style="display: none;">
                                <label>Store</label>
                                <p class="text-muted">
                                    Apakah anda juga ingin membuka toko?
                                </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue"
                                        v-model="is_store_open" :value="true" />
                                    <label for="openStoreTrue" class="custom-control-label">
                                        Iya, boleh
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_store_open"
                                        id="openStoreFalse" v-model="is_store_open" :value="false" />
                                    <label for="openStoreFalse" class="custom-control-label">
                                        Enggak, makasih
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" v-if="is_store_open" style="display: none;">
                                <label>Nama Toko</label>
                                <input v-model="store_name" id="store_name" type="text"
                                    class="form-control @error('store_name') is-invalid @enderror" name="store_name"
                                    value="{{ old('store_name') }}" required autocomplete="store_name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" v-if="is_store_open" style="display: none;">
                                <label>Kategori</label>
                                <select name="category" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" id="btnSign" style="display: none;" class="btn btn-success btn-block mt-4"
                                :disabled="this.email_unavailable">
                                Sign Up Now
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                                Back to Sign In
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: "#register",
            mounted() {
                AOS.init();

            },
            methods: {
                checkForEmailAvailability: function() {
                    var self = this;
                    axios.get('{{ route('api-register-check') }}', {
                            params: {
                                email: this.email
                            }
                        })
                        .then(function(response) {
                            if (response.data == 'Available') {
                                self.$toasted.show(
                                    "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                        position: "top-center",
                                        className: "rounded bg-success",
                                        duration: 1000,
                                    }
                                );
                                self.email_unavailable = false;
                            } else {
                                self.$toasted.error(
                                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                        position: "top-center",
                                        className: "rounded bg-danger",
                                        duration: 1000,
                                    }
                                );
                                self.email_unavailable = true;
                            }
                            // handle success
                            console.log(response.data);

                        })
                }
            },
            data() {
                return {
                    name: "",
                    email: "",
                    is_store_open: false,
                    store_name: "",

                    email_unavailable: false
                }
            },
        });
    </script>

    <script>
        function NoSpam() {
            if (document.getElementById("name").value.length >= 4) {
                document.getElementById("btnSign").style.display = "block";
            } else {
                document.getElementById("btnSign").style.display = "none";
            }
        }
    </script>
@endpush
