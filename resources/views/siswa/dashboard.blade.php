@extends('layouts.siswa')

@section('title', 'Dashboard Siswa - SMK Mandalahayu 1')
@section('page-title', 'Dashboard')

@section('content')
{{-- Greeting Section --}}
<section class="bg-surface-container rounded-xl p-8 border border-outline-variant/30 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
    <div>
        <h2 class="font-bold text-4xl text-primary mb-2" style="font-family: var(--font-serif)">Selamat datang kembali, {{ Auth::user()->name ?? 'Budi' }}!</h2>
        <div class="flex items-center gap-3">
            <span class="bg-primary-fixed text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Semester Ganjil 2024/2025</span>
            <span class="text-on-surface-variant">•</span>
            <span class="text-on-surface-variant">Kelas XI TKJ 1</span>
        </div>
    </div>
    <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant/50 text-center min-w-[140px]">
        <p class="text-xs font-bold text-on-surface-variant uppercase mb-1">Status Kehadiran</p>
        <p class="font-bold text-2xl text-primary">98% <span class="text-xs font-normal text-on-surface-variant italic">Bulan ini</span></p>
    </div>
</section>

{{-- Quick Stats --}}
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/30 shadow-sm hover:shadow-md transition-soft">
        <div class="p-3 bg-primary-fixed w-fit rounded-lg text-primary mb-4"><span class="material-symbols-outlined">menu_book</span></div>
        <h3 class="text-on-surface-variant text-sm mb-1">Mata Pelajaran Aktif</h3>
        <p class="font-bold text-4xl text-primary">12</p>
    </div>
    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/30 shadow-sm hover:shadow-md transition-soft relative">
        <div class="absolute top-4 right-4"><span class="bg-error text-on-error px-2 py-1 rounded text-[10px] font-bold uppercase">Mendesak</span></div>
        <div class="p-3 bg-error-container w-fit rounded-lg text-on-error-container mb-4"><span class="material-symbols-outlined">assignment_late</span></div>
        <h3 class="text-on-surface-variant text-sm mb-1">Tugas Belum Dikerjakan</h3>
        <p class="font-bold text-4xl text-error">3</p>
    </div>
    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/30 shadow-sm hover:shadow-md transition-soft">
        <div class="p-3 bg-secondary-container w-fit rounded-lg text-on-secondary-container mb-4"><span class="material-symbols-outlined">schedule</span></div>
        <h3 class="text-on-surface-variant text-sm mb-1">Tugas Mendekati Deadline</h3>
        <p class="font-bold text-4xl text-primary">2</p>
    </div>
    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/30 shadow-sm hover:shadow-md transition-soft">
        <div class="p-3 bg-tertiary-fixed w-fit rounded-lg text-on-tertiary-fixed-variant mb-4"><span class="material-symbols-outlined">grade</span></div>
        <h3 class="text-on-surface-variant text-sm mb-1">Rata-rata Nilai</h3>
        <p class="font-bold text-4xl text-primary">88.5</p>
    </div>
</section>

{{-- Main Grid --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    {{-- Left: Tasks & Materials --}}
    <div class="lg:col-span-2 flex flex-col gap-10">
        {{-- Tugas Mendekati Deadline --}}
        <section>
            <div class="flex justify-between items-end mb-6">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Tugas Mendekati Deadline</h3>
                <a class="text-secondary font-semibold text-sm hover:underline" href="{{ route('siswa.tugas') }}">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                <div class="bg-surface-container-lowest p-5 rounded-xl border border-outline-variant/30 flex flex-col sm:flex-row sm:items-center justify-between gap-4 group hover:border-secondary transition-soft">
                    <div class="flex items-start gap-4">
                        <div class="bg-surface-container-high p-3 rounded-lg text-primary"><span class="material-symbols-outlined">computer</span></div>
                        <div>
                            <h4 class="font-bold text-lg text-on-surface">Instalasi Jaringan LAN</h4>
                            <p class="text-on-surface-variant text-sm">Administrasi Infrastruktur Jaringan</p>
                        </div>
                    </div>
                    <div class="flex sm:flex-col items-center sm:items-end gap-4 sm:gap-1">
                        <div class="text-error font-semibold text-xs flex items-center gap-1 bg-error-container/30 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-base">timer</span><span>Hari ini, 23:59</span>
                        </div>
                        <a href="{{ route('siswa.kumpul-tugas') }}" class="bg-secondary-container hover:bg-secondary text-on-secondary-container hover:text-white font-semibold px-6 py-2 rounded transition-soft text-sm">Kerjakan</a>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-5 rounded-xl border border-outline-variant/30 flex flex-col sm:flex-row sm:items-center justify-between gap-4 group hover:border-secondary transition-soft">
                    <div class="flex items-start gap-4">
                        <div class="bg-surface-container-high p-3 rounded-lg text-primary"><span class="material-symbols-outlined">calculate</span></div>
                        <div>
                            <h4 class="font-bold text-lg text-on-surface">Latihan Soal Matriks</h4>
                            <p class="text-on-surface-variant text-sm">Matematika Terapan</p>
                        </div>
                    </div>
                    <div class="flex sm:flex-col items-center sm:items-end gap-4 sm:gap-1">
                        <div class="text-secondary font-semibold text-xs flex items-center gap-1 bg-secondary-fixed/30 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-base">calendar_today</span><span>Besok, 12:00</span>
                        </div>
                        <a href="{{ route('siswa.kumpul-tugas') }}" class="bg-secondary-container hover:bg-secondary text-on-secondary-container hover:text-white font-semibold px-6 py-2 rounded transition-soft text-sm">Kerjakan</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Materi Terbaru --}}
        <section>
            <div class="flex justify-between items-end mb-6">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Materi Terbaru</h3>
                <a class="text-secondary font-semibold text-sm hover:underline" href="{{ route('siswa.materi') }}">Lihat Semua</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="{{ route('siswa.lihat-materi') }}" class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 overflow-hidden group hover:shadow-md transition-soft">
                    <div class="h-32 relative bg-primary-container">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-soft"></div>
                        <span class="absolute top-3 left-4 bg-primary/80 text-on-primary text-[10px] px-2 py-0.5 rounded uppercase tracking-widest font-bold">PDF</span>
                        <span class="absolute bottom-3 left-4 text-on-primary text-xs bg-black/40 px-2 py-1 rounded backdrop-blur-sm">Modul 4</span>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-on-surface mb-1 group-hover:text-secondary transition-soft">Konfigurasi Routing Dinamis</h4>
                        <p class="text-xs text-on-surface-variant">Bpk. Hendra • AIJ</p>
                    </div>
                </a>
                <a href="{{ route('siswa.lihat-materi') }}" class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 overflow-hidden group hover:shadow-md transition-soft">
                    <div class="h-32 relative bg-secondary-container">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-soft"></div>
                        <span class="absolute top-3 left-4 bg-secondary/80 text-on-secondary text-[10px] px-2 py-0.5 rounded uppercase tracking-widest font-bold">Video</span>
                        <span class="absolute bottom-3 left-4 text-on-primary text-xs bg-black/40 px-2 py-1 rounded backdrop-blur-sm">Video Tutorial</span>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-on-surface mb-1 group-hover:text-secondary transition-soft">Sejarah Kemerdekaan RI</h4>
                        <p class="text-xs text-on-surface-variant">Ibu Siska • Sejarah</p>
                    </div>
                </a>
            </div>
        </section>
    </div>

    {{-- Right: Notifications & Grades --}}
    <div class="flex flex-col gap-10">
        {{-- Notifikasi --}}
        <section class="bg-surface-container-low rounded-xl p-6 border border-outline-variant/40">
            <h3 class="font-bold text-2xl text-primary mb-6" style="font-family: var(--font-serif)">Notifikasi</h3>
            <div class="flex flex-col gap-6 relative">
                <div class="absolute left-[15px] top-2 bottom-2 w-px bg-outline-variant/50"></div>
                <div class="relative pl-10">
                    <div class="absolute left-0 top-0.5 w-[30px] h-[30px] bg-primary-fixed rounded-full flex items-center justify-center border-4 border-surface-container-low z-10 text-primary">
                        <span class="material-symbols-outlined text-sm">campaign</span>
                    </div>
                    <h4 class="font-semibold text-on-surface mb-0.5">Jadwal Ujian Tengah Semester</h4>
                    <p class="text-xs text-on-surface-variant mb-1">Jadwal UTS ganjil telah dirilis. Silakan cek menu Ujian.</p>
                    <span class="text-[10px] font-bold text-outline uppercase">2 jam yang lalu</span>
                </div>
                <div class="relative pl-10">
                    <div class="absolute left-0 top-0.5 w-[30px] h-[30px] bg-secondary-fixed rounded-full flex items-center justify-center border-4 border-surface-container-low z-10 text-secondary">
                        <span class="material-symbols-outlined text-sm">task_alt</span>
                    </div>
                    <h4 class="font-semibold text-on-surface mb-0.5">Nilai Tugas Masuk</h4>
                    <p class="text-xs text-on-surface-variant mb-1">Nilai untuk Tugas AIJ - Instalasi Server telah dinilai.</p>
                    <span class="text-[10px] font-bold text-outline uppercase">Kemarin</span>
                </div>
            </div>
            <a href="{{ route('siswa.notifikasi') }}" class="block w-full mt-8 py-2 text-center text-secondary text-sm font-semibold hover:bg-surface-variant/30 rounded-lg transition-soft border border-outline-variant/30">Lihat Semua Notifikasi</a>
        </section>

        {{-- Nilai Terbaru --}}
        <section class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/30 shadow-sm">
            <h3 class="font-bold text-2xl text-primary mb-5" style="font-family: var(--font-serif)">Nilai Terbaru</h3>
            <div class="flex flex-col gap-3">
                @foreach([['Bahasa Indonesia','Sumatif 1','92','primary'],['Matematika','Kuis Matriks','85','secondary'],['Pemrograman Dasar','Praktikum 2','95','primary'],['Pend. Agama','Tugas Mandiri','90','primary']] as [$mapel,$jenis,$nilai,$color])
                <div class="flex justify-between items-center p-3 rounded-lg bg-surface-container-low">
                    <div class="flex flex-col">
                        <span class="font-semibold text-on-surface text-sm">{{ $mapel }}</span>
                        <span class="text-[10px] text-on-surface-variant uppercase">{{ $jenis }}</span>
                    </div>
                    <div class="bg-{{ $color }}/10 text-{{ $color }} px-3 py-1 rounded font-bold border border-{{ $color }}/20">{{ $nilai }}</div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('siswa.nilai') }}" class="block w-full mt-4 text-center text-secondary text-sm font-semibold hover:underline py-1">Lihat Seluruh Nilai</a>
        </section>
    </div>
</div>
@endsection
