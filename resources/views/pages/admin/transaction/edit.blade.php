@extends('layouts.admin')

@section('title')
    Store Settings
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaction</h2>
                <p class="dashboard-subtitle">
                    Edit "{{ $item->user->name }}" Transaction Status
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('transaction.update', $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Total Amount Price</label>
                                                <input type="text" class="form-control" name="total_price"
                                                    value="IDR {{ $item->total_price }}" required disabled />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Order</label>
                                                <input type="text" class="form-control" name="total_price"
                                                    value="{{ $item->products_name }}" required disabled />
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping To</label>
                                                <input type="text" class="form-control" name="total_price"
                                                    value="{{ $item->user->address_one . ' / ' . $item->user->address_two . ' / ' . $item->user->kota . ' / ' . $item->user->provinsi . ' / ' . $item->user->zip_code }}"
                                                    required disabled />
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Transaction Status</label>
                                                <select id="pengiriman" onchange="AccFunc();" name="transaction_status"
                                                    class="form-control">
                                                    <option value="{{ $item->transaction_status }}">
                                                        {{ $item->transaction_status }}</option>
                                                    <option value="" disabled>----------------</option>
                                                    <option value="PENDING">PENDING</option>
                                                    <option value="SHIPPING">ACCEPT & RESI</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-12">
                                            <div class="form-group" id="resi" name="resi" style="display: none;">
                                                <label>Input Resi Number</label>
                                                <input type="text" id="resi" name="resi" class="form-control"
                                                    placeholder="ex : JNE-REG009 digit" value="{{ $item->resi }}"
                                                    required />
                                                <small class="text-danger pt-3">*Pergantian Nomor
                                                    Resi Hanya Dapat Dilakukan Apabila Keadaan Darurat</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" id="manual_status" style="display: none;">
                                                <label>Manual Tracking</label>
                                                <input type="text" class="form-control" name="manual_status"
                                                    id="manual_status"
                                                    placeholder="IMMEDIATELY! Type ` ON THE WAY ` After Input Resi & Shipping the product "
                                                    value="{{ $item->manual_status }}" required />
                                                <small class="text-primary pt-3">*Ubah jadi SUCCESS, Jika User Tidak
                                                    Konfirmasi Ke Admin
                                                    Lebih
                                                    dari
                                                    2x24 Jam</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col text-right">
                                            <button type="submit" id="shipping" style="display: none;"
                                                class="btn btn-success px-5 float-right">
                                                Update Now
                                            </button>
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

    <script>
        function AccFunc() {
            if (document.getElementById("pengiriman").value == "SHIPPING") {
                document.getElementById("resi").style.display = "block";
                document.getElementById("shipping").style.display = "block";
                document.getElementById("manual_status").style.display = "block";
            } else {
                document.getElementById("resi").style.display = "none";
                document.getElementById("shipping").style.display = "none";
            }
        }
    </script>

@endpush
