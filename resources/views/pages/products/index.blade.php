@extends('pages.main')

@section('content')


<h3 class="mb-5">Halaman Kelola Data Produk</h3>

<a href="/products/create" class="btn btn-md btn-custom mb-3">Tambah Produk</a>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id Produk</th>
          <th>Nama Produk</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>#</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($obat as $show)
            <tr style="border: 1px solid black;">
              <td>{{ $show->idProduk }}</td>
              <td>{{ $show->judulProduk }}</td>
              <td>{{ $show->deskripsi }}</td>
              <td>Rp. {{ number_format($show->harga, '0', ',', ',') }}</td>
              <td><img src="{{ Storage::url($show->gambar) }}" alt="{{ $show->judulProduk }}" width="100" class="img-thumbnail"></td>
              <td>
                <a href="/products/{{ $show->idProduk }}/edit" class="btn btn-sm btn-warning" style="padding-top: 14px">Edit</a>
                <form action="/products/{{ $show->idProduk }}" method="POST" class=" btn d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
              @endforeach
        </tbody>

  </table>
</div>

@endsection
