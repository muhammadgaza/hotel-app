@extends('layout.dashboard')
@section('content')

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="ind  ex.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Rservation</h1>
            </div>
        </div>
    </div>

<form class="form-horizontal form-material mx-2" action="{{ route('reservation.store')}}" method="POST">
    <div class="d-flex gap-4">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Reservation</h4>
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12"> Hotel</label>
                        <div class="col-md-12">
                            <select name="hotel_id" class="form-control form-control-line" required>
                                <option value="" selected hidden>--SELECT HOTEL--</option>
                                @foreach ($hotels as $hotel)
                                <option value="{{$hotel->id}}">{{$hotel->name}} (Rp. {{$hotel->price}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"> Check In</label>
                        <div class="col-md-12">
                            <input type="date" placeholder="Input Check In"
                                class="form-control form-control-line" name="check_in" id="price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"> Check Out</label>
                        <div class="col-md-12">
                            <input type="date" placeholder="Input Check Our"
                                class="form-control form-control-line" name="check_out" id="available" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Guest</label>
                        <div class="col-md-12">
                            <input type="number" placeholder="Input Jumlah Tamu"
                                class="form-control form-control-line" name="guests" id="name" required>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Customer</h4>
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Name </label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input name User"
                                class="form-control form-control-line" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Addres</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input Alamat"
                                class="form-control form-control-line" name="address" id="price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Phone Number</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input Nomor Handphone"
                                class="form-control form-control-line" name="phone" id="available" required>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success text-white">Submit</button>
            </div>
        </div>
</form>
@endsection
