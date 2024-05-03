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
<form class="form-horizontal form-material mx-2" action="{{ route('reservation.update', $reservation->id)}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="d-flex gap-4">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Edit Reservation</h4>
                    <div class="form-group">
                        <label class="col-md-12">Name Hotel</label>
                        <div class="col-md-12">
                            <select name="hotel_id" class="form-control form-control-line" required>
                                @foreach ($hotels as $hotel)
                                <option value="{{$hotel->id}}" @if($hotel->id == $reservation->hotel_id) selected @endif >{{$hotel->name}} (Rp. {{$hotel->price}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tanggal Check In</label>
                        <div class="col-md-12">
                            <input type="date" placeholder="Input Tanggal Check In"
                                class="form-control form-control-line" value="{{$reservation->check_in}}" name="check_in" id="price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tanggal Check Out</label>
                        <div class="col-md-12">
                            <input type="date" placeholder="Input Tanggal Check Our"
                                class="form-control form-control-line" value="{{$reservation->check_out}}" name="check_out" id="available" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Jumlah Tamu</label>
                        <div class="col-md-12">
                            <input type="number" placeholder="Input Jumlah Tamu"
                                class="form-control form-control-line" value="{{$reservation->guests}}" name="guests" id="name" required>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Edit Customer</h4>
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Name User</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input name User"
                                class="form-control form-control-line" value="{{$reservation->customer->name}}" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Alamat</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input Alamat"
                                class="form-control form-control-line" value="{{$reservation->customer->addres}}" name="address" id="price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nomor Handphone</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Input Nomor Handphone"
                                class="form-control form-control-line" value="{{$reservation->customer->phone}}" name="phone" id="available" required>
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
