@extends('layouts.dashboard')
@section('title')
{{ config('app.name') }} | Stripe Setting
@endsection
@section('stripeSettings')
    active
@endsection
@section('content')
@push('page-js')
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Stripe Keys</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('key.update',$key->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="heading">Stripe Key</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="stripe_key" class="form-control" value="{{ $key->stripe_key ?? old('stripe_key') }}">
                                </div>
                                <div class="form-group">
                                    <label for="heading">Secret Key</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="secret_key" class="form-control" value="{{ $key->secret_key ?? old('secret_key') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection