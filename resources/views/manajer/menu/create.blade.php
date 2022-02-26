@extends('layouts.app',['titlePage' => 'Create Menu', 'activePage' => 'menu-manajer'])

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('manajer.menu.index') }}">Back</a>
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

<form action="{{ route('manajer.menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Nama Menu :</strong>
                <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Harga :</strong>
                <input type="number" min="1000" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi :</strong>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
            </div>
            <div class="form-group">
                <strong>Ketersediaan :</strong>
                <input type="number" min="1" name="ketersediaan" class="form-control" placeholder="Ketersediaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="sumbit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection