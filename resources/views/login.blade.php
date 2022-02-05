@extends('layout.login')

@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Form</h1>
            </div>
            @include('component.flash')
            <form class="user" method="POST" action='{{ route('app_login') }}'>
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        value="{{ old("email") }}"
                        placeholder="Enter Email Address..." autofocus required />
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required />
                </div>
                <button type='submit' class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
