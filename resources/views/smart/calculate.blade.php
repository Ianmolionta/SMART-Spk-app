@extends('Layouts.master')

@section('content')
<div class="container py-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold text-gradient">📊 Panel Admin – Perhitungan Siswa Terbaik</h2>
    <p class="text-muted">Metode SMART</p>
  </div>

  {{-- Tombol AJAX --}}
  <div class="text-center mb-4">
    <button id="calculateBtn" class="btn btn-outline-success btn-lg shadow-sm">
      🔁 Hitung Ulang SMART
    </button>
  </div>

  {{-- Tabel hasil --}}
  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Peringkat</th>
              <th scope="col">Nama Siswa</th>
              <th scope="col">NIS</th>
              <th scope="col">Kelas</th>
              <th scope="col">Skor Akhir</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($results as $result)
            <tr>
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
                  <div class="avatar bg-light rounded-circle text-primary me-3"
                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
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
              <td colspan="5" class="text-center text-muted py-4">Belum ada hasil perhitungan.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- Gradient Text Style --}}
<style>
.text-gradient {
  background: linear-gradient(to right, #007bff, #00c6ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>

{{-- SweetAlert & CSRF --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
document.getElementById('calculateBtn').addEventListener('click', function() {
  Swal.fire({
    title: 'Memproses...',
    text: 'Mohon tunggu sebentar.',
    icon: 'info',
    showConfirmButton: false,
    allowOutsideClick: false,
    didOpen: () => {
      Swal.showLoading()
    }
  });

  fetch("{{ route('admin.smart.calculate') }}", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        "Accept": "application/json",
        "Content-Type": "application/json"
      }
    })
    .then(response => response.json())
    .then(data => {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: data.message || 'Perhitungan SMART berhasil dihitung ulang.',
        confirmButtonColor: '#28a745'
      });

      // Optional: reload table or fetch new data without refresh
      // location.reload();
    })
    .catch(error => {
      console.error(error);
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: 'Gagal menghitung ulang SMART.',
        confirmButtonColor: '#dc3545'
      });
    });
});
</script>
@endsection