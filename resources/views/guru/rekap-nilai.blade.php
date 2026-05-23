@extends('layouts.guru')
@section('title', 'Rekap Nilai - SMK Mandalahayu 1')
@section('content')
@php
$rekap = [
    ['nama'=>'Ahmad Fauzi','nis'=>'2025001','kelas'=>'X TKJ 1','tugas'=>88,'kuis'=>92,'ujian'=>85,'rata'=>88.3,'predikat'=>'A','lulus'=>true],
    ['nama'=>'Budi Santoso','nis'=>'2025002','kelas'=>'X TKJ 1','tugas'=>75,'kuis'=>80,'ujian'=>78,'rata'=>77.7,'predikat'=>'B+','lulus'=>true],
    ['nama'=>'Citra Dewi','nis'=>'2025003','kelas'=>'X TKJ 1','tugas'=>92,'kuis'=>95,'ujian'=>90,'rata'=>92.3,'predikat'=>'A','lulus'=>true],
    ['nama'=>'Danu Prasetyo','nis'=>'2025004','kelas'=>'X TKJ 1','tugas'=>65,'kuis'=>70,'ujian'=>72,'rata'=>69.0,'predikat'=>'B-','lulus'=>false],
    ['nama'=>'Eka Rahayu','nis'=>'2025005','kelas'=>'X TKJ 1','tugas'=>80,'kuis'=>85,'ujian'=>82,'rata'=>82.3,'predikat'=>'B+','lulus'=>true],
    ['nama'=>'Fani Kurniawan','nis'=>'2025006','kelas'=>'X TKJ 2','tugas'=>70,'kuis'=>75,'ujian'=>68,'rata'=>71.0,'predikat'=>'B','lulus'=>true],
    ['nama'=>'Gilang Permana','nis'=>'2025007','kelas'=>'X TKJ 2','tugas'=>95,'kuis'=>90,'ujian'=>93,'rata'=>92.7,'predikat'=>'A','lulus'=>true],
    ['nama'=>'Hana Sari','nis'=>'2025008','kelas'=>'X TKJ 2','tugas'=>82,'kuis'=>78,'ujian'=>80,'rata'=>80.0,'predikat'=>'B+','lulus'=>true],
    ['nama'=>'Irfan Maulana','nis'=>'2025009','kelas'=>'XI TKJ 1','tugas'=>60,'kuis'=>65,'ujian'=>58,'rata'=>61.0,'predikat'=>'C','lulus'=>false],
    ['nama'=>'Joko Widodo','nis'=>'2025010','kelas'=>'XI TKJ 1','tugas'=>88,'kuis'=>84,'ujian'=>90,'rata'=>87.3,'predikat'=>'A','lulus'=>true],
];
$lulus = count(array_filter($rekap, fn($r) => $r['lulus']));
$tidakLulus = count($rekap) - $lulus;
$rataRata = round(array_sum(array_column($rekap,'rata')) / count($rekap), 1);
@endphp

<div class="mb-8 flex justify-between items-center flex-wrap gap-4">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Rekap Nilai Siswa</h2>
        <p class="text-on-surface-variant mt-1">Ringkasan lengkap nilai seluruh siswa per semester.</p>
    </div>
    <div class="flex gap-3">
        <a href="#" class="border border-secondary text-secondary font-bold py-2 px-4 rounded-xl flex items-center gap-2 text-sm hover:bg-secondary/5 transition-soft">
            <span class="material-symbols-outlined text-base">print</span> Cetak
        </a>
        <a href="#" class="bg-secondary text-on-secondary font-bold py-2 px-4 rounded-xl flex items-center gap-2 text-sm hover:brightness-110 transition-soft">
            <span class="material-symbols-outlined text-base">download</span> Export Excel
        </a>
    </div>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 text-center">
        <p class="text-3xl font-bold text-primary">{{ count($rekap) }}</p>
        <p class="text-xs text-on-surface-variant mt-1">Total Siswa</p>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 text-center">
        <p class="text-3xl font-bold text-green-600">{{ $lulus }}</p>
        <p class="text-xs text-on-surface-variant mt-1">Lulus KKM</p>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 text-center">
        <p class="text-3xl font-bold text-red-500">{{ $tidakLulus }}</p>
        <p class="text-xs text-on-surface-variant mt-1">Tidak Lulus KKM</p>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 text-center">
        <p class="text-3xl font-bold text-secondary">{{ $rataRata }}</p>
        <p class="text-xs text-on-surface-variant mt-1">Rata-rata Kelas</p>
    </div>
</div>

<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <div class="p-4 bg-surface-container-low border-b border-surface-variant flex flex-wrap gap-4">
        <select class="bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm flex-1 focus:outline-none">
            <option>Semua Kelas</option><option>X TKJ 1</option><option>X TKJ 2</option><option>XI TKJ 1</option>
        </select>
        <select class="bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm flex-1 focus:outline-none">
            <option>Semua Predikat</option><option>A</option><option>B+</option><option>B</option><option>C</option>
        </select>
    </div>
    <table class="w-full text-left">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">No</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Siswa</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">NIS</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Tugas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Kuis</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Ujian</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Rata-rata</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Predikat</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            @foreach($rekap as $i => $r)
            @php
                $warna = $r['predikat']==='A' ? 'bg-green-100 text-green-700' : ($r['rata']>=80 ? 'bg-secondary-container/40 text-secondary' : ($r['rata']>=70 ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700'));
            @endphp
            <tr class="hover:bg-surface-container transition-soft {{ !$r['lulus'] ? 'bg-red-50/30' : '' }}">
                <td class="p-4 text-on-surface-variant text-sm">{{ $i+1 }}</td>
                <td class="p-4 font-bold text-primary">{{ $r['nama'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $r['nis'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $r['kelas'] }}</td>
                <td class="p-4 text-center font-bold">{{ $r['tugas'] }}</td>
                <td class="p-4 text-center font-bold">{{ $r['kuis'] }}</td>
                <td class="p-4 text-center font-bold">{{ $r['ujian'] }}</td>
                <td class="p-4 text-center"><span class="font-bold text-lg text-primary">{{ $r['rata'] }}</span></td>
                <td class="p-4 text-center"><span class="px-3 py-1 rounded-full text-xs font-bold {{ $warna }}">{{ $r['predikat'] }}</span></td>
                <td class="p-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $r['lulus'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $r['lulus'] ? 'Lulus' : 'Remedi' }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
