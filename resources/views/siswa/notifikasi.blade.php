@extends('layouts.siswa')
@section('title', 'Notifikasi - SMK Mandalahayu 1')
@section('page-title', 'Notifikasi')

@section('content')
<div class="space-y-4">
    <!-- Page Header -->
    <div class="border-b border-outline-variant/50 pb-3 mb-4">
        <h2 class="text-xl text-primary font-bold mb-1" style="font-family: var(--font-serif)">Notifikasi</h2>
        <p class="text-xs text-on-surface-variant">Pembaruan terbaru mengenai aktivitas akademik Anda.</p>
    </div>

    <!-- Notification List -->
    <div class="space-y-2" id="notification-container">
        <!-- 1 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 shadow-sm hover:shadow-md transition-all relative" data-id="1">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg"></div>
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-tertiary-fixed/30 flex items-center justify-center text-tertiary border border-tertiary-fixed">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">assignment</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-primary font-bold truncate">Tugas Baru: Proyek Akhir Semester</h3>
                    <span class="badge-new text-[9px] text-secondary font-bold flex items-center gap-1 uppercase tracking-wider bg-secondary-fixed/20 px-1.5 py-0.5 rounded border border-secondary/20 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span> Baru
                    </span>
                </div>
                <p class="text-[11px] text-on-surface leading-snug mb-1.5 line-clamp-2">Guru Budi Santoso memposting tugas baru untuk mata pelajaran Produktif RPL. Batas waktu pengumpulan adalah Jumat minggu depan.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 10 menit yang lalu
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(1)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-1" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(1)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(1)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 shadow-sm hover:shadow-md transition-all relative" data-id="2">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg"></div>
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-secondary-container/20 flex items-center justify-center text-on-secondary-container border border-secondary-container">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">grade</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-primary font-bold truncate">Nilai Dirilis: Ulangan Harian Fisika</h3>
                    <span class="badge-new text-[9px] text-secondary font-bold flex items-center gap-1 uppercase tracking-wider bg-secondary-fixed/20 px-1.5 py-0.5 rounded border border-secondary/20 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span> Baru
                    </span>
                </div>
                <p class="text-[11px] text-on-surface leading-snug mb-1.5 line-clamp-2">Nilai Ulangan Harian Fisika telah dirilis. Silakan periksa halaman nilai Anda untuk melihat hasil evaluasi.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 1 jam yang lalu
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(2)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-2" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(2)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(2)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">menu_book</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Materi Baru: Sejarah Indonesia</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Bapak Ahmad telah mengunggah Modul 4: Masa Kolonialisme. Harap pelajari materi ini sebelum sesi tatap muka berikutnya.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> Kemarin, 14:30
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(3)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-3" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(3)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(3)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">alarm</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Deadline Kuis Bahasa Inggris</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Jangan lupa, batas waktu pengerjaan Kuis Bahasa Inggris adalah besok pukul 23:59 WIB. Segera selesaikan sebelum terlambat.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 2 hari yang lalu
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(4)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-4" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(4)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(4)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>

        <!-- 5 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="5">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">campaign</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Pengumuman: Libur Nasional</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Pemberitahuan bahwa kegiatan belajar mengajar diliburkan pada hari Rabu mendatang sehubungan dengan hari libur nasional.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 3 hari yang lalu
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(5)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-5" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(5)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(5)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>

        <!-- 6 -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="6">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">forum</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Diskusi Baru: Kelas Matematika</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Siswa Budi mengomentari pertanyaan Anda pada forum diskusi Matematika bab Aljabar.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 4 hari yang lalu
                </p>
            </div>
            
            <div class="absolute top-2 right-2">
                <button onclick="toggleMenu(6)" class="p-1 rounded-full text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors focus:outline-none">
                    <span class="material-symbols-outlined text-[16px]">more_vert</span>
                </button>
                <div id="menu-6" class="hidden absolute right-0 top-full mt-1 w-28 bg-surface-container-lowest border border-outline-variant/30 shadow-lg rounded-lg py-1 z-10">
                    <button onclick="markRead(6)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-on-surface hover:bg-surface-container transition-colors">Tandai Dibaca</button>
                    <button onclick="deleteNotif(6)" class="w-full text-left px-3 py-1.5 text-[10px] font-bold text-error hover:bg-error/10 transition-colors">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End of list -->
    <div class="pt-4 text-center">
        <p class="text-xs text-on-surface-variant italic font-bold">Anda telah melihat semua notifikasi.</p>
    </div>
</div>

@push('scripts')
<script>
    function toggleMenu(id) {
        event.stopPropagation();
        
        // Reset z-index of all items
        document.querySelectorAll('.notification-item').forEach(el => {
            el.style.zIndex = '1';
        });

        document.querySelectorAll('[id^="menu-"]').forEach(el => {
            if (el.id !== `menu-${id}`) el.classList.add('hidden');
        });
        
        const menu = document.getElementById(`menu-${id}`);
        menu.classList.toggle('hidden');
        
        if (!menu.classList.contains('hidden')) {
            const item = document.querySelector(`.notification-item[data-id="${id}"]`);
            if (item) item.style.zIndex = '50';
        }
    }

    function markRead(id) {
        const item = document.querySelector(`.notification-item[data-id="${id}"]`);
        if (item) {
            item.classList.remove('bg-surface-container-lowest', 'shadow-sm');
            item.classList.add('bg-surface-container', 'opacity-80');
            const indicator = item.querySelector('.absolute.left-0');
            if (indicator) indicator.classList.add('hidden');
            const badge = item.querySelector('.badge-new');
            if (badge) badge.classList.add('hidden');
        }
        document.getElementById(`menu-${id}`).classList.add('hidden');
    }

    function deleteNotif(id) {
        const item = document.querySelector(`.notification-item[data-id="${id}"]`);
        if (item) {
            item.remove();
        }
    }

    document.addEventListener('click', function(event) {
        const isClickInside = event.target.closest('.absolute.top-2.right-2');
        if (!isClickInside) {
            document.querySelectorAll('[id^="menu-"]').forEach(el => {
                el.classList.add('hidden');
            });
        }
    });
</script>
@endpush
@endsection
