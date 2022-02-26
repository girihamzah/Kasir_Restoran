@extends('layouts.app', ['titlePage' => 'Menu', 'activePage' => 'menu-manajer'])

@section('content')
    <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Menu table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <div class="text-end px-4">
                <a href={{ route('manajer.menu.create') }}><button class="btn btn-primary text-uppercase" type="button">Create</button></a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Menu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ketersediaan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terakhir Di Ubah</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($menus as $menu)
                  <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td class="text-capitalize">{{ $menu->nama_menu }}</td>
                    <td class="text-center">{{ $menu->harga }}</td>
                    <td class="text-center">{{ $menu->deskripsi }}</td>
                    <td class="text-center">{{ $menu->ketersediaan }}</td>
                    <td class="text-center">{{ $menu->updated_at->diffForHumans() }}</td>
                    <td class="text-center">
                        <form action="{{ route('manajer.menu.destroy', $menu->nama_menu) }}" method="POST">

                          <a class="btn btn-primary" href="{{ route('manajer.menu.edit', $menu->nama_menu) }}">Edit</a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <div class="text-center">
                  {{-- {!! $menus->link() !!} --}}
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection