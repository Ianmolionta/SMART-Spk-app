@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Tambah Menu Baru</h1>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}" required>
            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="order_count" class="form-label">Jumlah Pesanan</label>
            <input type="number" name="order_count" class="form-control" value="{{ old('order_count') }}" required>
            @error('order_count') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
