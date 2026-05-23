@extends('layouts.guru')
@section('title', 'Penilaian Ujian - SMK Mandalahayu 1')

@section('content')
<style>
    .smooth-wave-bg {
        background-image: radial-gradient(circle at 2px 2px, rgba(107, 63, 31, 0.04) 1px, transparent 0);
        background-size: 24px 24px;
    }
    .shadow-ambient { box-shadow: 0 4px 20px -2px rgba(107, 63, 31, 0.06); }

    /* Student Navigator Thumbs */
    .student-thumb {
        cursor: pointer;
        transition: all .25s;
        width: 32px; height: 32px;
        border-radius: 9999px;
        border-width: 2px;
        border-style: solid;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 10px;
        flex-shrink: 0;
    }
    .student-thumb.active {
        border-color: #835500 !important;
        background-color: #ffdcc6 !important;
        color: #50290b !important;
        opacity: 1 !important;
        filter: none !important;
        box-shadow: 0 0 0 3px rgba(131,85,0,.2);
    }
    .student-thumb.inactive {
        border-color: #d6c3b8;
        background-color: #f2ede7;
        color: #84746b;
        opacity: .55;
        filter: grayscale(.8);
    }
    .student-thumb.inactive:hover {
        opacity: .85;
        filter: none;
    }

</style>

<!-- Toast Success -->
<div id="toast-success" class="fixed top-5 left-1/2 -translate-x-1/2 z-[70] flex items-center gap-3 bg-green-100 border border-green-300 text-green-800 px-6 py-3 rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform -translate-y-4">
    <span class="material-symbols-outlined">check_circle</span>
    <span class="font-bold text-sm">Nilai berhasil disimpan!</span>
</div>

<!-- Modal Konfirmasi Simpan -->
<div id="modal-confirm-simpan" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/50 hidden backdrop-blur-sm transition-opacity">
    <div class="bg-[#fef9f3] rounded-xl shadow-2xl p-6 w-full max-w-sm border border-[#d6c3b8] text-center">
        <span class="material-symbols-outlined text-[#feae2c] text-5xl mb-4">help</span>
        <h3 class="text-xl font-bold text-[#50290b] mb-2" style="font-family: var(--font-serif)">Simpan Nilai?</h3>
        <p class="text-xs text-[#51443c] mb-6">Apakah Anda yakin nilai yang diberikan sudah benar dan siap disimpan?</p>
        <div class="flex gap-2 justify-center">
            <button type="button" id="btn-cancel-simpan" class="px-4 py-2 rounded-lg font-bold text-xs text-[#51443c] border border-[#d6c3b8] hover:bg-[#f8f3ed] transition-colors">Periksa Lagi</button>
            <button type="button" id="btn-confirm-simpan" class="px-4 py-2 rounded-lg font-bold text-xs bg-[#feae2c] text-[#6b4500] hover:brightness-110 transition-all">Ya, Simpan</button>
        </div>
    </div>
</div>

<div class="smooth-wave-bg -m-6 p-4" style="min-height: calc(100vh - 64px);">
<div class="max-w-full mx-auto h-full flex flex-col">

    <!-- Page Title Badge -->
    <div class="flex items-center gap-2 mb-2">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-bold uppercase tracking-wider">
            <span class="material-symbols-outlined text-sm">contract_edit</span> Penilaian Ujian
        </span>
        <span class="text-on-surface-variant text-xs">Ujian Tengah Semester Ganjil</span>
    </div>

    <div class="flex flex-col lg:flex-row gap-6 flex-1">
        <!-- Left Column: 70% -->
        <div class="flex-1 min-w-0 flex flex-col" style="flex: 0 0 68%; max-width: 68%;">

            <!-- Exam Header Card -->
            <div class="bg-surface-container-lowest p-3 rounded-xl shadow-ambient border border-outline-variant/30 mb-3">
                <div class="flex flex-col md:flex-row justify-between items-start gap-2 mb-2">
                    <div>
                        <h1 class="font-bold text-lg text-primary mb-0" style="font-family: var(--font-serif)">Aditya Saputra</h1>
                        <p class="text-xs text-on-surface-variant">XI TKJ 1 · Dasar Jaringan</p>
                        <p class="text-[11px] text-on-surface-variant/70">Diserahkan: 12 Des 2023, 10:42</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="bg-error-container text-on-error-container px-2 py-0.5 rounded-full text-[11px] font-bold flex items-center gap-1 mb-1 w-fit ml-auto">
                            <span class="material-symbols-outlined text-[13px]">schedule</span> Late (5m)
                        </div>
                    </div>
                </div>
            </div>

            <!-- Questions — scrollable -->
            <div class="overflow-y-auto space-y-3 pr-1" style="max-height: calc(100vh - 220px)">

                <!-- Q1: Correct -->
                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-ambient border border-outline-variant/30 relative">
                    <div class="absolute top-4 right-4 flex items-center gap-2">
                        <span class="bg-green-100 text-green-700 px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 border border-green-200">
                            <span class="material-symbols-outlined text-sm">check_circle</span> Benar
                        </span>
                        <span class="text-sm font-bold text-primary">10/10 pts</span>
                    </div>
                    <h4 class="text-xs font-bold text-secondary uppercase tracking-wider mb-2">Pertanyaan 1 — Pilihan Ganda</h4>
                    <p class="text-base font-semibold text-on-surface mb-4 pr-28">Manakah di bawah ini yang merupakan fungsi utama dari Router dalam sebuah jaringan komputer?</p>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 rounded-lg bg-surface-container border border-outline-variant/20">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-outline-variant mr-3 text-xs flex-shrink-0">A</span>
                            <span class="text-sm">Menghubungkan perangkat di dalam satu LAN</span>
                        </div>
                        <div class="flex items-center p-3 rounded-lg bg-green-50 border-2 border-green-500 text-green-900">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-green-500 text-white mr-3 text-xs font-bold flex-shrink-0">B</span>
                            <span class="text-sm flex-1">Menentukan jalur terbaik untuk pengiriman data antar jaringan</span>
                            <span class="material-symbols-outlined text-green-600 text-lg">check</span>
                        </div>
                        <div class="flex items-center p-3 rounded-lg bg-surface-container border border-outline-variant/20">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-outline-variant mr-3 text-xs flex-shrink-0">C</span>
                            <span class="text-sm">Mengonversi sinyal analog menjadi digital</span>
                        </div>
                    </div>
                    <p class="text-xs text-on-surface-variant italic mt-3 pt-3 border-t border-outline-variant/20">Automated: Kunci Jawaban B cocok dengan pilihan siswa.</p>
                </div>

                <!-- Q2: Incorrect -->
                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-ambient border border-outline-variant/30 relative">
                    <div class="absolute top-4 right-4 flex items-center gap-2">
                        <span class="bg-error-container text-on-error-container px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">cancel</span> Salah
                        </span>
                        <span class="text-sm font-bold text-error">0/10 pts</span>
                    </div>
                    <h4 class="text-xs font-bold text-secondary uppercase tracking-wider mb-2">Pertanyaan 2 — Pilihan Ganda</h4>
                    <p class="text-base font-semibold text-on-surface mb-4 pr-28">Protokol apa yang digunakan untuk mengirimkan email dari client ke server?</p>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 rounded-lg bg-error-container/20 border-2 border-error text-on-error-container">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-error text-white mr-3 text-xs font-bold flex-shrink-0">A</span>
                            <span class="text-sm flex-1">HTTP</span>
                            <span class="material-symbols-outlined text-error text-lg">close</span>
                        </div>
                        <div class="flex items-center p-3 rounded-lg bg-green-50 border-2 border-green-400/50 text-green-800">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-green-400/50 text-white mr-3 text-xs font-bold flex-shrink-0">B</span>
                            <span class="text-sm flex-1">SMTP <span class="text-xs">(Kunci Jawaban)</span></span>
                        </div>
                        <div class="flex items-center p-3 rounded-lg bg-surface-container border border-outline-variant/20">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-outline-variant mr-3 text-xs flex-shrink-0">C</span>
                            <span class="text-sm">FTP</span>
                        </div>
                    </div>
                </div>

                <!-- Q3: Essay - needs grading -->
                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-ambient border-l-4 border-l-secondary border border-outline-variant/30 relative">
                    <div class="absolute top-4 right-4 flex items-center gap-2">
                        <span class="bg-secondary-container/20 text-on-secondary-container px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 border border-secondary-container/40">
                            <span class="material-symbols-outlined text-sm">edit</span> Perlu Dinilai
                        </span>
                        <div class="flex items-center bg-surface-container border border-outline-variant px-2 py-1 rounded">
                            <input class="essay-score w-10 bg-transparent border-none p-0 text-center font-bold text-primary focus:ring-0 text-sm" data-max="30" max="30" min="0" placeholder="0" type="number" value="25">
                            <span class="text-xs text-on-surface-variant border-l border-outline-variant ml-2 pl-2">/ 30 pts</span>
                        </div>
                    </div>
                    <h4 class="text-xs font-bold text-secondary uppercase tracking-wider mb-2">Pertanyaan 3 — Essay</h4>
                    <p class="text-base font-semibold text-on-surface mb-4 pr-40">Jelaskan perbedaan mendasar antara model OSI dan model TCP/IP!</p>
                    <div class="bg-surface-bright p-4 rounded-lg border border-outline-variant/30 mb-4 italic text-on-surface text-sm leading-relaxed">
                        "Model OSI memiliki 7 lapisan sedangkan TCP/IP hanya memiliki 4 lapisan. Model OSI lebih bersifat teoritis untuk standarisasi, sedangkan TCP/IP adalah protokol praktis yang digunakan di internet saat ini. OSI memisahkan Data Link dan Physical Layer, sementara di TCP/IP keduanya digabung dalam Network Access layer."
                    </div>
                    <textarea class="w-full bg-surface-container border-0 border-b-2 border-primary focus:ring-0 focus:border-secondary transition-all p-3 rounded-t-lg text-sm resize-none" placeholder="Tulis catatan untuk jawaban ini..." rows="2">Penjelasan sudah sangat baik dan detail. Tambahkan protokol spesifik di tiap layer untuk nilai maksimal.</textarea>
                </div>

            </div>
        </div>

        <!-- Right: Grading Sidebar 30% -->
        <aside class="flex-shrink-0 lg:sticky lg:top-4" style="flex: 0 0 30%; max-width: 30%; height: calc(100vh - 88px);">
            <div class="bg-surface-container-highest p-4 rounded-xl shadow-ambient border border-outline-variant/30 h-full flex flex-col">
                <h3 class="font-bold text-[15px] text-primary mb-3 flex-shrink-0" style="font-family: var(--font-serif)">Ringkasan Nilai</h3>

                <!-- Score Circle -->
                <div class="text-center mb-3 flex-shrink-0">
                    <div class="inline-flex flex-col items-center justify-center w-20 h-20 rounded-full border-[6px] border-secondary-container bg-white shadow-inner score-circle transition-transform duration-200">
                        <span class="text-2xl font-bold text-primary leading-none" id="totalScore">80</span>
                        <span class="text-[9px] text-on-surface-variant font-bold border-t border-outline-variant pt-0.5 mt-0.5 w-10">/ 100</span>
                    </div>
                    <p class="mt-1 text-[11px] text-on-surface-variant font-medium">Skor saat ini</p>
                </div>

                <!-- Score Breakdown -->
                <div class="space-y-1.5 mb-3 flex-shrink-0">
                    <div class="flex justify-between text-[11px]">
                        <span class="text-on-surface-variant">Otomatis (PG)</span>
                        <span class="font-bold text-primary" id="autoScore">55/70</span>
                    </div>
                    <div class="flex justify-between text-[11px]">
                        <span class="text-on-surface-variant">Manual (Essay)</span>
                        <span class="font-bold text-secondary" id="manualScore">25/30</span>
                    </div>
                    <div class="h-px bg-outline-variant/30 my-1.5"></div>
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-primary">Total</span>
                        <span class="text-primary" id="totalPercent">80%</span>
                    </div>
                </div>

                <!-- Feedback -->
                <div class="space-y-2 flex-1 flex flex-col min-h-0">
                    <div class="flex-1 flex flex-col min-h-0">
                        <label class="text-[11px] font-bold text-on-surface-variant block mb-1">Feedback Keseluruhan:</label>
                        <textarea class="flex-1 w-full bg-white border border-outline-variant rounded-lg p-2.5 text-xs focus:ring-2 focus:ring-secondary/20 focus:border-secondary focus:outline-none resize-none" placeholder="Tuliskan evaluasi menyeluruh..."></textarea>
                    </div>
                    <!-- Actions -->
                    <div class="pt-3 border-t border-outline-variant/30 flex-shrink-0">
                        <button type="button" id="btn-trigger-simpan" class="w-full px-6 py-2.5 bg-[#feae2c] text-[#6b4500] text-sm font-bold rounded-lg flex items-center justify-center gap-2 hover:brightness-110 transition-soft">
                            <span class="material-symbols-outlined" style="font-size: 18px">save</span> Simpan Nilai
                        </button>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── Student Navigator ──────────────────────────────────────
    const thumbs = document.querySelectorAll('.student-thumb');
    const prevBtn = document.getElementById('prevStudent');
    const nextBtn = document.getElementById('nextStudent');
    const navCounter = document.getElementById('navCounter');
    let currentIndex = 0;

    function activateStudent(idx) {
        thumbs.forEach((t, i) => {
            t.classList.toggle('active', i === idx);
            t.classList.toggle('inactive', i !== idx);
        });
        navCounter.textContent = `Siswa ${idx + 1} dari ${thumbs.length}`;
        prevBtn.style.opacity = idx === 0 ? '.35' : '1';
        nextBtn.style.opacity = idx === thumbs.length - 1 ? '.35' : '1';
        currentIndex = idx;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const sIndex = urlParams.get('s');
    if (sIndex !== null && !isNaN(sIndex) && sIndex >= 0 && sIndex < thumbs.length) {
        currentIndex = parseInt(sIndex);
    }

    thumbs.forEach((t, i) => t.addEventListener('click', () => activateStudent(i)));
    prevBtn.addEventListener('click', () => { if (currentIndex > 0) activateStudent(currentIndex - 1); });
    nextBtn.addEventListener('click', () => { if (currentIndex < thumbs.length - 1) activateStudent(currentIndex + 1); });
    activateStudent(currentIndex);

    // ── Dynamic Score Calculation ──────────────────────────────
    const AUTO_CORRECT = 55;
    const AUTO_MAX = 70;
    const ESSAY_MAX_TOTAL = 30;

    function recalcScore() {
        let essayGained = 0;
        document.querySelectorAll('.essay-score').forEach(inp => {
            const v = parseInt(inp.value) || 0;
            const max = parseInt(inp.dataset.max) || 30;
            essayGained += Math.min(Math.max(v, 0), max);
        });
        const total = AUTO_CORRECT + essayGained;
        const totalMax = AUTO_MAX + ESSAY_MAX_TOTAL;
        const pct = Math.round((total / totalMax) * 100);
        document.getElementById('totalScore').textContent = pct;
        document.getElementById('totalPercent').textContent = pct + '%';
        document.getElementById('manualScore').textContent = essayGained + '/' + ESSAY_MAX_TOTAL;
        const circle = document.querySelector('.score-circle');
        circle.classList.add('scale-105');
        setTimeout(() => circle.classList.remove('scale-105'), 200);
    }
    document.querySelectorAll('.essay-score').forEach(inp => inp.addEventListener('input', recalcScore));

    // ── Modals & Toasts ─────────────────────────────────────
    const monitorUrl = "{{ route('guru.monitor') }}";
    
    const modalSimpan = document.getElementById('modal-confirm-simpan');
    const toastSuccess = document.getElementById('toast-success');
    const btnTriggerSimpan = document.getElementById('btn-trigger-simpan');
    const btnConfirmSimpan = document.getElementById('btn-confirm-simpan');
    const btnCancelSimpan = document.getElementById('btn-cancel-simpan');

    // Trigger Modals
    btnTriggerSimpan.addEventListener('click', () => {
        modalSimpan.classList.remove('hidden');
        modalSimpan.classList.add('flex');
    });

    // Cancel Modals
    btnCancelSimpan.addEventListener('click', () => {
        modalSimpan.classList.add('hidden');
        modalSimpan.classList.remove('flex');
    });

    // Confirm Simpan
    btnConfirmSimpan.addEventListener('click', () => {
        modalSimpan.classList.add('hidden');
        modalSimpan.classList.remove('flex');
        
        toastSuccess.classList.remove('invisible', 'opacity-0', '-translate-y-4');
        toastSuccess.classList.add('opacity-100', 'translate-y-0');
        
        setTimeout(() => {
            window.location.href = monitorUrl;
        }, 1500);
    });
});
</script>
@endpush
@endsection
