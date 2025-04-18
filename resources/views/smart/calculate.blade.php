@extends('Layouts.master') {{-- Atur sesuai layout-mu --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Panel Admin – Perhitungan Siswa Terbaik (SMART)</h2>

    @if (session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.smart.calculate') }}" method="POST" class="mb-4">
        @csrf
        <button type="submit" class="btn btn-primary">
            🔁 Hitung Ulang SMART
        </button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
                <tr>
                    <td>{{ $result->rank }}</td>
                    <td>{{ $result->student->name }}</td>
                    <td>{{ $result->student->student_number }}</td>
                    <td>{{ $result->student->class }}</td>
                    <td>{{ number_format($result->final_score, 4) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada hasil perhitungan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
