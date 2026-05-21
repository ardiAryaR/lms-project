@extends('layouts.guru')
@section('title', 'Notifikasi - SMK Mandalahayu 1')

@section('content')
<style>
    .soft-shadow { box-shadow: 0 2px 10px -2px rgba(107, 63, 31, 0.08); }
    .transition-standard { transition: all 0.3s ease; }
</style>

<section class="max-w-[1200px] mx-auto">
    <div class="mb-4 mt-2">
        <h1 class="font-bold text-2xl text-primary mb-1" style="font-family: var(--font-serif)">Notifikasi</h1>
        <p class="text-on-surface-variant text-sm">Anda memiliki <span class="font-bold text-secondary">3 pesan belum terbaca</span> hari ini.</p>
    </div>

    <!-- Filter Bar -->
    <div class="flex flex-wrap items-center gap-2 mb-4 border-b border-outline-variant pb-3">
        <button data-filter="all" class="filter-btn px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-bold text-xs transition-standard">Semua</button>
        <button data-filter="siswa-baru" class="filter-btn px-4 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-semibold text-xs hover:bg-primary-fixed-variant/10 transition-standard">Siswa Baru</button>
        <button data-filter="pengumpulan" class="filter-btn px-4 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-semibold text-xs hover:bg-primary-fixed-variant/10 transition-standard">Pengumpulan</button>
        <button data-filter="deadline" class="filter-btn px-4 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-semibold text-xs hover:bg-primary-fixed-variant/10 transition-standard">Deadline</button>
        <button data-filter="perlu-dinilai" class="filter-btn px-4 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-semibold text-xs hover:bg-primary-fixed-variant/10 transition-standard">Perlu Dinilai</button>
    </div>

    <!-- Notification List -->
    <div class="space-y-6">
        <!-- Group: Today -->
        <div class="notification-group">
            <h3 class="text-base font-bold text-tertiary mb-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
                Hari Ini
            </h3>
            <div class="grid gap-3">
                <!-- Notification Card: High Priority -->
                <div data-category="deadline" class="notification-card bg-surface-container-lowest p-3 rounded-lg soft-shadow border-l-4 border-error flex items-start justify-between gap-4 transition-standard hover:scale-[1.01]">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-error-container text-error flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">warning</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-0.5">
                                <h4 class="text-sm font-bold text-primary">Deadline Pengumpulan Tugas</h4>
                                <span class="px-1.5 py-0.5 rounded bg-error text-on-error font-bold text-[9px] uppercase">Penting</span>
                            </div>
                            <p class="text-on-surface-variant text-xs mb-2 max-w-2xl">Masa pengumpulan tugas "Analisis Topologi Jaringan" kelas XII TKJ 2 berakhir dalam 2 jam. 12 siswa belum mengumpulkan.</p>
                            <div class="flex items-center gap-4">
                                <span class="text-on-surface-variant opacity-60 text-[11px] font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">schedule</span>
                                    45 menit yang lalu
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col items-end gap-1">
                        <span class="unread-dot w-2 h-2 rounded-full bg-secondary-container"></span>
                        <button class="more-btn p-1 hover:bg-surface-variant rounded-full transition-colors" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-sm">more_vert</span>
                        </button>
                        <div class="action-dropdown hidden absolute right-0 top-8 w-56 bg-surface-container-lowest border border-outline-variant/50 rounded-lg soft-shadow z-10 overflow-hidden">
                            <button class="mark-read-btn w-full text-left px-4 py-2 text-xs text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">done_all</span> Tandai sebagai terlihat
                            </button>
                            <button class="delete-btn w-full text-left px-4 py-2 text-xs text-error hover:bg-error-container/50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">delete</span> Hapus notifikasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Notification Card: Submission -->
                <div data-category="pengumpulan" class="notification-card bg-surface-container-lowest p-3 rounded-lg soft-shadow border-l-4 border-transparent flex items-start justify-between gap-4 transition-standard hover:scale-[1.01]">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">description</span>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-primary mb-0.5">Tugas Baru Dikumpulkan</h4>
                            <p class="text-on-surface-variant text-xs mb-2 max-w-2xl">8 Siswa baru saja mengumpulkan tugas "Konfigurasi MikroTik". Total 24/30 siswa telah mengumpulkan.</p>
                            <div class="flex items-center gap-4">
                                <span class="text-on-surface-variant opacity-60 text-[11px] font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">schedule</span>
                                    2 jam yang lalu
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col items-end gap-1">
                        <span class="unread-dot w-2 h-2 rounded-full bg-secondary-container"></span>
                        <button class="more-btn p-1 hover:bg-surface-variant rounded-full transition-colors" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-sm">more_vert</span>
                        </button>
                        <div class="action-dropdown hidden absolute right-0 top-8 w-56 bg-surface-container-lowest border border-outline-variant/50 rounded-lg soft-shadow z-10 overflow-hidden">
                            <button class="mark-read-btn w-full text-left px-4 py-2 text-xs text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">done_all</span> Tandai sebagai terlihat
                            </button>
                            <button class="delete-btn w-full text-left px-4 py-2 text-xs text-error hover:bg-error-container/50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">delete</span> Hapus notifikasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Group: Yesterday -->
        <div class="notification-group">
            <h3 class="text-base font-bold text-tertiary mb-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-outline-variant"></span>
                Kemarin
            </h3>
            <div class="grid gap-3">
                <!-- Notification Card: New Student -->
                <div data-category="siswa-baru" class="notification-card bg-surface-container-lowest p-3 rounded-lg soft-shadow border-l-4 border-transparent flex items-start justify-between gap-4 transition-standard hover:scale-[1.01]">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-surface-container text-primary flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">person</span>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-primary mb-0.5">Siswa Baru Bergabung</h4>
                            <p class="text-on-surface-variant text-xs mb-2 max-w-2xl">Aditya Saputra telah berhasil mendaftar dan bergabung di kelas XII TKJ 1 melalui undangan kode kelas.</p>
                            <div class="flex items-center gap-4">
                                <span class="text-on-surface-variant opacity-60 text-[11px] font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                    Kemarin, 14:20
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col items-end gap-1">
                        <!-- this one doesn't have an unread dot, but we still add the logic -->
                        <button class="more-btn p-1 hover:bg-surface-variant rounded-full transition-colors" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-sm">more_vert</span>
                        </button>
                        <div class="action-dropdown hidden absolute right-0 top-8 w-56 bg-surface-container-lowest border border-outline-variant/50 rounded-lg soft-shadow z-10 overflow-hidden">
                            <button class="mark-read-btn w-full text-left px-4 py-2 text-xs text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">done_all</span> Tandai sebagai terlihat
                            </button>
                            <button class="delete-btn w-full text-left px-4 py-2 text-xs text-error hover:bg-error-container/50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">delete</span> Hapus notifikasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Notification Card: Ungraded -->
                <div data-category="perlu-dinilai" class="notification-card bg-surface-container-low p-3 rounded-lg soft-shadow border-l-4 border-secondary-container flex items-start justify-between gap-4 transition-standard hover:scale-[1.01]">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed-variant flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">analytics</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-0.5">
                                <h4 class="text-sm font-bold text-primary">5 Siswa Belum Dinilai</h4>
                                <span class="px-1.5 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed-variant text-[9px] font-bold uppercase">Perlu Dinilai</span>
                            </div>
                            <p class="text-on-surface-variant text-xs mb-2 max-w-2xl">Tugas "Jaringan Dasar" telah dikumpulkan 30 siswa, namun 5 siswa masih memerlukan penilaian akhir sebelum rekap.</p>
                            <div class="flex items-center gap-4">
                                <span class="text-on-surface-variant opacity-60 text-[11px] font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                    Kemarin, 09:15
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col items-end gap-1">
                        <span class="unread-dot w-2 h-2 rounded-full bg-secondary-container"></span>
                        <button class="more-btn p-1 hover:bg-surface-variant rounded-full transition-colors" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-sm">more_vert</span>
                        </button>
                        <div class="action-dropdown hidden absolute right-0 top-8 w-56 bg-surface-container-lowest border border-outline-variant/50 rounded-lg soft-shadow z-10 overflow-hidden">
                            <button class="mark-read-btn w-full text-left px-4 py-2 text-xs text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">done_all</span> Tandai sebagai terlihat
                            </button>
                            <button class="delete-btn w-full text-left px-4 py-2 text-xs text-error hover:bg-error-container/50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">delete</span> Hapus notifikasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Group: Last Week -->
        <div class="notification-group">
            <h3 class="text-base font-bold text-tertiary mb-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-outline-variant"></span>
                Minggu Lalu
            </h3>
            <div class="grid gap-3">
                <!-- Notification Card: Generic Info -->
                <div data-category="info" class="notification-card bg-surface-container-lowest p-3 rounded-lg soft-shadow border-l-4 border-transparent flex items-start justify-between gap-4 transition-standard hover:scale-[1.01]">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">info</span>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-primary mb-0.5">Update Kurikulum 2024</h4>
                            <p class="text-on-surface-variant text-xs mb-2 max-w-2xl">Panduan kurikulum terbaru untuk semester ganjil telah diunggah oleh Admin Sekolah. Silakan unduh materi pendukung.</p>
                            <div class="flex items-center gap-4">
                                <span class="text-on-surface-variant opacity-60 text-[11px] font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                    4 Hari yang lalu
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col items-end gap-1">
                        <button class="more-btn p-1 hover:bg-surface-variant rounded-full transition-colors" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-sm">more_vert</span>
                        </button>
                        <div class="action-dropdown hidden absolute right-0 top-8 w-56 bg-surface-container-lowest border border-outline-variant/50 rounded-lg soft-shadow z-10 overflow-hidden">
                            <button class="mark-read-btn w-full text-left px-4 py-2 text-xs text-on-surface hover:bg-surface-container transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">done_all</span> Tandai sebagai terlihat
                            </button>
                            <button class="delete-btn w-full text-left px-4 py-2 text-xs text-error hover:bg-error-container/50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">delete</span> Hapus notifikasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Filtering Logic
    const filterButtons = document.querySelectorAll('.filter-btn');
    const notificationCards = document.querySelectorAll('.notification-card');
    const notificationGroups = document.querySelectorAll('.notification-group');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update button styles
            filterButtons.forEach(b => {
                b.classList.remove('bg-secondary-container', 'text-on-secondary-container', 'font-bold');
                b.classList.add('bg-surface-container', 'text-on-surface-variant', 'font-semibold');
            });
            btn.classList.remove('bg-surface-container', 'text-on-surface-variant', 'font-semibold');
            btn.classList.add('bg-secondary-container', 'text-on-secondary-container', 'font-bold');

            // Filter logic
            const filterValue = btn.getAttribute('data-filter');
            
            notificationCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });

            // Hide groups that have no visible cards
            notificationGroups.forEach(group => {
                const visibleCards = Array.from(group.querySelectorAll('.notification-card')).filter(card => card.style.display !== 'none');
                if (visibleCards.length === 0) {
                    group.style.display = 'none';
                } else {
                    group.style.display = 'block';
                }
            });
        });
    });

    // Mark as read interaction
    notificationCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-2px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });

    // Dropdown interactions
    function toggleDropdown(btn) {
        // Close all other dropdowns
        document.querySelectorAll('.action-dropdown').forEach(dropdown => {
            if (dropdown !== btn.nextElementSibling) {
                dropdown.classList.add('hidden');
            }
        });
        // Toggle current dropdown
        btn.nextElementSibling.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.relative.flex.flex-col.items-end')) {
            document.querySelectorAll('.action-dropdown').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });

    // Add logic to Mark as Read and Delete buttons
    notificationCards.forEach(card => {
        const markReadBtn = card.querySelector('.mark-read-btn');
        const deleteBtn = card.querySelector('.delete-btn');
        const unreadDot = card.querySelector('.unread-dot');
        const actionDropdown = card.querySelector('.action-dropdown');

        if (markReadBtn) {
            markReadBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                // visually mark as read
                if (unreadDot) unreadDot.style.display = 'none';
                card.classList.remove('bg-surface-container-low');
                card.classList.add('bg-surface-container-lowest', 'opacity-80');
                
                // close dropdown
                actionDropdown.classList.add('hidden');
            });
        }

        if (deleteBtn) {
            deleteBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const group = card.closest('.notification-group');
                
                // remove card with animation
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.remove();
                    
                    // hide group header if empty
                    const visibleCards = Array.from(group.querySelectorAll('.notification-card')).filter(c => c.style.display !== 'none');
                    if (visibleCards.length === 0) {
                        group.style.display = 'none';
                    }
                }, 200);
            });
        }
    });
</script>
@endpush
@endsection
