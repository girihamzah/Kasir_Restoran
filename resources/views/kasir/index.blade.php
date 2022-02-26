@extends('layouts.app', ['titlePage' => 'Kasir', 'activePage' => 'user-admin'])

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Kasir table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <div class="text-end px-4">
                <a href={{ route('kasir.transaksi.create') }}><button class="btn btn-primary text-uppercase" type="button">Create</button></a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pegawai</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transaksis as $transaksi)
                  <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td class="text-capitalize">{{ $transaksi->nama_pelanggan }}</td>
                    <td class="text-center">{{ $transaksi->menu->nama_menu }}</td>
                    <td class="text-center">{{ $transaksi->jumlah }}</td>
                    <td class="text-center">{{ $transaksi->total_harga }}</td>
                    <td class="text-center">{{ $transaksi->pegawai->name }}</td>
                    <td class="text-center">
                        <form action="{{ route('kasir.transaksi.destroy',$transaksi->id) }}" method="POST">

                          <a class="btn btn-primary" href="{{ route('kasir.transaksi.edit',$transaksi->id) }}">Edit</a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <div class="text-center">
                  {{-- {!! $transaksis->onEachSide(5)->link() !!} --}}
                </div>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection