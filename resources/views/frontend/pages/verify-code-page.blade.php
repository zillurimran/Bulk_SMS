@extends('frontend.layout.master')

@section('title', '| Code Verify')

@section('main')

<!-- Contact Section -->
<section class="section-gap section-border section-border--top">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-8 mx-auto">
                <div class="section-header text-center">
                    <div class="icon-box d-inline-block mb-4">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h1 class="section-header__title section-header__title--lg text-capitalize">Verification Code</h1>
                    <p>Enter the code sent by email</p>
                </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input id="one" type="text" maxlength="1" name="one" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input id="two" type="text" maxlength="1" name="two" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input id="three" type="text" maxlength="1" name="three" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input id="four" type="text" maxlength="1" name="four" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input id="five" type="text" maxlength="1" name="five" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button id="verifyCode" class="primary-btn primary-btn--has-icon primary-btn--dark btn-block">
                        Check
                        <i class="bi bi-arrow-right primary-btn__icon"></i>
                    </button>
                @if(session('user_id'))
                    <form action="{{ route('send.code') }}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <button id="check" type="submit" class="primary-btn primary-btn--has-icon primary-btn--dark btn-block mt-4">
                            Resend Code
                            <i class="bi bi-arrow-right primary-btn__icon"></i>
                        </button>
                    </form>
                @else 
                <a id="resend" href="{{ route('forgot.password') }}" class="primary-btn primary-btn--has-icon primary-btn--dark btn-block mt-4">
                    Resend Code
                    <i class="bi bi-arrow-right primary-btn__icon"></i>
                </a>
                @endif


                {{-- Error message --}}
                <div id="invalid" class="d-none">
                    <h4 class="text-danger mt-4 text-center">Invalid code</h4>
                </div>
                <div id="spinner" class="text-center mt-4 d-none">
                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_Wezc{transform-origin:center;animation:spinner_Oiah .75s step-end infinite}@keyframes spinner_Oiah{8.3%{transform:rotate(30deg)}16.6%{transform:rotate(60deg)}25%{transform:rotate(90deg)}33.3%{transform:rotate(120deg)}41.6%{transform:rotate(150deg)}50%{transform:rotate(180deg)}58.3%{transform:rotate(210deg)}66.6%{transform:rotate(240deg)}75%{transform:rotate(270deg)}83.3%{transform:rotate(300deg)}91.6%{transform:rotate(330deg)}100%{transform:rotate(360deg)}}</style><g class="spinner_Wezc"><circle cx="12" cy="2.5" r="1.5" opacity=".14"/><circle cx="16.75" cy="3.77" r="1.5" opacity=".29"/><circle cx="20.23" cy="7.25" r="1.5" opacity=".43"/><circle cx="21.50" cy="12.00" r="1.5" opacity=".57"/><circle cx="20.23" cy="16.75" r="1.5" opacity=".71"/><circle cx="16.75" cy="20.23" r="1.5" opacity=".86"/><circle cx="12" cy="21.5" r="1.5"/></g></svg>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-js')
    <script>
        $(document).ready(function(){



            $("#verifyCode").click(function(){

                $("#verifyCode").addClass('d-none');
                $("#invalid").addClass('d-none');
                $("#resend").addClass('d-none');
                $("#check").addClass('d-none');
            
                $("#spinner").removeClass('d-none');
                setTimeout(function(){
                    $("#spinner").addClass('d-none');
                }, 3000);

                var code = $("#one").val() + $("#two").val() + $("#three").val() + $("#four").val() + $("#five").val();
                var user_id = $("#five").val();
               
                $.ajax({
                    url: "{{ route('validate.code') }}", 
                    type: "POST",
                    data: {
                        code: code,
                        user_id : user_id,
                    },
                    success: function(result){
                        if(!result){
                           
                            $("#spinner").addClass('d-none');
                            $("#invalid").removeClass('d-none');
                            $("#resend").removeClass('d-none');
                            $("#check").removeClass('d-none');
                            $("#verifyCode").removeClass('d-none');
                        }
                        else{
                            window.location.href = "{{ route('change.password') }}";
                        }
                        
                    }
                })

            })

            
        })
    </script>
@endpush
