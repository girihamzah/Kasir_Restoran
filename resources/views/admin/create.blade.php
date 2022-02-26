@extends('layouts.app',['titlePage' => 'Create User', 'activePage' => 'user-admin']))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.user.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>There were some problems with your input.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                <input type="text" name="name" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Username :</strong>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Pass :</strong>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <input type="radio" name="role" value="admin">Admin
                <input type="radio" name="role" value="kasir">Kasir
                <input type="radio" name="role" value="manajer">Manajer
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="sumbit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection