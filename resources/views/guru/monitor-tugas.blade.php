@extends('layouts.guru')
@section('title', 'Monitor Pengumpulan Tugas - SMK Mandalahayu 1')
@section('content')
<div class="mb-8">
    <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Monitor Pengumpulan Tugas</h2>
    <p class="text-on-surface-variant mt-1">Pantau status pengumpulan tugas dari seluruh siswa.</p>
</div>
<div class="bg-surface-container-lowest rounded-xl shadow-ambient border border-outline-variant/30 overflow-hidden">
    <div class="p-4 bg-surface-container-low border-b border-surface-variant flex gap-4">
        <input class="flex-1 bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-secondary" placeholder="Cari siswa..." type="text"/>
        <select class="bg-surface border border-outline-variant rounded-lg px-4 py-2 text-sm">
            <option>Semua Status</option><option>Sudah Mengumpulkan</option><option>Belum Mengumpulkan</option>
        </select>
    </div>
    <table class="w-full text-left">
        <thead class="bg-surface-container-low border-b border-surface-variant">
            <tr>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Siswa</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Kelas</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-center">Status</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Waktu Pengumpulan</th>
                <th class="p-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-surface-variant">
            <tr class="hover:bg-surface-container transition-soft">
                <td class="p-4 font-bold text-primary">Ahmad Fauzi</td>
                <td class="p-4 text-on-surface">X TKJ 1</td>
                <td class="p-4 text-center"><span class="bg-secondary-fixed text-on-secondary-fixed text-xs font-bold px-2 py-1 rounded-full">Sudah</span></td>
                <td class="p-4 text-on-surface-variant text-sm">Kemarin, 20:15</td>
                <td class="p-4 text-right"><a href="{{ route('guru.penilaian.tugas') }}" class="px-4 py-2 border-2 border-secondary text-secondary text-xs font-bold rounded-lg hover:bg-secondary hover:text-on-secondary transition-soft">Nilai</a></td>
            </tr>
            <tr class="hover:bg-surface-container transition-soft">
                <td class="p-4 font-bold text-primary">Budi Santoso</td>
                <td class="p-4 text-on-surface">X TKJ 1</td>
                <td class="p-4 text-center"><span class="bg-error-container text-on-error-container text-xs font-bold px-2 py-1 rounded-full">Belum</span></td>
                <td class="p-4 text-on-surface-variant text-sm">-</td>
                <td class="p-4 text-right"><span class="text-xs text-on-surface-variant">Belum dikumpulkan</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
