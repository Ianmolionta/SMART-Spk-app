@extends('Layouts.master') {{-- Ganti sesuai layout kamu --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Hasil Penilaian Siswa Terbaik (Metode SMART)</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Peringkat</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td>{{ $result->rank }}</td>
                <td>{{ $result->student->name }}</td>
                <td>{{ $result->student->student_number }}</td>
                <td>{{ $result->student->class }}</td>
                <td>{{ number_format($result->final_score, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection