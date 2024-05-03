@extends('layout.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="form-horizontal form-material mx-2" action="{{ route('hotels.update', $hotels->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="col-md-12">Name Hotel</label>
                <div class="col-md-12">
                    <input type="text" placeholder="Input Name hotel"
                        class="form-control form-control-line" name="name" id="name" value="{{ $hotels->name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price</label>
                <div class="col-md-12">
                    <input type="number" placeholder="Input price"
                        class="form-control form-control-line" name="price" id="price" value="{{ $hotels->price }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Room available</label>
                <div class="col-md-12">
                    <input type="number" placeholder="Input room available"
                        class="form-control form-control-line" name="available" id="available" value="{{ $hotels->available }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Descripton</label>
                <div class="col-md-12">
                    <textarea rows="5" class="form-control form-control-line" name="description" id="description">{{ $hotels->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection