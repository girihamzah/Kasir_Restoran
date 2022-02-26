@extends('layouts.app',['titlePage' => 'Edit Transaksi', 'activePage' => 'transaksi-kasir'])

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kasir.transaksi.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('kasir.transaksi.update',$transaksi->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

    @method('PUT')
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan :</strong>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="{{$transaksi->nama_pelanggan}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Menu :</strong>
                <select name="menu_id" id="menu" class="form-control">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" @if($menu->id == $transaksi->menu_id) selected @endif>{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div    class="form-group">
                <strong>Jumlah :</strong>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$transaksi->jumlah}}">
            </div>
            <div class="form-group">
                <strong>Total Harga :</strong>
                <input type="number" readonly name="total_harga" class="form-control" placeholder="Total Harga" value="{{$transaksi->total_harga}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection