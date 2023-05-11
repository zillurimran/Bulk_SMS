@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} |  Offers
@endsection

{{-- Active Menu --}}
@section('offers')
    active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Offers
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section >
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        <div class="alert-body">{{ session('success') }}</div>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        <div class="alert-body">{{ session('warning') }}</div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offers</h4>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                            Add Offers
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Offers</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="{{ route('offer.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                            <div class="form-group">
                                                            <label for="offer">Offer text  <span class="text-danger">*</span></label>
                                                            <textarea type="text" name="offer" id="offer" class="form-control" placeholder="Promotional text here"></textarea>
                                                            @error('offer')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="url">Redirection url</label>
                                                            <input type="text" name="url" id="url" placeholder="https://soclose.co" class="form-control">
                                                            @error('url')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="start_date" id="start_date" class="form-control">
                                                            @error('start_date')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_date">End Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="end_date" id="end_date" class="form-control">
                                                            @error('end_date')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_time">Start Time <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="start_time" name="start_time">
                                                                <option value="24">All day</option>
                                                                <option value="0">0h</option>
                                                                <option value="1">1h</option>
                                                                <option value="2">2h</option>
                                                                <option value="3">3h</option>
                                                                <option value="4">4h</option>
                                                                <option value="5">5h</option>
                                                                <option value="6">6h</option>
                                                                <option value="7">7h</option>
                                                                <option value="8">8h</option>
                                                                <option value="9">9h</option>
                                                                <option value="10">10h</option>
                                                                <option value="11">11h</option>
                                                                <option value="12">12h</option>
                                                                <option value="13">13h</option>
                                                                <option value="14">14h</option>
                                                                <option value="15">15h</option>
                                                                <option value="16">16h</option>
                                                                <option value="17">17h</option>
                                                                <option value="18">18h</option>
                                                                <option value="19">19h</option>
                                                                <option value="20">20h</option>
                                                                <option value="21">21h</option>
                                                                <option value="22">22h</option>
                                                                <option value="23">23h</option>
                                                            </select>
                                                            @error('start_time')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_time">End Time <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="end_time" name="end_time">
                                                                <option value="24">All day</option>
                                                                <option  value="0">0h</option>
                                                                <option  value="1">1h</option>
                                                                <option  value="2">2h</option>
                                                                <option  value="3">3h</option>
                                                                <option  value="4">4h</option>
                                                                <option  value="5">5h</option>
                                                                <option  value="6">6h</option>
                                                                <option  value="7">7h</option>
                                                                <option  value="8">8h</option>
                                                                <option  value="9">9h</option>
                                                                <option  value="10">10h</option>
                                                                <option  value="11">11h</option>
                                                                <option  value="12">12h</option>
                                                                <option  value="13">13h</option>
                                                                <option  value="14">14h</option>
                                                                <option  value="15">15h</option>
                                                                <option  value="16">16h</option>
                                                                <option  value="17">17h</option>
                                                                <option  value="18">18h</option>
                                                                <option  value="19">19h</option>
                                                                <option  value="20">20h</option>
                                                                <option  value="21">21h</option>
                                                                <option  value="22">22h</option>
                                                                <option  value="23">23h</option>
                                                            </select>
                                                            @error('end_time')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Offer</th>
                                            <th>Url</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                         @foreach ($offers as $offer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $offer->offer }}</td>
                                                <td>
                                                    <a href="{{ $offer->url }}" target="_blank">{{ $offer->url }}</a>
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($offer->start_date)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($offer->end_date)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    {{ ($offer->start_time == 24) ? 'All day' : $offer->start_time . 'h' }}
                                                </td>
                                                <td>
                                                    {{ ($offer->end_time == 24) ? 'All day' : $offer->end_time . 'h' }}
                                                </td>
                                                {{-- <td>
                                                    @if ($offer->status == 'show')
                                                        <span class="badge badge-success">Show</span>
                                                    @else
                                                        <span class="badge badge-danger">Hide</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                    <button type="button" class="dropdown-item"  data-toggle="modal" data-target="#staticBackdrop{{ $offer->id }}">
                                                                        <i data-feather="edit" class="mr-50"></i>
                                                                        <span>Edit</span>
                                                                    </button>

                                                                   <form action="{{ route('offer.delete') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i data-feather="trash" class="mr-50"></i>
                                                                            <span>Delete</span>
                                                                        </button>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($offers as $offer)
                                        <div class="modal fade" id="staticBackdrop{{ $offer->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Offers</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <form action="{{ route('offer.update', $offer->id) }}" method="POST">
                                                         @csrf
                                                         <div class="form-group">
                                                            <label for="offer">Offer text<span class="text-danger">*</span></label>
                                                            <textarea type="text" name="offer" id="offer" class="form-control" placeholder="Promotional text here">{{ $offer->offer }}</textarea>
                                                            @error('offer')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="url">Redirection url</label>
                                                            <input type="text" name="url" id="url" placeholder="https://soclose.co" class="form-control" value="{{ $offer->url }}">
                                                            @error('url')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d') }}">
                                                            @error('start_date')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="end_date">End Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ \Carbon\Carbon::parse($offer->end_date)->format('Y-m-d') }}">
                                                            @error('end_date')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="start_time">Start Time <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="start_time" name="start_time">
                                                                <option value="{{ $offer->start_time }}">{{ ($offer->start_time == 24) ? 'All Day' : $offer->start_time . 'h' }}</option>
                                                                @if($offer->start_time != 24)
                                                                <option value="24">All day</option>
                                                                @endif
                                                                <option value="0">0h</option>
                                                                <option value="1">1h</option>
                                                                <option value="2">2h</option>
                                                                <option value="3">3h</option>
                                                                <option value="4">4h</option>
                                                                <option value="5">5h</option>
                                                                <option value="6">6h</option>
                                                                <option value="7">7h</option>
                                                                <option value="8">8h</option>
                                                                <option value="9">9h</option>
                                                                <option value="10">10h</option>
                                                                <option value="11">11h</option>
                                                                <option value="12">12h</option>
                                                                <option value="13">13h</option>
                                                                <option value="14">14h</option>
                                                                <option value="15">15h</option>
                                                                <option value="16">16h</option>
                                                                <option value="17">17h</option>
                                                                <option value="18">18h</option>
                                                                <option value="19">19h</option>
                                                                <option value="20">20h</option>
                                                                <option value="21">21h</option>
                                                                <option value="22">22h</option>
                                                                <option value="23">23h</option>
                                                            </select>
                                                            @error('start_time')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="end_time">End Time <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="end_time" name="end_time">
                                                                <option value="{{ $offer->end_time }}">{{ ($offer->end_time == 24) ? 'All day' : $offer->end_time . 'h' }}</option>
                                                                @if($offer->end_time != 24)
                                                                <option value="24">All day</option>
                                                                @endif
                                                                <option  value="0">0h</option>
                                                                <option  value="1">1h</option>
                                                                <option  value="2">2h</option>
                                                                <option  value="3">3h</option>
                                                                <option  value="4">4h</option>
                                                                <option  value="5">5h</option>
                                                                <option  value="6">6h</option>
                                                                <option  value="7">7h</option>
                                                                <option  value="8">8h</option>
                                                                <option  value="9">9h</option>
                                                                <option  value="10">10h</option>
                                                                <option  value="11">11h</option>
                                                                <option  value="12">12h</option>
                                                                <option  value="13">13h</option>
                                                                <option  value="14">14h</option>
                                                                <option  value="15">15h</option>
                                                                <option  value="16">16h</option>
                                                                <option  value="17">17h</option>
                                                                <option  value="18">18h</option>
                                                                <option  value="19">19h</option>
                                                                <option  value="20">20h</option>
                                                                <option  value="21">21h</option>
                                                                <option  value="22">22h</option>
                                                                <option  value="23">23h</option>
                                                            </select>
                                                            @error('end_time')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')

    <script>
        $(document).on('change', '#menuAlloff_day_status', function() {
            $("#off_day_wrap").slideToggle();
        });

        @if($errors->any())
            $('#staticBackdrop').modal('show');
        @endif
    </script>

@endpush
