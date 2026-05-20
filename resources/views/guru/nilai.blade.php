@extends('layouts.guru')
@section('title', 'Nilai & Rekap - SMK Mandalahayu 1')
@section('content')
@php
$siswa = [
    ['nama'=>'Ahmad Fauzi','kelas'=>'X TKJ 1','tugas'=>88,'kuis'=>92,'ujian'=>85,'rata'=>88.3,'predikat'=>'A'],
    ['nama'=>'Budi Santoso','kelas'=>'X TKJ 1','tugas'=>75,'kuis'=>80,'ujian'=>78,'rata'=>77.7,'predikat'=>'B+'],
    ['nama'=>'Citra Dewi','kelas'=>'X TKJ 1','tugas'=>92,'kuis'=>95,'ujian'=>90,'rata'=>92.3,'predikat'=>'A'],
    ['nama'=>'Danu Prasetyo','kelas'=>'X TKJ 1','tugas'=>65,'kuis'=>70,'ujian'=>72,'rata'=>69.0,'predikat'=>'B-'],
    ['nama'=>'Eka Rahayu','kelas'=>'X TKJ 1','tugas'=>80,'kuis'=>85,'ujian'=>82,'rata'=>82.3,'predikat'=>'B+'],
    ['nama'=>'Fani Kurniawan','kelas'=>'X TKJ 2','tugas'=>70,'kuis'=>75,'ujian'=>68,'rata'=>71.0,'predikat'=>'B'],
    ['nama'=>'Gilang Permana','kelas'=>'X TKJ 2','tugas'=>95,'kuis'=>90,'ujian'=>93,'rata'=>92.7,'predikat'=>'A'],
    ['nama'=>'Hana Sari','kelas'=>'X TKJ 2','tugas'=>82,'kuis'=>78,'ujian'=>80,'rata'=>80.0,'predikat'=>'B+'],
];
@endphp

<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Nilai & Rekap</h2>
        <p class="text-on-surface-variant mt-1">Rekap nilai seluruh siswa per kelas dan mata pelajaran.</p>
    </div>
    <a href="{{ route('guru.nilai.rekap') }}" class="bg-secondary text-on-secondary font-bold py-3 px-6 rounded-xl flex items-center gap-2 transition-soft hover:brightness-110">
        <span class="material-symbols-outlined">download</span> Export Rekap
    </a>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-secondary-container/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary">groups</span>
        </div>
        <div><p class="text-2xl font-bold text-primary">137</p><p class="text-xs text-on-surface-variant">Total Siswa</p></div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-green-600">trending_up</span>
        </div>
        <div><p class="text-2xl font-bold text-green-600">82.4</p><p class="text-xs text-on-surface-variant">Rata-rata Kelas</p></div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-amber-600">emoji_events</span>
        </div>
        <div><p class="text-2xl font-bold text-amber-600">95</p><p class="text-xs text-on-surface-variant">Nilai Tertinggi</p></div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-red-500">warning</span>
        </div>
        <div><p class="text-2xl font-bold text-red-500">3</p><p class="text-xs text-on-surface-variant">Di Bawah KKM</p></div>
    </div>
</div>

<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <div class="p-4 bg-surface-container-low border-b border-surface-variant flex flex-wrap gap-4">
        <select class="bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm flex-1 focus:outline-none focus:border-secondary">
            <option>Semua Kelas</option><option>X TKJ 1</option><option>X TKJ 2</option><option>XI TKJ 1</option>
        </select>
        <select class="bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm flex-1 focus:outline-none">
            <option>Semester Genap 2024/2025</option><option>Semester Ganjil 2024/2025</option>
        </select>
        <a href="{{ route('guru.nilai.rekap') }}" class="bg-secondary text-on-secondary font-bold py-2 px-4 rounded-lg text-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-base">table_chart</span> Rekap Lengkap
        </a>
    </div>
    <table class="w-full text-left">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Siswa</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Tugas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Kuis</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Ujian</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Rata-rata</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Predikat</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            @foreach($siswa as $s)
            @php $warna = $s['predikat']==='A' ? 'bg-green-100 text-green-700' : ($s['rata']>=80 ? 'bg-secondary-container/40 text-secondary' : ($s['rata']>=70 ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700')); @endphp
            <tr class="hover:bg-surface-container transition-soft">
                <td class="p-4 font-bold text-primary">{{ $s['nama'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $s['kelas'] }}</td>
                <td class="p-4 text-center font-bold">{{ $s['tugas'] }}</td>
                <td class="p-4 text-center font-bold">{{ $s['kuis'] }}</td>
                <td class="p-4 text-center font-bold">{{ $s['ujian'] }}</td>
                <td class="p-4 text-center"><span class="font-bold text-lg text-primary">{{ $s['rata'] }}</span></td>
                <td class="p-4 text-center"><span class="px-3 py-1 rounded-full text-xs font-bold {{ $warna }}">{{ $s['predikat'] }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
