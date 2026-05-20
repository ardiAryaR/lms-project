@extends('layouts.guru')
@section('title', 'Buat Kelas Baru - SMK Mandalahayu 1')

@section('content')
<div class="max-w-[1000px] w-full">
    {{-- Breadcrumbs --}}
    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-4">
        <a href="{{ route('guru.dashboard') }}" class="hover:text-primary transition-soft">Dashboard</a>
        <span class="material-symbols-outlined" style="font-size: 14px">chevron_right</span>
        <a href="{{ route('guru.kelas') }}" class="hover:text-primary transition-soft">Kelas Saya</a>
        <span class="material-symbols-outlined" style="font-size: 14px">chevron_right</span>
        <span class="font-bold text-primary">Buat Kelas Baru</span>
    </div>

    {{-- Page Header --}}
    <div class="mb-4">
        <h1 class="font-bold text-2xl text-[#50290b] mb-1" style="font-family: var(--font-serif)">Buat Kelas Baru</h1>
        <p class="text-xs text-[#51443c] max-w-2xl">Mulai perjalanan akademik baru. Isi formulir di bawah ini untuk mendaftarkan kelas resmi di sistem Portal Guru.</p>
    </div>

    {{-- Form Card --}}
    <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-4 md:p-6 shadow-sm">
        <form action="{{ route('guru.kelas') }}" method="GET">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                {{-- Nama Kelas --}}
                <div>
                    <label class="block text-xs font-bold text-[#51443c] mb-1">Nama Kelas</label>
                    <input type="text" placeholder="Contoh: XII RPL 1 - Pengembangan Web" class="w-full bg-[#f8f3ed] border-none rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#835500] text-sm text-[#50290b] placeholder-[#84746b]">
                </div>
                {{-- Semester/Periode --}}
                <div class="relative">
                    <label class="block text-xs font-bold text-[#51443c] mb-1">Semester/Periode</label>
                    <div class="relative">
                        <select class="w-full bg-[#f8f3ed] border-none rounded-lg pl-3 pr-8 py-2 focus:ring-2 focus:ring-[#835500] text-sm text-[#50290b] appearance-none cursor-pointer">
                            <option>Pilih Semester</option>
                            <option>Ganjil 2023/2024</option>
                            <option>Genap 2023/2024</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-[#84746b] pointer-events-none" style="font-size: 18px">expand_more</span>
                    </div>
                </div>
            </div>

            {{-- Deskripsi Kelas --}}
            <div class="mb-4">
                <label class="block text-xs font-bold text-[#51443c] mb-1">Deskripsi Kelas</label>
                <textarea rows="2" placeholder="Jelaskan tujuan dan cakupan materi kelas ini..." class="w-full bg-[#f8f3ed] border-none rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#835500] text-sm text-[#50290b] placeholder-[#84746b] resize-none"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                {{-- Guru Pengampu --}}
                <div>
                    <label class="block text-xs font-bold text-[#51443c] mb-1">Guru Pengampu</label>
                    <div class="relative">
                        <select class="w-full bg-[#f8f3ed] border-none rounded-lg pl-3 pr-8 py-2 focus:ring-2 focus:ring-[#835500] text-sm text-[#50290b] appearance-none cursor-pointer">
                            <option>Siti Aminah, S.Kom (Saya)</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-[#84746b] pointer-events-none" style="font-size: 18px">expand_more</span>
                    </div>
                </div>
                {{-- Class Key --}}
                <div>
                    <label class="block text-xs font-bold text-[#51443c] mb-1">Class Key</label>
                    <div class="flex gap-2">
                        <div class="relative flex-1">
                            <input type="text" id="classKeyInput" placeholder="MNDLH-XXXX" class="w-full bg-[#f8f3ed] border-none rounded-lg pl-3 pr-14 py-2 focus:ring-2 focus:ring-[#835500] text-sm font-mono tracking-wider text-[#50290b] placeholder-[#84746b]/50">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] font-bold text-[#84746b] uppercase tracking-widest">Sistem</span>
                        </div>
                        <button type="button" onclick="generateClassKey()" class="px-3 py-2 border border-[#835500] text-[#835500] font-bold text-xs rounded-lg flex items-center justify-center gap-1 hover:bg-[#835500]/5 transition-soft flex-shrink-0">
                            <span class="material-symbols-outlined" style="font-size: 16px">refresh</span> Generate
                        </button>
                    </div>
                </div>
            </div>

            {{-- Status Kelas --}}
            <div class="mb-4">
                <label class="block text-xs font-bold text-[#51443c] mb-2">Status Kelas</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                    {{-- Draft (Active) --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" name="status" value="draft" class="peer sr-only" checked>
                        <div class="w-full h-full bg-[#f8f3ed] border-2 border-transparent rounded-xl flex items-center justify-center py-2 gap-1 text-[#51443c] peer-checked:bg-[#fef9f3] peer-checked:border-[#835500] peer-checked:text-[#50290b] transition-soft hover:bg-[#e6e2dc]">
                            <span class="material-symbols-outlined" style="font-size: 18px">draft</span>
                            <span class="text-xs font-semibold">Draft</span>
                        </div>
                    </label>
                    {{-- Active --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" name="status" value="active" class="peer sr-only">
                        <div class="w-full h-full bg-[#f8f3ed] border-2 border-transparent rounded-xl flex items-center justify-center py-2 gap-1 text-[#51443c] peer-checked:bg-[#fef9f3] peer-checked:border-[#835500] peer-checked:text-[#50290b] transition-soft hover:bg-[#e6e2dc]">
                            <span class="material-symbols-outlined" style="font-size: 18px">check_circle</span>
                            <span class="text-xs font-semibold">Active</span>
                        </div>
                    </label>
                    {{-- Closed --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" name="status" value="closed" class="peer sr-only">
                        <div class="w-full h-full bg-[#f8f3ed] border-2 border-transparent rounded-xl flex items-center justify-center py-2 gap-1 text-[#51443c] peer-checked:bg-[#fef9f3] peer-checked:border-[#835500] peer-checked:text-[#50290b] transition-soft hover:bg-[#e6e2dc]">
                            <span class="material-symbols-outlined" style="font-size: 18px">lock</span>
                            <span class="text-xs font-semibold">Closed</span>
                        </div>
                    </label>
                    {{-- Archived --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" name="status" value="archived" class="peer sr-only">
                        <div class="w-full h-full bg-[#f8f3ed] border-2 border-transparent rounded-xl flex items-center justify-center py-2 gap-1 text-[#51443c] peer-checked:bg-[#fef9f3] peer-checked:border-[#835500] peer-checked:text-[#50290b] transition-soft hover:bg-[#e6e2dc]">
                            <span class="material-symbols-outlined" style="font-size: 18px">inventory_2</span>
                            <span class="text-xs font-semibold">Archived</span>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Footer Buttons --}}
            <div class="border-t border-outline-variant/30 pt-4 flex flex-col-reverse sm:flex-row justify-end gap-3">
                <a href="{{ route('guru.kelas') }}" class="px-6 py-2 border border-[#d6c3b8] text-[#51443c] text-sm text-center font-bold rounded-lg hover:bg-[#f8f3ed] transition-soft">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-[#feae2c] text-[#6b4500] text-sm font-bold rounded-lg flex items-center justify-center gap-1 hover:brightness-110 transition-soft">
                    <span class="material-symbols-outlined" style="font-size: 18px">save</span> Simpan Kelas
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function generateClassKey() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = 'MNDLH-';
        for (let i = 0; i < 4; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        document.getElementById('classKeyInput').value = result;
    }
</script>
@endsection
