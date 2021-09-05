@extends('layouts.admin')

@section('title')
    Fade Kopi Admin - Product Create Page
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">
                    Create New Product
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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Product</label>
                                                <input type="text" class="form-control" name="name" required
                                                    placeholder="Tulis nama produkmu" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pemilik Product</label>
                                                <select name="users_id" class="form-control" disabled>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kategori Product</label>
                                                <select name="categories_id" class="form-control">
                                                    @foreach ($categories as $categories)
                                                        <option value="{{ $categories->id }}">{{ $categories->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Recommended By</label>
                                                <select id="recomend_by" name="recomend_by" class="form-control">
                                                    <option value="{{ $item->recomend_by }}">
                                                        Not Recommend Product</option>
                                                    <option value="" disabled>----------------</option>
                                                    <option value="Worthy Price">Worthy Price</option>
                                                    <option value="Delicious Taste">Delicious Taste</option>
                                                    <option value="Attractive Packaging">Attractive Packaging</option>
                                                </select>
                                                <small class="text-danger">*Lewati Saja, Jika Kategori Produk ini <b>
                                                        Tidak
                                                        Termasuk
                                                        Recommend Product !</b> </small>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirmation Category</label>
                                                <input type="text" class="form-control" name="category_name" required
                                                    placeholder="Tulis ulang category produkmu" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" name="price" required
                                                    placeholder="Tentukan harganya" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="description" id="editor"></textarea>
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
@endpush
