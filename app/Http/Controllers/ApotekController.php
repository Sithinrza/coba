<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = Apotek::all();
        return view('pages.products.index', [
          'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judulProduk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'gambar' => 'required|file|max:4096|mimes:jpg,png'
        ]);
        if($request->file('gambar')){
            $validasi['gambar'] = $request->file('gambar')->store('public/gambar');
        }
        Apotek::create($validasi);

        return redirect('/products')->with('success','Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apotek  $apotek
     * @return \Illuminate\Http\Response
     */
    public function show(Apotek $apotek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apotek  $apotek
     * @return \Illuminate\Http\Response
     */
    public function edit($idProduk)
    {
        return view('pages.products.edit',[
            'apotek' => Apotek::where('idProduk', $idProduk)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apotek  $apotek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProduk)
    {
        $validasi = $request->validate([
            'judulProduk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer'

        ]);
        //simpan ke db
        // $product->update($validasi);
        // if($request->file('gambar')){
        //     $validasi['gambar'] = $request->file('gambar')->store('public/gambar');
        // }


    //    Apotek::where('idProduk', $idProduk)->first();
        // Storage::delete($apotek->gambar);
        Apotek::where('idProduk', $idProduk)->update($validasi);

        //kalau berhasil akan dikembalkan
        return redirect('/products')->with('succcess', 'Data berhasil diediit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apotek  $apotek
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProduk)
    {
        $apotk = Apotek::where('idProduk', $idProduk)->first();
        //menghapus gambar dari storage
        if($apotk->gambar){
            Storage::delete($apotk->gambar);
        }

        //menghapus data dari db
        Apotek::where('idProduk', $idProduk)->delete();
        return redirect('/products')->with('success', 'Data terhapus');
    }

    // public function destroy(Apotek $apotek)
    // {
    //     if ($apotek->gambar) {
    //         Storage::delete($apotek->gambar);
    //     }

    //     Apotek::destroy($apotek->idProduk);
    //     return redirect('/products')->with('success', 'Data produk berhasil dihapus!');
    // }
}
