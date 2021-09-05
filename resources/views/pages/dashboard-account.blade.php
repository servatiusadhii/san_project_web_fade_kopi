@extends('layouts.dashboard')

@section('title')
    Dashboard Account Settings
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                    Update your current profile
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form id="locations"
                            action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"><img
                                                        src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-id-512.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Your
                                                    Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Your Name" value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"><img
                                                        src="https://cdn4.iconfinder.com/data/icons/social-media-and-logos-11/32/Logo_Gmail_envelope_letter_email-256.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Your
                                                    Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="YourEmail@gmail.com" value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_one"><img
                                                        src="https://cdn1.iconfinder.com/data/icons/bokbokstars-121-classic-stock-icons-1/128/Home-icon.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address</label>
                                                <input type="text" class="form-control" id="address_one" name="address_one"
                                                    placeholder="Write down your Address"
                                                    value="{{ $user->address_one }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_two"><img
                                                        src="https://cdn2.iconfinder.com/data/icons/landmark-12/64/Torii-gate-building-landmark-256.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Address
                                                    Details</label>
                                                <input type="text" class="form-control" id="address_two" name="address_two"
                                                    placeholder="Complete with your Address Details"
                                                    value="{{ $user->address_two }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fix-prov"><img
                                                        src="https://cdn2.iconfinder.com/data/icons/landmark-12/64/Khabarovsk-city-building-landmark-256.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />City</label>

                                                <select id="provinsi" name="provinsi" class="form-control">
                                                    <option value="{{ $user->provinsi }}">
                                                        {{ $user->provinsi }}</option>
                                                    <option value="" disabled>----------------</option>
                                                    <option value="Jakarta Timur">Jakarta Timur</option>
                                                    <option value="Bekasi">Bekasi</option>
                                                </select>
                                                <small class="text-danger">*Maaf ya Sobat, Jangkauan Kami Masih Wilayah
                                                    Terdekat </small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fix-city"><img
                                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Coat_of_arms_of_Jakarta.svg/680px-Coat_of_arms_of_Jakarta.svg.png"
                                                        alt="icon-address2"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />District</label>
                                                <input type="text" class="form-control" id="kota"
                                                    placeholder="Kelurahan / Kecamatanmu" name="kota"
                                                    value="{{ $user->kota }}" />
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
                                                    placeholder="Kodeposmu" value="{{ $user->zip_code }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country"><img
                                                        src="https://cdn1.iconfinder.com/data/icons/DarkGlass_Reworked/128x128/actions/flag.png"
                                                        alt="icon-address2"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    placeholder="Negaramu" value="{{ $user->country }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_number"><img
                                                        src="https://cdn4.iconfinder.com/data/icons/desktop-app-free/32/Desktop_Desktop_App_Telephone_Phone_Comunication-15-256.png"
                                                        alt="icon-address"
                                                        style="width: 20px; height: 20px; margin-right: 3px; margin-bottom: 5px;" />Phone
                                                    Number</label>
                                                <input type="text" class="form-control" id="phone_number"
                                                    placeholder="Nomor Handphone" name="phone_number"
                                                    value="{{ $user->phone_number }}" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    </script>
@endpush
