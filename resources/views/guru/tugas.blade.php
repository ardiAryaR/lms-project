@extends('layouts.guru')
@section('title', 'Tugas - SMK Mandalahayu 1')
@section('content')
@php
$tugas = [
    ['id'=>1,'judul'=>'Instalasi Sistem Operasi Linux','kelas'=>'X TKJ 1','deadline'=>'20 Mei 2025','deadline_iso'=>'2025-05-20T23:59','dikumpulkan'=>28,'total'=>32,'status'=>'aktif','deskripsi'=>'Kerjakan instalasi Linux sesuai langkah pada modul.','bobot'=>20,'kkm'=>75,'maks'=>100],
    ['id'=>2,'judul'=>'Konfigurasi Router Cisco','kelas'=>'X TKJ 2','deadline'=>'22 Mei 2025','deadline_iso'=>'2025-05-22T23:59','dikumpulkan'=>15,'total'=>30,'status'=>'aktif','deskripsi'=>'Konfigurasi dasar routing dan VLAN.','bobot'=>15,'kkm'=>70,'maks'=>100],
    ['id'=>3,'judul'=>'Desain Topologi Jaringan','kelas'=>'XI TKJ 1','deadline'=>'18 Mei 2025','deadline_iso'=>'2025-05-18T23:59','dikumpulkan'=>25,'total'=>25,'status'=>'selesai','deskripsi'=>'Buat topologi jaringan sekolah.','bobot'=>25,'kkm'=>75,'maks'=>100],
    ['id'=>4,'judul'=>'Troubleshooting Jaringan LAN','kelas'=>'XI TKJ 2','deadline'=>'25 Mei 2025','deadline_iso'=>'2025-05-25T23:59','dikumpulkan'=>0,'total'=>28,'status'=>'aktif','deskripsi'=>'Identifikasi dan perbaiki masalah koneksi.','bobot'=>20,'kkm'=>75,'maks'=>100],
    ['id'=>5,'judul'=>'Laporan Prakerin Semester 2','kelas'=>'XII TKJ 1','deadline'=>'15 Mei 2025','deadline_iso'=>'2025-05-15T23:59','dikumpulkan'=>20,'total'=>22,'status'=>'selesai','deskripsi'=>'Kumpulkan laporan prakerin.','bobot'=>30,'kkm'=>80,'maks'=>100],
];
$kelasList = collect($tugas)->pluck('kelas')->unique()->values();
@endphp

<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Manajemen Tugas</h2>
        <p class="text-on-surface-variant mt-1">Buat dan kelola tugas untuk siswa Anda.</p>
    </div>
    <a href="{{ route('guru.tugas.buat') }}" class="bg-secondary text-on-secondary font-bold py-3 px-6 rounded-xl flex items-center gap-2 transition-soft hover:brightness-110">
        <span class="material-symbols-outlined">add</span> Buat Tugas
    </a>
</div>


{{-- Table --}}
<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <div class="p-4 border-b border-surface-variant flex flex-wrap gap-3 bg-surface-container-low">
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
                <option value="aktif">Aktif</option>
                <option value="selesai">Selesai</option>
            </select>
            <span class="material-symbols-outlined pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">expand_more</span>
        </div>
    </div>
    <table class="w-full text-left table-fixed">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[25%]">Judul Tugas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[25%]">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[12.5%]">Deadline</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[12.5%]">Pengumpulan</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[12.5%]">Status</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[12.5%]">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            @foreach($tugas as $t)
            <tr class="hover:bg-surface-container transition-soft" data-kelas="{{ $t['kelas'] }}" data-status="{{ $t['status'] }}">
                <td class="p-4 font-bold text-on-surface">{{ $t['judul'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $t['kelas'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $t['deadline'] }}</td>
                <td class="p-4 text-center">
                    <div class="flex items-center gap-2 justify-center">
                        <span class="font-bold text-primary">{{ $t['dikumpulkan'] }}/{{ $t['total'] }}</span>
                        <div class="w-16 h-2 bg-surface-variant rounded-full overflow-hidden">
                            <div class="h-full rounded-full {{ $t['status']==='selesai' ? 'bg-green-500' : 'bg-secondary' }}" style="width: {{ $t['total']>0 ? round($t['dikumpulkan']/$t['total']*100) : 0 }}%"></div>
                        </div>
                    </div>
                </td>
                <td class="p-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $t['status']==='selesai' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ ucfirst($t['status']) }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex gap-2 justify-center">
                        <a href="{{ route('guru.tugas.buat', [
                            'mode' => 'edit',
                            'id' => $t['id'],
                            'judul' => $t['judul'],
                            'deskripsi' => $t['deskripsi'],
                            'kelas' => $t['kelas'],
                            'deadline' => $t['deadline_iso'],
                            'bobot' => $t['bobot'],
                            'kkm' => $t['kkm'],
                            'maks' => $t['maks'],
                        ]) }}" class="p-2 rounded-lg text-secondary hover:bg-secondary-container/30 transition-soft"><span class="material-symbols-outlined text-base">edit</span></a>
                        <a href="{{ route('guru.nilai') }}" class="px-3 py-2 rounded-lg text-primary border border-primary/20 hover:bg-primary-container/30 transition-soft text-xs font-bold">Nilai</a>
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
    const rows = document.querySelectorAll('tbody tr[data-status]');

    function applyFilters() {
        const status = statusFilter.value;
        const kelas = kelasFilter.value;

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            const rowKelas = row.getAttribute('data-kelas');
            const statusMatch = !status || rowStatus === status;
            const kelasMatch = !kelas || rowKelas === kelas;
            row.classList.toggle('hidden', !(statusMatch && kelasMatch));
        });
    }

    statusFilter.addEventListener('change', applyFilters);
    kelasFilter.addEventListener('change', applyFilters);
</script>
@endpush
