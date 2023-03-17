<style>

    .row{
    text-align: center;
    color: black;

    font-weight: 500;
}
.row p{
    text-align: center;
}
.row .card{
    text-align: center;
    background: transparent;
    left: 29%;
    color: black;
    width: 500px;
    border-color: black;
}


</style>
@extends('pages.main')

@section('content')

<h4 class="text-center mb-5">Dashboard</h4>

  <div class="container">
    <div class="col-sm-12">
      <p class="text-center" style="font-weight: 700; color:black;">Jumlah Data Produk</p><br>
      <div class="card">
        <div class="card-body text-center">
          <h5>{{ $total }}</h5>
          <span style="font-weight: 700; color:black;">Produk</span>
        </div>
      </div>
    </div>
  </div>
  @endsection
