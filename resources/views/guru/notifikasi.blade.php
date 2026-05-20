@extends('layouts.guru')
@section('title', 'Notifikasi - SMK Mandalahayu 1')
@section('content')
@php
$notifikasi = [
    ['ikon'=>'assignment_turned_in','warna'=>'text-green-600 bg-green-100','judul'=>'Tugas Dikumpulkan','pesan'=>'Ahmad Fauzi mengumpulkan tugas "Instalasi Sistem Operasi Linux"','waktu'=>'5 menit lalu','baru'=>true],
    ['ikon'=>'assignment_turned_in','warna'=>'text-green-600 bg-green-100','judul'=>'Tugas Dikumpulkan','pesan'=>'Budi Santoso mengumpulkan tugas "Konfigurasi Router Cisco"','waktu'=>'12 menit lalu','baru'=>true],
    ['ikon'=>'quiz','warna'=>'text-secondary bg-secondary-container/30','judul'=>'Kuis Selesai Dikerjakan','pesan'=>'28 dari 32 siswa X TKJ 1 telah menyelesaikan Kuis Topologi Jaringan','waktu'=>'1 jam lalu','baru'=>true],
    ['ikon'=>'schedule','warna'=>'text-amber-600 bg-amber-100','judul'=>'Pengingat Deadline','pesan'=>'Deadline tugas "Instalasi Sistem Operasi Linux" tinggal 1 hari lagi','waktu'=>'2 jam lalu','baru'=>false],
    ['ikon'=>'person_add','warna'=>'text-blue-600 bg-blue-100','judul'=>'Siswa Baru Bergabung','pesan'=>'Dewi Rahayu telah bergabung ke kelas X TKJ 1','waktu'=>'3 jam lalu','baru'=>false],
    ['ikon'=>'grading','warna'=>'text-purple-600 bg-purple-100','judul'=>'Perlu Penilaian','pesan'=>'5 tugas "Desain Topologi Jaringan" belum dinilai','waktu'=>'5 jam lalu','baru'=>false],
    ['ikon'=>'event','warna'=>'text-primary bg-primary-container/30','judul'=>'Pengumuman Sekolah','pesan'=>'Rapat koordinasi guru dijadwalkan besok pukul 13.00 WIB','waktu'=>'1 hari lalu','baru'=>false],
    ['ikon'=>'task_alt','warna'=>'text-green-600 bg-green-100','judul'=>'Ujian Selesai','pesan'=>'UAS Administrasi Server kelas XI TKJ 1 telah selesai dilaksanakan','waktu'=>'2 hari lalu','baru'=>false],
];
@endphp

<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Notifikasi</h2>
        <p class="text-on-surface-variant mt-1">Semua notifikasi dan pengumuman terbaru.</p>
    </div>
    <div class="flex gap-3">
        <span class="bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-2 rounded-full">3 Belum Dibaca</span>
        <button class="text-sm text-secondary font-bold hover:underline">Tandai Semua Dibaca</button>
    </div>
</div>

<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <div class="divide-y divide-surface-variant">
        @foreach($notifikasi as $n)
        <div class="flex items-start gap-4 p-5 hover:bg-surface-container transition-soft {{ $n['baru'] ? 'bg-secondary-container/5' : '' }}">
            <div class="w-12 h-12 rounded-full {{ $n['warna'] }} flex items-center justify-center flex-shrink-0 mt-1">
                <span class="material-symbols-outlined text-xl">{{ $n['ikon'] }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-bold text-on-surface text-sm">{{ $n['judul'] }}
                            @if($n['baru'])
                            <span class="inline-block w-2 h-2 rounded-full bg-secondary ml-2 align-middle"></span>
                            @endif
                        </p>
                        <p class="text-sm text-on-surface-variant mt-1">{{ $n['pesan'] }}</p>
                    </div>
                    <span class="text-xs text-on-surface-variant whitespace-nowrap">{{ $n['waktu'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
