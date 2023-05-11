@extends('frontend.layout.master')

@section('title', '| Forgot Password')

@section('main')

<!-- Contact Section -->
<section class="section-gap section-border section-border--top">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-8 mx-auto">
                <div class="section-header text-center">
                    <div class="icon-box d-inline-block mb-4">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @if(session('error')) 
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h1 class="section-header__title section-header__title--lg text-capitalize">Update password</h1>
                    <p>Fill in the email associated with your account, we send you a 5-digit code to update your password</p>
                </div>
                <form action="{{ route('send.code') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <button type="submit" class="primary-btn primary-btn--has-icon primary-btn--dark btn-block">
                        Send Code
                        <i class="bi bi-arrow-right primary-btn__icon"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-js')
    <script>
        $(document).ready(function(){
        })
    </script>
@endpush
