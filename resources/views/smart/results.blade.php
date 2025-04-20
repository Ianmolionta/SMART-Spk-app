@extends('Layouts.master')

@section('content')
<div class="container py-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold text-gradient">🏆 Hasil Penilaian Siswa Terbaik</h2>
    <p class="text-muted">Berdasarkan Metode SMART</p>
  </div>

  <div class="card border-0 shadow-lg">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-borderless align-middle mb-0">
          <thead class="bg-primary text-white text-center">
            <tr style="font-size: 1rem;">
              <th>Peringkat</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Skor Akhir</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($results as $result)
            <tr class="border-top">
              <td class="text-center fw-bold">
                @if($result->rank == 1)
                🥇
                @elseif($result->rank == 2)
                🥈
                @elseif($result->rank == 3)
                🥉
                @else
                {{ $result->rank }}
                @endif
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar bg-light rounded-circle me-3"
                    style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;font-weight:bold;">
                    {{ strtoupper(substr($result->student->name, 0, 1)) }}
                  </div>
                  <span class="fw-semibold">{{ $result->student->name }}</span>
                </div>
              </td>
              <td class="text-center text-muted">{{ $result->student->student_number }}</td>
              <td class="text-center text-muted">{{ $result->student->class }}</td>
              <td class="text-end fw-bold text-success">{{ number_format($result->final_score, 4) }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">Belum ada hasil penilaian.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
.text-gradient {
  background: linear-gradient(to right, #007bff, #00c6ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
@endsection