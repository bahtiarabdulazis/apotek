@extends('layouts.template')

@section('content')
<form action="{{ route('user.daftar') }}" method="post" class="card p-5">
    @csrf

    @if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $erros)
                <li>{{ $erros }}</li>
            @endforeach
        </ul>
    @endif
        
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nama Anda: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
    </div>
</div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email Anda: </label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="email" name="email">
    </div>
</div>
<div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">Role Anda: </label>
    <div class="col-sm-10">
        <select class="form-select" name="role" id="role">
            <option selected disabled hidden>Pilih</option>
            <option value="admin">admin</option>
            <option value="cashier">cashier</option>
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection