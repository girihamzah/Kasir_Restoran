@extends('layouts.app',['titlePage' => 'Create Transaksi', 'activePage' => 'transaksi-kasir'])

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kasir.transaksi.index') }}">Back</a>
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

<form action="{{ route('kasir.transaksi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan :</strong>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Menu :</strong>
                <select name="menu_id" id="menu" class="form-control">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Jumlah :</strong>
                <input type="number" name="jumlah" value="1" class="form-control" placeholder="Jumlah">
            </div>
        </div>
        <div class="col-xs-12 col-sm12 col-md-12">
            <div class="form-group">
                <strong>Total Harga :</strong>
                <input type="number" name="Total Harga" class="form-control" placeholder="Total Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="sumbit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection