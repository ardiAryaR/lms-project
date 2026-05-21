@extends('layouts.guru')
@section('title', 'Ujian - SMK Mandalahayu 1')
@section('content')
@php
$ujian = [
    ['judul'=>'UTS Jaringan Komputer','kelas'=>'X TKJ 1','tanggal'=>'20 Mei 2025','waktu'=>'08.00 - 10.00 WIB','durasi'=>'120 menit','peserta'=>32,'status'=>'terjadwal'],
    ['judul'=>'UTS Pemrograman Dasar','kelas'=>'X TKJ 2','tanggal'=>'21 Mei 2025','waktu'=>'10.00 - 12.00 WIB','durasi'=>'120 menit','peserta'=>30,'status'=>'terjadwal'],
    ['judul'=>'UAS Administrasi Server','kelas'=>'XI TKJ 1','tanggal'=>'15 Mei 2025','waktu'=>'08.00 - 10.00 WIB','durasi'=>'120 menit','peserta'=>25,'status'=>'selesai'],
    ['judul'=>'UAS Routing & Switching','kelas'=>'XI TKJ 2','tanggal'=>'16 Mei 2025','waktu'=>'10.00 - 12.00 WIB','durasi'=>'120 menit','peserta'=>28,'status'=>'selesai'],
    ['judul'=>'UAS Keamanan Jaringan','kelas'=>'XII TKJ 1','tanggal'=>'28 Mei 2025','waktu'=>'08.00 - 11.00 WIB','durasi'=>'180 menit','peserta'=>22,'status'=>'terjadwal'],
];
$kelasList = collect($ujian)->pluck('kelas')->unique()->values();
$statusList = collect($ujian)->pluck('status')->unique()->values();
@endphp

<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Manajemen Ujian</h2>
        <p class="text-on-surface-variant mt-1">Jadwalkan dan kelola ujian siswa.</p>
    </div>
    <a href="{{ route('guru.ujian.buat') }}" class="bg-secondary text-on-secondary font-bold py-3 px-6 rounded-xl flex items-center gap-2 transition-soft hover:brightness-110">
        <span class="material-symbols-outlined">add</span> Buat Ujian
    </a>
</div>

<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-surface-variant bg-surface-container-low flex flex-wrap gap-3">
            <div class="relative">
                <select id="filter-kelas" class="appearance-none bg-surface border border-outline-variant rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-secondary pr-9">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $kelas)
                    <option value="{{ $kelas }}">{{ $kelas }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">expand_more</span>
            </div>
            <div class="relative">
                <select id="filter-status" class="appearance-none bg-surface border border-outline-variant rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-secondary pr-9">
                    <option value="">Semua Status</option>
                    @foreach($statusList as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">expand_more</span>
            </div>
        </div>
    <table class="w-full text-left">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Ujian & Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Jadwal & Durasi</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Partisipasi</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Status</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            @foreach($ujian as $u)
            <tr class="hover:bg-surface-container transition-soft ujian-row" data-kelas="{{ $u['kelas'] }}" data-status="{{ $u['status'] }}">
                <td class="p-4">
                    <p class="font-bold text-on-surface">{{ $u['judul'] }}</p>
                    <p class="text-xs text-on-surface-variant">{{ $u['kelas'] }}</p>
                </td>
                <td class="p-4">
                    <p class="font-bold text-on-surface">{{ $u['tanggal'] }}</p>
                    <p class="text-xs text-on-surface-variant">{{ $u['waktu'] }} • {{ $u['durasi'] }}</p>
                </td>
                <td class="p-4 text-center font-bold text-primary">{{ $u['peserta'] }}</td>
                <td class="p-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $u['status']==='selesai' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ ucfirst($u['status']) }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex gap-2 justify-center">
                        <a href="{{ route('guru.ujian.buat', ['edit' => 1, 'judul' => $u['judul'], 'kelas' => $u['kelas'], 'tanggal' => $u['tanggal'], 'waktu' => $u['waktu'], 'durasi' => str_replace(' menit', '', $u['durasi']), 'status' => $u['status']]) }}" class="p-2 rounded-lg text-secondary hover:bg-secondary-container/30 transition-soft"><span class="material-symbols-outlined text-base">edit</span></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    const statusFilter = document.getElementById('filter-status');
    const kelasFilter = document.getElementById('filter-kelas');
    const rows = document.querySelectorAll('tr.ujian-row');

    function applyFilters() {
        const status = statusFilter.value;
        const kelas = kelasFilter.value;

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            const rowKelas = row.getAttribute('data-kelas');
            const statusMatch = !status || rowStatus === status;
            const kelasMatch = !kelas || rowKelas === kelas;
            row.style.display = (statusMatch && kelasMatch) ? '' : 'none';
        });
    }

    statusFilter.addEventListener('change', applyFilters);
    kelasFilter.addEventListener('change', applyFilters);
</script>
@endpush
