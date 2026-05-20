@extends('layouts.guru')
@section('title', 'Kelas Saya - SMK Mandalahayu 1')
@section('content')
@php
$kelas = [
    [
        'id'        => 1,
        'nama'      => 'X TKJ 1',
        'mapel'     => 'Jaringan Komputer',
        'ruang'     => 'Lab Komputer 1',
        'jadwal'    => 'Senin & Rabu, 08.00–10.00 WIB',
        'siswa'     => 32,
        'materi'    => 8,
        'tugas'     => 3,
        'progress'  => 65,
        'warna'     => 'bg-primary-container',
        'teks'      => 'text-on-primary-container',
        'icon'      => 'computer',
    ],
    [
        'id'        => 2,
        'nama'      => 'X TKJ 2',
        'mapel'     => 'Jaringan Komputer',
        'ruang'     => 'Lab Komputer 2',
        'jadwal'    => 'Selasa & Kamis, 08.00–10.00 WIB',
        'siswa'     => 30,
        'materi'    => 8,
        'tugas'     => 3,
        'progress'  => 60,
        'warna'     => 'bg-secondary-container',
        'teks'      => 'text-on-secondary-container',
        'icon'      => 'computer',
    ],
    [
        'id'        => 3,
        'nama'      => 'XI TKJ 1',
        'mapel'     => 'Administrasi Server',
        'ruang'     => 'Lab Jaringan',
        'jadwal'    => 'Senin & Jumat, 10.00–12.00 WIB',
        'siswa'     => 25,
        'materi'    => 12,
        'tugas'     => 4,
        'progress'  => 80,
        'warna'     => 'bg-tertiary-container',
        'teks'      => 'text-on-tertiary-container',
        'icon'      => 'computer',
    ],
    [
        'id'        => 4,
        'nama'      => 'XI TKJ 2',
        'mapel'     => 'Administrasi Server',
        'ruang'     => 'Lab Jaringan',
        'jadwal'    => 'Rabu & Jumat, 10.00–12.00 WIB',
        'siswa'     => 28,
        'materi'    => 12,
        'tugas'     => 4,
        'progress'  => 75,
        'warna'     => 'bg-primary-container',
        'teks'      => 'text-on-primary-container',
        'icon'      => 'computer',
    ],
    [
        'id'        => 5,
        'nama'      => 'XII TKJ 1',
        'mapel'     => 'Keamanan Jaringan',
        'ruang'     => 'Lab Komputer 1',
        'jadwal'    => 'Selasa & Kamis, 13.00–15.00 WIB',
        'siswa'     => 22,
        'materi'    => 15,
        'tugas'     => 5,
        'progress'  => 90,
        'warna'     => 'bg-secondary-container',
        'teks'      => 'text-on-secondary-container',
        'icon'      => 'computer',
    ],
];
@endphp

<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Kelas Saya</h2>
        <p class="text-on-surface-variant mt-1">Daftar kelas yang Anda ampu semester ini.</p>
    </div>
    <a href="{{ route('guru.kelas.buat') }}" class="bg-secondary text-on-secondary font-bold py-3 px-6 rounded-xl flex items-center gap-2 transition-soft hover:brightness-110">
        <span class="material-symbols-outlined">add</span> Buat Kelas Baru
    </a>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-secondary-container/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary">school</span>
        </div>
        <div>
            <p class="text-2xl font-bold text-primary">{{ count($kelas) }}</p>
            <p class="text-xs text-on-surface-variant">Total Kelas</p>
        </div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-primary-container/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary">groups</span>
        </div>
        <div>
            <p class="text-2xl font-bold text-primary">{{ array_sum(array_column($kelas, 'siswa')) }}</p>
            <p class="text-xs text-on-surface-variant">Total Siswa</p>
        </div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-secondary-container/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary">book</span>
        </div>
        <div>
            <p class="text-2xl font-bold text-primary">{{ array_sum(array_column($kelas, 'materi')) }}</p>
            <p class="text-xs text-on-surface-variant">Total Materi</p>
        </div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-amber-600">assignment</span>
        </div>
        <div>
            <p class="text-2xl font-bold text-amber-600">{{ array_sum(array_column($kelas, 'tugas')) }}</p>
            <p class="text-xs text-on-surface-variant">Total Tugas Aktif</p>
        </div>
    </div>
</div>

{{-- Kelas Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @foreach($kelas as $k)
    <div class="bg-surface rounded-2xl border border-outline-variant/30 shadow-sm hover:shadow-md transition-soft overflow-hidden group">

        {{-- Card Header --}}
        <a href="{{ route('guru.kelas.detail') }}" class="block {{ $k['warna'] }} p-6 flex justify-between items-start relative overflow-hidden group-hover:brightness-95 transition-soft">
            <div>
                <p class="text-xs font-bold uppercase tracking-widest {{ $k['teks'] }} opacity-70">{{ $k['mapel'] }}</p>
                <h3 class="font-bold text-2xl {{ $k['teks'] }} mt-1" style="font-family: var(--font-serif)">{{ $k['nama'] }}</h3>
                <p class="text-xs {{ $k['teks'] }} opacity-60 mt-1 flex items-center gap-1">
                    <span class="material-symbols-outlined" style="font-size:14px">location_on</span>
                    {{ $k['ruang'] }}
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-soft">
                <span class="material-symbols-outlined text-3xl {{ $k['teks'] }}">{{ $k['icon'] }}</span>
            </div>
            {{-- Decorative circle --}}
            <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-white/10 group-hover:scale-110 transition-soft"></div>
        </a>

        {{-- Jadwal --}}
        <div class="px-6 py-3 bg-surface-container-low border-b border-outline-variant/20 flex items-center gap-2">
            <span class="material-symbols-outlined text-on-surface-variant" style="font-size:16px">schedule</span>
            <span class="text-xs text-on-surface-variant">{{ $k['jadwal'] }}</span>
        </div>

        {{-- Stats Row --}}
        <div class="px-6 py-4 grid grid-cols-3 gap-4 text-center border-b border-outline-variant/20">
            <div>
                <p class="text-lg font-bold text-primary">{{ $k['siswa'] }}</p>
                <p class="text-xs text-on-surface-variant">Siswa</p>
            </div>
            <div>
                <p class="text-lg font-bold text-secondary">{{ $k['materi'] }}</p>
                <p class="text-xs text-on-surface-variant">Materi</p>
            </div>
            <div>
                <p class="text-lg font-bold text-amber-600">{{ $k['tugas'] }}</p>
                <p class="text-xs text-on-surface-variant">Tugas</p>
            </div>
        </div>

        {{-- Progress --}}
        <div class="px-6 py-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-xs text-on-surface-variant font-bold">Progress Materi</span>
                <span class="text-xs font-bold text-secondary">{{ $k['progress'] }}%</span>
            </div>
            <div class="w-full h-2 bg-surface-variant rounded-full overflow-hidden">
                <div class="h-full rounded-full bg-secondary transition-all duration-500" style="width: {{ $k['progress'] }}%"></div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="px-6 pb-5 flex gap-3">
            <a href="{{ route('guru.kelas.detail') }}?tab=materi" class="flex-1 text-center py-2.5 bg-secondary text-on-secondary text-xs font-bold rounded-xl hover:brightness-110 transition-soft flex items-center justify-center gap-1">
                <span class="material-symbols-outlined" style="font-size:16px">book</span> Materi
            </a>
            <a href="{{ route('guru.kelas.detail') }}?tab=tugas" class="flex-1 text-center py-2.5 border border-secondary text-secondary text-xs font-bold rounded-xl hover:bg-secondary/5 transition-soft flex items-center justify-center gap-1">
                <span class="material-symbols-outlined" style="font-size:16px">assignment</span> Tugas
            </a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
