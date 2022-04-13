@extends('layouts.app', ['titlePage' => 'Laporan', 'activePage' => 'laporan-manajer'])

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.semanticui.min.css">
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Transaksi table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-4">
            <div class="text-end px-4">
                {{-- <a href=""><button class="btn btn-primary text-uppercase" type="button">Create</button></a> --}}
            </div>
            <table class="table align-items-center yajra-datatable mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pegawai</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-capitalize">{{ $transaksi->nama_pelanggan }}</td>
                    <td class="text-center">{{ $transaksi->menu->nama_menu }}</td>
                    <td class="text-center">{{ $transaksi->jumlah }}</td>
                    <td class="text-center">{{ $transaksi->total_harga }}</td>
                    <td class="text-center">{{ $transaksi->pegawai->name }}</td>
                </tr>
                @endforeach
                </tbody>
                <div class="text-center">
                {{-- {!! $transaksis->onEachSide(5)->link() !!} --}}
                </div>
            <table>

            </div>
        </div>
        </div>
    </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
        
        var table = $('.yajra-datatable').DataTable({
                dom: "Bfrtip",
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
                columnDefs: [{
                    orderable: false,
                    targets: -1,
                }] 
            })
        });
    </script>
@endsection