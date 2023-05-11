@extends('frontend.layout.master')

@section('header-active--home', 'active')

@push('plugins-css')
<link rel="stylesheet" href="{{ asset('frontend_assets/assets/plugins/slick-slider/css/slick.css') }}">
@endpush

@push('plugins-js')
<script src="{{ asset('frontend_assets/assets/plugins/slick-slider/js/slick.js') }}"></script>
@endpush

@section('main')
    @if(hideshow()->banner_status == 1)
        <!-- Banner Section -->
        <section id="banner-section" class="banner">
            <div class="banner__slider">
                @foreach($banners as $banner)
                <div class="banner__slide" style="background-image: url('{{ asset('uploads/banners') }}/{{ $banner->media }}');">
                    <div class="container">
                        <div class="row justify-content-xl-end">
                            <div class="col-xl-5">
                                <div class="banner__slide__content text-center text-xl-left">
                                    <h3 class="banner__slide__sub-title">{{ $banner->sub_heading }}</h3>
                                    <h1 class="banner__slide__title">{{ $banner->heading }}</h1>
                                    <p class="banner__slide__text">{{ $banner->tag_line }}</p>
                                    <a href="{{ $banner->btn_url }}" class="primary-btn primary-btn--has-icon">
                                        {{ $banner->btn_txt }}
                                        <i class="bi bi-arrow-right primary-btn__icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    @endif

    @if(hideshow()->banner_bottom_status == 1)
        @include('frontend.sections.feature', ['id' => 'feature-section'])
    @endif

    @if(hideshow()->pricing_status == 1)
        @include('frontend.sections.pricing', ['id' => 'pricing-section'])
    @endif

    @if(hideshow()->testimonial_status == 1)
        @include('frontend.sections.testimonial', ['id' => 'testimonial-section'])
    @endif

    @if(hideshow()->contact_status == 1)
        <!-- Contact Section -->
        <section id="contact-section" class="contact section-gap">
            <div class="container">
                <div class="row flex-lg-row-reverse">
                    <div class="col-xl-9 col-lg-8 mb-3">
                        <h1 class="section-header__title mb-2">Let’s Connect</h1>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_name" class="form-control" placeholder="Name *" required>
                                        @error('contact_name')
                                        <div class="alert alert-danger">
                                            <div class="alert-body">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="contact_email" class="form-control" placeholder="Email *" required>
                                        @error('contact_email')
                                        <div class="alert alert-danger">
                                            <div class="alert-body">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="contact_phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_company" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="comment" class="form-control" placeholder="Comment *" rows="2" required></textarea>
                                @error('comment')
                                <div class="alert alert-danger">
                                    <div class="alert-body">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="primary-btn primary-btn--has-icon w-100 w-sm-auto">
                                Post your comment
                                <i class="bi bi-arrow-right primary-btn__icon"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-xl-3 col-lg-4 mb-3">
                        <aside class="contact__card h-100">
                            <div class="contact__card__item">
                                <h3 class="contact__card__title">Address</h3>
                                <p>{{ generalsettings()->address }}</p>
                            </div>
                            <div class="contact__card__item">
                                <h3 class="contact__card__title">Phone Number</h3>
                                <a href="tel:{{ generalsettings()->phone }}" class="contact__card__link">{{ generalsettings()->phone }}</a>
                            </div>
                            <div class="contact__card__item">
                                <h3 class="contact__card__title">Support</h3>
                                <a href="mailto:{{ generalsettings()->email }}" class="contact__card__link">{{ generalsettings()->email }}</a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(hideshow()->map_status == 1)
        <!-- Embed Map Section -->
        <div class="iframe-section">
             {!! setLoction()->location_url !!}
        </div>
    @endif
@endsection

@push('custom-js')
    <script>
        $(document).ready(function () {
            /*  Banner slider */
            $(".banner__slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 8000,
                fade: true,
                cssEase: 'linear',
                speed: 500,
                arrows: true,
                prevArrow: '<button class="slick__arrows slick__arrows--left border-0 d-inline-flex align-items-center justify-content-center position-absolute"><i class="bi bi-arrow-left"></i></button>',
                nextArrow: '<button class="slick__arrows slick__arrows--right border-0 d-inline-flex align-items-center justify-content-center position-absolute"><i class="bi bi-arrow-right"></i></button>',
                dots: false,
                pauseOnHover: false,
                pauseOnFocus: false,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            arrows: false,
                            dots: true
                        }
                    },
                ]
            });
        });
    </script>
@endpush
