@extends('layouts.guru')
@section('title', 'Notifikasi - SMK Mandalahayu 1')

@section('content')
<div class="space-y-4">
    <!-- Page Header -->
    <div class="border-b border-outline-variant/50 pb-3 mb-4">
        <h2 class="text-xl text-primary font-bold mb-1" style="font-family: var(--font-serif)">Notifikasi</h2>
        <p class="text-xs text-on-surface-variant">Pembaruan terbaru mengenai aktivitas akademik Anda.</p>
    </div>

    <!-- Notification List -->
    <div class="space-y-2" id="notification-container">
        <!-- 1 - Deadline -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 shadow-sm hover:shadow-md transition-all relative" data-id="1">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg"></div>
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-secondary-container/20 flex items-center justify-center text-on-secondary-container border border-secondary-container">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">warning</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-primary font-bold truncate">Deadline Pengumpulan Tugas</h3>
                    <span class="badge-new text-[9px] text-secondary font-bold flex items-center gap-1 uppercase tracking-wider bg-secondary-fixed/20 px-1.5 py-0.5 rounded border border-secondary/20 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span> Belum Dibaca
                    </span>
                </div>
                <p class="text-[11px] text-on-surface leading-snug mb-1.5 line-clamp-2">Masa pengumpulan tugas "Analisis Topologi Jaringan" kelas XII TKJ 2 berakhir dalam 2 jam. 12 siswa belum mengumpulkan.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 45 menit yang lalu
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

        <!-- 2 - Pengumpulan -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 shadow-sm hover:shadow-md transition-all relative" data-id="2">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg"></div>
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-secondary-container/20 flex items-center justify-center text-on-secondary-container border border-secondary-container">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">description</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-primary font-bold truncate">Tugas Baru Dikumpulkan</h3>
                    <span class="badge-new text-[9px] text-secondary font-bold flex items-center gap-1 uppercase tracking-wider bg-secondary-fixed/20 px-1.5 py-0.5 rounded border border-secondary/20 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span> Belum Dibaca
                    </span>
                </div>
                <p class="text-[11px] text-on-surface leading-snug mb-1.5 line-clamp-2">8 Siswa baru saja mengumpulkan tugas "Konfigurasi MikroTik". Total 24/30 siswa telah mengumpulkan.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 2 jam yang lalu
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

        <!-- 3 - Siswa Baru (read) -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">person</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Siswa Baru Bergabung</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Aditya Saputra telah berhasil mendaftar dan bergabung di kelas XII TKJ 1 melalui undangan kode kelas.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> Kemarin, 14:20
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

        <!-- 4 - Perlu Dinilai (read) -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 shadow-sm hover:shadow-md transition-all relative" data-id="4">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg"></div>
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-tertiary-fixed/30 flex items-center justify-center text-tertiary border border-tertiary-fixed">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">analytics</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-primary font-bold truncate">5 Siswa Belum Dinilai</h3>
                    <span class="badge-new text-[9px] text-secondary font-bold flex items-center gap-1 uppercase tracking-wider bg-secondary-fixed/20 px-1.5 py-0.5 rounded border border-secondary/20 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span> Belum Dibaca
                    </span>
                </div>
                <p class="text-[11px] text-on-surface leading-snug mb-1.5 line-clamp-2">Tugas "Jaringan Dasar" telah dikumpulkan 30 siswa, namun 5 siswa masih memerlukan penilaian akhir sebelum rekap.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> Kemarin, 09:15
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

        <!-- 5 - Info (read) -->
        <div class="notification-item group flex items-start gap-3 p-3 rounded-lg bg-surface-container border border-outline-variant/30 opacity-80 hover:opacity-100 transition-all relative" data-id="5">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant border border-outline-variant/50">
                <span class="material-symbols-outlined text-[16px]">info</span>
            </div>
            <div class="flex-1 min-w-0 pr-6">
                <div class="flex justify-between items-start mb-0.5">
                    <h3 class="text-xs text-on-surface font-bold truncate">Update Kurikulum 2024</h3>
                </div>
                <p class="text-[11px] text-on-surface-variant leading-snug mb-1.5 line-clamp-2">Panduan kurikulum terbaru untuk semester ganjil telah diunggah oleh Admin Sekolah. Silakan unduh materi pendukung.</p>
                <p class="text-[9px] text-on-surface-variant font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[12px]">schedule</span> 4 Hari yang lalu
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
