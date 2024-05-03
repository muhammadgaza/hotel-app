@extends('layout.dashboard')
@section('content')
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
                            <td>{{ $hotel->description }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <form action="#" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
