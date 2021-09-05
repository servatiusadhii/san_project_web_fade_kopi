@extends('layouts.auth')

@section('title')
    Fade Kopi - Sign In
@endsection

@section('content')
    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none" />
                    </div>
                    <div class="col-lg-5">
                        <h2>
                            <span style="font-weight: 900; color:green;">Login</span> untuk Memesan<br />
                        </h2>
                        <h2 class="text-center"><span style="font-weight: 800; color: chocolate;"> Fade Kopi
                            </span>
                        </h2>

                        <form method="POST" action="{{ route('login') }}" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input id="email" type="email"
                                    class="form-control w-75 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="emailkamu@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control w-75 @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                                Sign In to My Account
                            </button>

                            <a href="{{ route('register') }}" class="btn btn-signup btn-block w-75 mt-2">
                                Sign Up
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
