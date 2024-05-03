@extends('layout.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="form-horizontal form-material mx-2" action="{{ route('users.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="col-md-12">Name User</label>
                <div class="col-md-12">
                    <input type="text" placeholder="Input name User"
                        class="form-control form-control-line" name="name" id="name" value="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Email</label>
                <div class="col-md-12">
                    <input type="email" placeholder="Input email user"
                        class="form-control form-control-line" name="email" id="email" value="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Password</label>
                <div class="col-md-12">
                    <input type="text" placeholder="Input password"
                        class="form-control form-control-line" name="password" id="available">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">role</label>
                <div class="col-md-12">
                    <select name="role" class="form-control form-control-line">
                        <option value="staff" selected hidden value="role">SELECT USER ROLE--</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
