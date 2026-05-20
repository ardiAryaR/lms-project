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

{{-- Stats --}}
<div class="grid grid-cols-3 gap-4 mb-8">
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-secondary-container/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-secondary">edit_calendar</span>
        </div>
        <div><p class="text-2xl font-bold text-primary">5</p><p class="text-xs text-on-surface-variant">Total Ujian</p></div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-amber-600">schedule</span>
        </div>
        <div><p class="text-2xl font-bold text-amber-600">3</p><p class="text-xs text-on-surface-variant">Terjadwal</p></div>
    </div>
    <div class="bg-surface rounded-xl border border-outline-variant/30 p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-green-600">task_alt</span>
        </div>
        <div><p class="text-2xl font-bold text-green-600">2</p><p class="text-xs text-on-surface-variant">Selesai</p></div>
    </div>
</div>

<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Judul Ujian</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Tanggal & Waktu</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Durasi</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Peserta</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Status</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            @foreach($ujian as $u)
            <tr class="hover:bg-surface-container transition-soft">
                <td class="p-4 font-bold text-on-surface">{{ $u['judul'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">{{ $u['kelas'] }}</td>
                <td class="p-4 text-sm text-on-surface-variant">
                    <p class="font-bold text-on-surface">{{ $u['tanggal'] }}</p>
                    <p>{{ $u['waktu'] }}</p>
                </td>
                <td class="p-4 text-center text-sm">{{ $u['durasi'] }}</td>
                <td class="p-4 text-center font-bold text-primary">{{ $u['peserta'] }}</td>
                <td class="p-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $u['status']==='selesai' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ ucfirst($u['status']) }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex gap-2 justify-center">
                        <a href="#" class="p-2 rounded-lg text-secondary hover:bg-secondary-container/30 transition-soft"><span class="material-symbols-outlined text-base">edit</span></a>
                        <a href="{{ route('guru.penilaian.ujian') }}" class="p-2 rounded-lg text-primary hover:bg-primary-container/30 transition-soft"><span class="material-symbols-outlined text-base">grading</span></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
