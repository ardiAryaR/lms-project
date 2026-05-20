@extends('layouts.guru')
@section('title', 'Penilaian Ujian - SMK Mandalahayu 1')
@section('content')
<div class="mb-8">
    <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Penilaian Pengumpulan Ujian</h2>
    <p class="text-on-surface-variant mt-1">Berikan nilai untuk jawaban ujian yang telah dikumpulkan siswa.</p>
</div>
<div class="bg-surface-container-lowest rounded-xl shadow-ambient border border-outline-variant/30 p-8 text-center">
    <span class="material-symbols-outlined text-6xl text-primary/20 mb-4" style="display:block;">grading</span>
    <p class="text-on-surface-variant">Daftar pengumpulan ujian akan ditampilkan di sini.</p>
</div>
@endsection
