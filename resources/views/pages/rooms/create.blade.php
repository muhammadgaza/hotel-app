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
            <h1 class="mb-0 fw-bold">Hotel Data </h1>
        </div>
    </div
</div>
<div class="card">
    <div class="card-body">
        <form class="form-horizontal form-material mx-2" action="{{ route('hotels.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="col-md-12">Name Hotel</label>
                <div class="col-md-12">
                    <input type="text" placeholder="Input Name hotel"
                        class="form-control form-control-line" name="name" id="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Price</label>
                <div class="col-md-12">
                    <input type="number" placeholder="Input price"
                        class="form-control form-control-line" name="price" id="price">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Room available</label>
                <div class="col-md-12">
                    <input type="number" placeholder="Input room available"
                        class="form-control form-control-line" name="available" id="available">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Descripton</label>
                <div class="col-md-12">
                    <textarea rows="5" class="form-control form-control-line" name="description" id="description"></textarea>
                </div>
            </div>
            {{-- <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select class="form-select shadow-none form-control-line">
                        <option>London</option>
                        <option>India</option>
                        <option>Usa</option>
                        <option>Canada</option>
                        <option>Thailand</option>
                    </select>
                </div>
            </div> --}}
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection