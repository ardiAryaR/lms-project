@extends('layouts.guru')
@section('title', 'Penilaian Tugas - SMK Mandalahayu 1')
@section('content')
<div class="mb-8">
    <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Penilaian Pengumpulan Tugas</h2>
    <p class="text-on-surface-variant mt-1">Berikan nilai dan feedback untuk tugas yang telah dikumpulkan.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-surface-container-lowest rounded-2xl p-8 shadow-ambient border border-outline-variant/30">
        <div class="flex items-start gap-4 mb-6 pb-6 border-b border-outline-variant/30">
            <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold text-lg">AF</div>
            <div>
                <h3 class="font-bold text-xl text-on-surface">Ahmad Fauzi</h3>
                <p class="text-on-surface-variant text-sm">X TKJ 1 • Dikumpulkan: Kemarin, 20:15</p>
            </div>
        </div>
        <div class="bg-surface-container rounded-xl p-6 mb-6">
            <p class="text-xs font-bold uppercase tracking-wider text-primary mb-2">File Tugas</p>
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-error">picture_as_pdf</span>
                <span class="text-on-surface font-bold">laporan_praktikum_fauzi.pdf</span>
                <a href="#" class="ml-auto text-secondary text-xs font-bold hover:underline">Unduh</a>
            </div>
        </div>
        <form method="POST" action="#">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-2" for="nilai">Nilai (0-100)</label>
                <input class="w-32 bg-surface-container-low border-0 border-b-2 border-primary focus:border-secondary focus:ring-0 text-2xl font-bold text-center transition-soft px-4 py-3"
                       id="nilai" name="nilai" type="number" min="0" max="100" placeholder="85"/>
            </div>
            <div class="mb-6">
                <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-2" for="feedback">Feedback</label>
                <textarea class="w-full bg-surface-container-low border-0 border-b-2 border-primary focus:border-secondary focus:ring-0 transition-soft px-4 py-3 resize-none"
                          id="feedback" name="feedback" rows="4" placeholder="Tulis catatan atau feedback untuk siswa..."></textarea>
            </div>
            <button type="submit" class="bg-secondary text-on-secondary font-bold py-3 px-8 rounded-xl flex items-center gap-2 hover:brightness-110 transition-soft">
                <span class="material-symbols-outlined">save</span> Simpan Penilaian
            </button>
        </form>
    </div>
    <div class="bg-surface-container-lowest rounded-2xl p-6 shadow-ambient border border-outline-variant/30 h-fit">
        <h3 class="font-bold text-lg text-primary mb-4">Info Tugas</h3>
        <div class="space-y-3 text-sm">
            <div><p class="text-xs text-on-surface-variant uppercase">Nama Tugas</p><p class="font-bold">Laporan Praktikum Jaringan</p></div>
            <div><p class="text-xs text-on-surface-variant uppercase">Kelas</p><p class="font-bold">X TKJ 1</p></div>
            <div><p class="text-xs text-on-surface-variant uppercase">Tenggat</p><p class="font-bold text-error">Kemarin, 23:59</p></div>
            <div><p class="text-xs text-on-surface-variant uppercase">Sudah Dinilai</p><p class="font-bold">5 / 30 Siswa</p></div>
        </div>
    </div>
</div>
@endsection
