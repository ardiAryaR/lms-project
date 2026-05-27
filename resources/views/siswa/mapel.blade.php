@extends('layouts.siswa')
@section('title', 'Daftar Mata Pelajaran - SMK Mandalahayu 1')
@section('page-title', 'Mata Pelajaran')

@section('content')
<!-- Page Header & Filters -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
    <div>
        <h1 class="font-bold text-2xl text-primary mb-1" style="font-family: var(--font-serif)">Mata Pelajaran</h1>
        <p class="text-sm text-on-surface-variant">Kelola dan akses semua kelas yang Anda ikuti.</p>
    </div>
    <!-- Filters -->
    <div class="flex space-x-1 bg-surface-container-high p-1 rounded-lg self-start">
        <button id="filter-all" class="filter-btn px-3 py-1.5 rounded-md bg-surface-container-lowest text-primary text-xs font-bold shadow-sm transition-colors" onclick="filterClasses('all')">Semua</button>
        <button id="filter-aktif" class="filter-btn px-3 py-1.5 rounded-md text-on-surface-variant hover:text-primary hover:bg-surface-container-lowest/50 text-xs font-bold transition-colors" onclick="filterClasses('aktif')">Aktif</button>
        <button id="filter-non-aktif" class="filter-btn px-3 py-1.5 rounded-md text-on-surface-variant hover:text-primary hover:bg-surface-container-lowest/50 text-xs font-bold transition-colors" onclick="filterClasses('non-aktif')">Non-Aktif</button>
    </div>
</div>

<!-- Subject Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="class-grid">
    <!-- Card 1 -->
    <article class="class-card bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm hover:shadow-md overflow-hidden flex flex-col group hover:-translate-y-1 transition-soft" data-status="aktif">
        <div class="h-20 bg-primary-container relative overflow-hidden flex items-center justify-center">
            <!-- Abstract pattern background -->
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-secondary-container to-transparent"></div>
            <span class="material-symbols-outlined text-3xl text-secondary-container relative z-10" style="font-variation-settings: 'FILL' 1;">code</span>
        </div>
        <div class="p-4 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-lg text-primary leading-tight" style="font-family: var(--font-serif)">Pemrograman Web</h3>
                    <p class="text-xs font-bold text-on-surface-variant mt-0.5">Kelas 11 - RPL</p>
                </div>
                <span class="bg-secondary-container/20 text-secondary-fixed-variant px-2 py-0.5 rounded text-[10px] font-bold">Aktif</span>
            </div>
            <div class="flex items-center gap-2 mb-4">
                <div class="w-6 h-6 rounded-full bg-surface-variant flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-surface-variant text-[14px]">person</span>
                </div>
                <span class="text-xs font-semibold text-on-surface">Bpk. Budi Santoso</span>
            </div>
            <div class="flex gap-4 mb-4 border-t border-surface-variant pt-3">
                <div class="flex flex-col">
                    <span class="font-bold text-lg text-primary">12</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Materi</span>
                </div>
                <div class="flex flex-col border-l border-surface-variant pl-4">
                    <span class="font-bold text-lg text-secondary">3</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Tugas Baru</span>
                </div>
            </div>
            <a href="{{ route('siswa.mapel.detail') }}" class="mt-auto w-full py-2 border-2 border-outline hover:bg-secondary-container hover:border-secondary-container hover:text-on-secondary-container text-primary text-xs font-bold rounded-lg transition-colors flex items-center justify-center gap-2">
                Buka Kelas <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </a>
        </div>
    </article>
    <!-- Card 2 -->
    <article class="class-card bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm hover:shadow-md overflow-hidden flex flex-col group hover:-translate-y-1 transition-soft" data-status="aktif">
        <div class="h-20 bg-tertiary-container relative overflow-hidden flex items-center justify-center">
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-tertiary-fixed to-transparent"></div>
            <span class="material-symbols-outlined text-3xl text-tertiary-fixed relative z-10" style="font-variation-settings: 'FILL' 1;">database</span>
        </div>
        <div class="p-4 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-lg text-primary leading-tight" style="font-family: var(--font-serif)">Basis Data Terapan</h3>
                    <p class="text-xs font-bold text-on-surface-variant mt-0.5">Kelas 11 - RPL</p>
                </div>
                <span class="bg-secondary-container/20 text-secondary-fixed-variant px-2 py-0.5 rounded text-[10px] font-bold">Aktif</span>
            </div>
            <div class="flex items-center gap-2 mb-4">
                <div class="w-6 h-6 rounded-full bg-surface-variant flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-surface-variant text-[14px]">person</span>
                </div>
                <span class="text-xs font-semibold text-on-surface">Ibu Dina Mulyani</span>
            </div>
            <div class="flex gap-4 mb-4 border-t border-surface-variant pt-3">
                <div class="flex flex-col">
                    <span class="font-bold text-lg text-primary">8</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Materi</span>
                </div>
                <div class="flex flex-col border-l border-surface-variant pl-4">
                    <span class="font-bold text-lg text-on-surface-variant">0</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Tugas Baru</span>
                </div>
            </div>
            <a href="{{ route('siswa.mapel.detail') }}" class="mt-auto w-full py-2 border-2 border-outline hover:bg-secondary-container hover:border-secondary-container hover:text-on-secondary-container text-primary text-xs font-bold rounded-lg transition-colors flex items-center justify-center gap-2">
                Buka Kelas <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </a>
        </div>
    </article>
    <!-- Card 3 (Non-Aktif) -->
    <article class="class-card bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm hover:shadow-md overflow-hidden flex flex-col group hover:-translate-y-1 transition-soft" data-status="non-aktif">
        <div class="h-20 bg-primary relative overflow-hidden flex items-center justify-center">
            <div class="absolute inset-0 opacity-10 bg-[linear-gradient(45deg,_var(--tw-gradient-stops))] from-white to-transparent"></div>
            <span class="material-symbols-outlined text-3xl text-on-primary relative z-10" style="font-variation-settings: 'FILL' 1;">language</span>
        </div>
        <div class="p-4 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-lg text-primary leading-tight" style="font-family: var(--font-serif)">Bahasa Inggris Bisnis</h3>
                    <p class="text-xs font-bold text-on-surface-variant mt-0.5">Kelas 11 - Umum</p>
                </div>
                <span class="bg-surface-variant text-on-surface-variant px-2 py-0.5 rounded text-[10px] font-bold">Non-Aktif</span>
            </div>
            <div class="flex items-center gap-2 mb-4">
                <div class="w-6 h-6 rounded-full bg-surface-variant flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-surface-variant text-[14px]">person</span>
                </div>
                <span class="text-xs font-semibold text-on-surface">Mr. Andi Wijaya</span>
            </div>
            <div class="flex gap-4 mb-4 border-t border-surface-variant pt-3">
                <div class="flex flex-col">
                    <span class="font-bold text-lg text-primary">15</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Materi</span>
                </div>
                <div class="flex flex-col border-l border-surface-variant pl-4">
                    <span class="font-bold text-lg text-secondary">1</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Tugas Baru</span>
                </div>
            </div>
            <a href="{{ route('siswa.mapel.detail') }}" class="mt-auto w-full py-2 border-2 border-outline hover:bg-secondary-container hover:border-secondary-container hover:text-on-secondary-container text-primary text-xs font-bold rounded-lg transition-colors flex items-center justify-center gap-2">
                Buka Kelas <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </a>
        </div>
    </article>
</div>

<!-- Floating Action Button -->
<button onclick="toggleJoinModal()" class="fixed bottom-6 right-6 z-40 bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container shadow-lg rounded-full px-4 py-3 flex items-center gap-2 transition-transform hover:scale-105 active:scale-95 group">
    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
    <span class="text-xs font-bold">Gabung Kelas</span>
</button>

<!-- Join Class Modal -->
<div id="join-modal" class="fixed inset-0 bg-on-surface/50 z-50 hidden flex items-center justify-center backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-surface-container-lowest w-full max-w-sm rounded-xl shadow-lg p-6 transform scale-95 transition-transform" id="join-modal-content">
        <div class="flex justify-between items-start mb-4">
            <h2 class="font-bold text-xl text-primary" style="font-family: var(--font-serif)">Gabung Kelas Baru</h2>
            <button type="button" onclick="toggleJoinModal()" class="text-on-surface-variant hover:text-error transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <p class="text-xs text-on-surface-variant mb-4">Masukkan kunci kelas yang diberikan oleh guru Anda untuk bergabung.</p>
        
        <form id="join-class-form" onsubmit="handleJoinClass(event)">
            <div class="mb-4">
                <label for="class-key" class="block text-xs font-bold text-on-surface mb-1">Kunci Kelas</label>
                <input type="text" id="class-key" class="w-full bg-surface border border-outline-variant rounded-lg px-3 py-2 text-sm text-on-surface focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary" placeholder="Contoh: 12345" required autocomplete="off">
                <p id="join-error" class="text-error text-xs font-semibold mt-1 hidden">Kunci kelas salah</p>
            </div>
            
            <button type="submit" class="w-full bg-primary hover:bg-primary-container text-on-primary font-bold py-2 rounded-lg text-sm transition-colors flex items-center justify-center gap-2">
                <span>Gabung Sekarang</span>
            </button>
        </form>
    </div>
</div>

<!-- Success Popup -->
<div id="success-popup" class="fixed top-20 right-6 z-50 bg-secondary-container text-on-secondary-container px-4 py-3 rounded-lg shadow-lg hidden items-center gap-3 transform translate-y-[-20px] transition-all opacity-0">
    <span class="material-symbols-outlined">check_circle</span>
    <div>
        <p class="text-sm font-bold">Berhasil!</p>
        <p class="text-xs">Anda telah bergabung dengan kelas baru.</p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Filter Logic
    function filterClasses(status) {
        // Update button styles
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            btn.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm');
            btn.classList.add('text-on-surface-variant', 'hover:text-primary', 'hover:bg-surface-container-lowest/50');
        });

        const activeBtn = document.getElementById('filter-' + status);
        if(activeBtn) {
            activeBtn.classList.remove('text-on-surface-variant', 'hover:text-primary', 'hover:bg-surface-container-lowest/50');
            activeBtn.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm');
        }

        // Show/Hide Cards
        const cards = document.querySelectorAll('.class-card');
        cards.forEach(card => {
            if (status === 'all') {
                card.style.display = 'flex';
            } else {
                if (card.getAttribute('data-status') === status) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }

    // Modal Logic
    const modal = document.getElementById('join-modal');
    const modalContent = document.getElementById('join-modal-content');
    const inputKey = document.getElementById('class-key');
    const errorText = document.getElementById('join-error');
    const successPopup = document.getElementById('success-popup');

    function toggleJoinModal() {
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
                inputKey.focus();
            }, 10);
            inputKey.value = '';
            errorText.classList.add('hidden');
        } else {
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    }

    // Form Submit Logic
    function handleJoinClass(event) {
        event.preventDefault();
        const key = inputKey.value.trim();
        
        // Mock valid keys: '12345'
        if (key === '12345') {
            errorText.classList.add('hidden');
            toggleJoinModal();
            showSuccess();
            
        } else {
            errorText.classList.remove('hidden');
        }
    }

    function showSuccess() {
        successPopup.classList.remove('hidden');
        setTimeout(() => {
            successPopup.classList.remove('opacity-0', 'translate-y-[-20px]');
            successPopup.classList.add('opacity-100', 'translate-y-0');
        }, 10);
        
        // Hide after 3 seconds
        setTimeout(() => {
            successPopup.classList.remove('opacity-100', 'translate-y-0');
            successPopup.classList.add('opacity-0', 'translate-y-[-20px]');
            setTimeout(() => {
                successPopup.classList.add('hidden');
            }, 300);
        }, 3000);
    }
</script>
@endpush
