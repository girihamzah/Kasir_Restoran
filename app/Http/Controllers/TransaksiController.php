<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(10);

        return view('kasir.index', compact('transaksis'))
            ->with('i', (request()->input('page', 1) - 1) *10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get(['id', 'nama_menu']);

        return view('kasir.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'menu_id' => 'required',
            'jumlah' => 'required|numeric',
            
        ]); 

        $pegawai_id = Auth::user()->id;

        $menu = Menu::findOrFail($request->menu_id);
        $harga_menu = $menu->harga;
        $total_harga = $request->jumlah * $harga_menu;
        
        Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'pegawai_id' => $pegawai_id,
        ]);

        $ket_ada = $menu->ketersediaan;

        $ket = $menu->ketersediaan - $request->jumlah;

        $menu->update([
            'ketersediaan' => $ket
        ]);

        return redirect()->route('kasir.transaksi.index')
                        ->with('success','Berhasil Menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $menus = Menu::all();
        return view('kasir.edit', compact('transaksi', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'menu_id' => 'required',
            'jumlah' => 'required|numeric',
        ]); 

        $pegawai_id = Auth::user()->id;

        $menu = Menu::findOrFail($request->menu_id);
        $jumlah_lama = $transaksi->jumlah;
        $harga_menu = $menu->harga;
        $total_harga = $request->jumlah * $harga_menu;
        
        $transaksi->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        $ket_ada = $menu->ketersediaan;

        $selisih = $jumlah_lama - $request->jumlah;
        $ket = $ket_ada + $selisih;

        $menu->update([
            'ketersediaan' => $ket
        ]);

        return redirect()->route('kasir.transaksi.index')
                        ->with('success','Berhasil Menyimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('kasir.transaksi.index')
                        ->with('success','Berhasil Hapus!');
    }
}
