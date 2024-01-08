@extends('layouts.template')

@section('content')
   <div class="jumbotron py-4 px-5">
    @if (Session::get('cantAccess'))
        <div class="alert alert-danger">{{ Session::get('cantAccess') }}</div>
    @endif
    <h1 class="display-4">
        Welcome {{ Auth::user()->name }}
    </h1>
    <hr class="py-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat,
        penyetokan, juga pembelian (kasir).
    </p>
   </div> 
@endsection