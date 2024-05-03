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
            <h1 class="mb-0 fw-bold">Hotel Data</h1>
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
            <h4 class="card-title">Data Hotel</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Hotel</th>
                        <th scope="col">Price</th>
                        <th scope="col">Available Rooms</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotels as $hotel)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->price }}</td>
                        <td>{{ $hotel->available }}</td>
                        <td>{{ $hotel->description }}</td>
                        <td>
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary mdi mdi-grease-pencil"> Update</a>
                            <button type="button" class="btn btn-primary btn-update-available"
                            data-product-id="{{ $hotel->id }}">
                            Update Available Rooms
                            </button>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST"
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

