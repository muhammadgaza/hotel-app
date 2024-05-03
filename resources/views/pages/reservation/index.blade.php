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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Update Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateStockForm" action="{{ route('hotels.updateAvailable', ['id' => ':id']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="available" id="available" required>
                        <div class="invalid-feedback">
                            Please fill in your javailable rooms
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Data Reservations</h4>
                <a href="{{route('reservation.create')}}" class="btn btn-primary">
                    Add Reservation
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Hotel</th>
                        <th scope="col">Name Customer</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Jumlah Tamu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $reservation->hotel->name }}</td>
                        <td>{{ $reservation->customer->name }}</td>
                        <td>{{ $reservation->check_in }}</td>
                        <td>{{ $reservation->check_out }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>
                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary mdi mdi-grease-pencil"> Update</a>
                            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i
                                        class="mdi mdi-delete"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.btn-update-avalible').on('click', function() {
        var productId = $(this).data('hotel-id');
        var formAction = $('#updateAvailableForm').attr('action').replace(':id', hotelId);
        $('#updateAvailableForm').attr('action', formAction);
        $('#exampleModal').modal('show');
    });
</script>
@endsection

