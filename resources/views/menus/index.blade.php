@extends('Layouts.master')
@section('content')
<div class="container">
    <h1>Daftar Menu & Ranking Menu Terbaik</h1>

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah Pesanan</th>
                <th>Score WP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $res)
            <tr>
                <td>{{ $res['menu']->name }}</td>
                <td>{{ number_format($res['menu']->price, 0, ',', '.') }}</td>
                <td>{{ $res['menu']->order_count }}</td>
                <td>{{ number_format($res['score'], 4) }}</td>
                <td>
                    <a href="{{ route('menus.edit', $res['menu']->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('menus.destroy', $res['menu']->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus menu ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection