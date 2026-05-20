@extends('layouts.guru')
@section('title', 'Kuis - SMK Mandalahayu 1')
@section('page-title', 'Kuis')
@section('content')
@php
$kuis = [
    ['judul'=>'Kuis Topologi Jaringan','kelas'=>'X TKJ 1','soal'=>15,'durasi'=>'30 menit','deadline'=>'19 Mei 2025','dikerjakan'=>28,'total'=>32,'status'=>'aktif'],
    ['judul'=>'Kuis Model OSI','kelas'=>'X TKJ 2','soal'=>10,'durasi'=>'20 menit','deadline'=>'20 Mei 2025','dikerjakan'=>12,'total'=>30,'status'=>'aktif'],
    ['judul'=>'Kuis IP Address','kelas'=>'XI TKJ 1','soal'=>20,'durasi'=>'40 menit','deadline'=>'15 Mei 2025','dikerjakan'=>25,'total'=>25,'status'=>'selesai'],
    ['judul'=>'Kuis Subnetting','kelas'=>'XI TKJ 2','soal'=>20,'durasi'=>'40 menit','deadline'=>'16 Mei 2025','dikerjakan'=>28,'total'=>28,'status'=>'selesai'],
    ['judul'=>'Kuis Routing Protocol','kelas'=>'XII TKJ 1','soal'=>25,'durasi'=>'50 menit','deadline'=>'25 Mei 2025','dikerjakan'=>0,'total'=>22,'status'=>'aktif'],
];
$kelasList = collect($kuis)->pluck('kelas')->unique()->values();
$statusList = collect($kuis)->pluck('status')->unique()->values();
@endphp

<div class="max-w-[1200px] mx-auto space-y-6">
    <div class="flex flex-wrap items-start justify-between gap-4">
        <div>
            <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Manajemen Kuis</h2>
            <p class="text-on-surface-variant mt-1">Buat dan kelola kuis interaktif untuk siswa.</p>
        </div>
        <a href="{{ route('guru.kuis.buat') }}" class="bg-secondary text-on-secondary font-bold py-3 px-6 rounded-xl flex items-center gap-2 transition-soft hover:brightness-110">
            <span class="material-symbols-outlined">add</span> Buat Kuis
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
        <div class="grid grid-cols-12 gap-4 bg-surface-container-low border-b border-surface-variant px-4 py-3 text-xs font-bold text-on-surface-variant uppercase tracking-wider">
            <div class="col-span-4">Kuis</div>
            <div class="col-span-2">Kelas</div>
            <div class="col-span-2">Durasi</div>
            <div class="col-span-2">Status</div>
            <div class="col-span-2 text-center">Aksi</div>
        </div>
        @foreach($kuis as $k)
        <div class="grid grid-cols-12 gap-4 px-4 py-4 border-b border-surface-variant last:border-b-0 hover:bg-surface-container transition-soft" data-kelas="{{ $k['kelas'] }}" data-status="{{ $k['status'] }}">
            <div class="col-span-4">
                <p class="font-bold text-on-surface">{{ $k['judul'] }}</p>
                <p class="text-xs text-on-surface-variant">{{ $k['soal'] }} soal • {{ $k['deadline'] }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-sm text-on-surface-variant">{{ $k['kelas'] }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-sm text-on-surface-variant">{{ $k['durasi'] }}</p>
            </div>
            <div class="col-span-2">
                <span class="px-3 py-1 rounded-full text-xs font-bold
                    {{ $k['status']==='aktif' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $k['status']==='selesai' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $k['status']==='draft' ? 'bg-gray-100 text-gray-700' : '' }}
                    {{ $k['status']==='close' ? 'bg-red-100 text-red-700' : '' }}
                    {{ $k['status']==='archived' ? 'bg-slate-100 text-slate-700' : '' }}">
                    {{ ucfirst($k['status']) }}
                </span>
            </div>
            <div class="col-span-2 flex justify-center">
                <a href="#" class="p-2 rounded-lg text-secondary hover:bg-secondary-container/30 transition-soft">
                    <span class="material-symbols-outlined text-base">edit</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script>
    const statusFilter = document.getElementById('filter-status');
    const kelasFilter = document.getElementById('filter-kelas');
    const rows = document.querySelectorAll('div[data-status][data-kelas]');

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
