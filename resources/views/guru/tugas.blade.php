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
    <div class="p-4 border-b border-surface-variant flex flex-col md:flex-row gap-3 bg-surface-container-low justify-end">
        {{-- Filter Kelas --}}
        <div class="relative w-full md:w-auto md:min-w-[200px] shrink-0">
            <input type="hidden" id="filterKelas" value="Semua">
            <button type="button" onclick="toggleDropdown('kelas')" class="w-full bg-surface border border-outline-variant/50 rounded-xl pl-10 pr-10 py-2 text-sm font-medium text-on-surface text-left focus:outline-none focus:border-secondary transition-soft hover:border-secondary/50">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">school</span>
                <span id="filterKelasLabel">Semua Kelas</span>
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">expand_more</span>
            </button>
            <div id="dropdownKelas" class="hidden absolute z-20 mt-2 w-full md:min-w-[200px] bg-surface rounded-xl border border-outline-variant/30 shadow-xl overflow-hidden">
                <button type="button" onclick="selectDropdown('kelas','Semua','Semua Kelas')" class="w-full text-left px-4 py-2 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Semua Kelas</button>
                @foreach($kelasList as $kelas)
                <button type="button" onclick="selectDropdown('kelas','{{ $kelas }}','{{ $kelas }}')" class="w-full text-left px-4 py-2 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">{{ $kelas }}</button>
                @endforeach
            </div>
        </div>
        {{-- Filter Status --}}
        <div class="relative w-full md:w-auto md:min-w-[170px] shrink-0">
            <input type="hidden" id="filterStatus" value="Semua">
            <button type="button" onclick="toggleDropdown('status')" class="w-full bg-surface border border-outline-variant/50 rounded-xl pl-10 pr-10 py-2 text-sm font-medium text-on-surface text-left focus:outline-none focus:border-secondary transition-soft hover:border-secondary/50">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">inventory_2</span>
                <span id="filterStatusLabel">Semua Status</span>
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">expand_more</span>
            </button>
            <div id="dropdownStatus" class="hidden absolute z-20 mt-2 w-full md:min-w-[170px] bg-surface rounded-xl border border-outline-variant/30 shadow-xl overflow-hidden">
                <button type="button" onclick="selectDropdown('status','Semua','Semua Status')" class="w-full text-left px-4 py-2 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Semua Status</button>
                <button type="button" onclick="selectDropdown('status','aktif','Aktif')" class="w-full text-left px-4 py-2 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Aktif</button>
                <button type="button" onclick="selectDropdown('status','selesai','Selesai')" class="w-full text-left px-4 py-2 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Selesai</button>
            </div>
        </div>
    </div>
    <table class="w-full text-left table-fixed">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[30%]">Judul Tugas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[15%]">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider w-[15%]">Deadline</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[15%]">Pengumpulan</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[10%]">Status</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center w-[15%]">Aksi</th>
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
    const filterStatusInput = document.getElementById('filterStatus');
    const filterKelasInput = document.getElementById('filterKelas');
    const rows = document.querySelectorAll('tbody tr[data-status]');

    function filterTugas() {
        const status = filterStatusInput.value;
        const kelas = filterKelasInput.value;

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            const rowKelas = row.getAttribute('data-kelas');
            const statusMatch = status === 'Semua' || rowStatus === status;
            const kelasMatch = kelas === 'Semua' || rowKelas === kelas;
            row.classList.toggle('hidden', !(statusMatch && kelasMatch));
        });
    }

    function toggleDropdown(type) {
        const targetId = type === 'kelas' ? 'dropdownKelas' : 'dropdownStatus';
        const target = document.getElementById(targetId);
        const otherId = type === 'kelas' ? 'dropdownStatus' : 'dropdownKelas';
        const other = document.getElementById(otherId);
        if (other && !other.classList.contains('hidden')) {
            other.classList.add('hidden');
        }
        target.classList.toggle('hidden');
    }

    function selectDropdown(type, value, label) {
        if (type === 'kelas') {
            document.getElementById('filterKelas').value = value;
            document.getElementById('filterKelasLabel').textContent = label;
            document.getElementById('dropdownKelas').classList.add('hidden');
        } else {
            document.getElementById('filterStatus').value = value;
            document.getElementById('filterStatusLabel').textContent = label;
            document.getElementById('dropdownStatus').classList.add('hidden');
        }
        filterTugas();
    }

    document.addEventListener('click', function (event) {
        const kelasWrapper = document.getElementById('dropdownKelas');
        const statusWrapper = document.getElementById('dropdownStatus');
        if (!event.target.closest('[onclick="toggleDropdown(\'kelas\')"]') && kelasWrapper && !kelasWrapper.classList.contains('hidden')) {
            kelasWrapper.classList.add('hidden');
        }
        if (!event.target.closest('[onclick="toggleDropdown(\'status\')"]') && statusWrapper && !statusWrapper.classList.contains('hidden')) {
            statusWrapper.classList.add('hidden');
        }
    });

    filterTugas();
</script>
@endpush
