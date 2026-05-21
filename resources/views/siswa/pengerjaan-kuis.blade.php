@extends('layouts.siswa')
@section('title', 'Ruang Kuis - SMK Mandalahayu 1')
@section('page-title', 'Kuis 1: Struktur Data HTML')

@section('content')
<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background-color: var(--color-outline-variant); border-radius: 10px; }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex flex-col h-[calc(100vh-170px)] -mt-2">
    <!-- Custom Exam Header (Now acting as a secondary banner) -->
    <div class="bg-surface-container-lowest shadow-sm border border-outline-variant/30 rounded-xl px-6 py-3 shrink-0 mb-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">quiz</span>
            </div>
            <div>
                <h1 class="font-bold text-sm text-primary">Kuis 1: Struktur Data HTML</h1>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Pemrograman Web</p>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2 hidden md:flex">
                <span class="text-[10px] text-on-surface-variant uppercase">Progres</span>
                <div class="flex items-baseline gap-1">
                    <span id="progress-current" class="font-bold text-sm text-primary">1</span>
                    <span id="progress-total" class="text-xs text-outline">/ 15</span>
                </div>
            </div>
            <div class="w-[1px] h-6 bg-outline-variant hidden md:block"></div>
            <div class="bg-secondary-container text-on-secondary-container px-4 py-1 rounded-full flex items-center gap-1.5 shadow-sm">
                <span class="material-symbols-outlined text-[16px]">timer</span>
                <span class="font-bold text-sm tracking-widest">00:25:12</span>
            </div>
        </div>
    </div>

    <!-- Main Exam Area -->
    <div class="flex-1 overflow-hidden flex gap-4 w-full">
        <!-- Left Column: Question & Options -->
        <section class="flex-1 flex flex-col h-full bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
            <!-- Question Content -->
            <div class="flex-1 overflow-y-auto p-6 custom-scrollbar flex flex-col">
                <div class="mb-4 flex items-center justify-between border-b border-outline-variant/50 pb-3">
                    <span id="question-label" class="bg-primary/10 text-primary font-bold text-[10px] px-3 py-1 rounded-full uppercase tracking-widest">Soal No. 1</span>
                    <button id="btn-ragu" onclick="toggleDoubt()" class="flex items-center gap-1 text-outline hover:text-secondary transition-colors text-xs font-bold px-2 py-1 rounded hover:bg-secondary/10">
                        <span id="icon-ragu" class="material-symbols-outlined text-[16px]">flag</span>
                        Tandai Ragu-ragu
                    </button>
                </div>
                <div class="prose max-w-none mb-6">
                    <p id="question-text" class="text-sm text-on-surface leading-relaxed font-medium">Loading...</p>
                </div>
                <!-- Options -->
                <div id="options-container" class="flex flex-col gap-3 mt-auto">
                    <!-- Rendered by JS -->
                </div>
            </div>
            <!-- Navigation Footer -->
            <div class="p-4 bg-surface-container-low border-t border-outline-variant/30 flex justify-between items-center shrink-0">
                <button id="btn-prev" onclick="changeQuestion(-1)" class="px-5 py-2 border-2 border-outline-variant text-on-surface-variant rounded-lg text-xs font-bold hover:bg-secondary hover:text-on-secondary hover:border-secondary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">chevron_left</span>
                    Sebelumnya
                </button>
                <button id="btn-next" onclick="changeQuestion(1)" class="px-5 py-2 border-2 border-outline-variant text-on-surface-variant rounded-lg text-xs font-bold hover:bg-secondary hover:text-on-secondary hover:border-secondary transition-colors flex items-center gap-1">
                    Selanjutnya
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </button>
            </div>
        </section>

        <!-- Right Column: Navigation Grid & Submission -->
        <aside class="w-72 flex flex-col gap-4 h-full hidden lg:flex">
            <!-- Grid Panel -->
            <div class="flex-1 flex flex-col bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-4 border-b border-outline-variant/30 bg-surface-container-low flex justify-between items-center shrink-0">
                    <h2 class="font-bold text-sm text-primary">Navigasi Soal</h2>
                </div>
                <div class="p-4 overflow-y-auto flex-1 custom-scrollbar">
                    <div id="grid-container" class="grid grid-cols-5 gap-2">
                        <!-- JS Grid -->
                    </div>
                </div>
                <!-- Legend -->
                <div class="p-3 bg-surface-container border-t border-outline-variant/30 shrink-0 flex flex-col gap-1.5">
                    <div class="flex items-center gap-2 text-[10px] font-bold text-on-surface-variant">
                        <div class="w-3 h-3 rounded bg-primary"></div> Sudah Dijawab
                    </div>
                    <div class="flex items-center gap-2 text-[10px] font-bold text-on-surface-variant">
                        <div class="w-3 h-3 rounded bg-surface border border-outline-variant"></div> Belum Dijawab
                    </div>
                    <div class="flex items-center gap-2 text-[10px] font-bold text-on-surface-variant">
                        <div class="w-3 h-3 rounded bg-secondary-container border border-secondary"></div> Ragu-ragu
                    </div>
                </div>
            </div>
            <!-- Submit Panel -->
            <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/30 shrink-0">
                <p class="text-[10px] text-on-surface-variant mb-3 text-center">Pastikan semua terjawab.</p>
                <button onclick="submitExam()" class="w-full bg-error text-on-error hover:bg-[#a01616] py-2.5 rounded-lg text-xs font-bold shadow-sm flex items-center justify-center gap-2 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">task_alt</span>
                    Selesai & Kumpulkan
                </button>
            </div>
        </aside>
    </div>
</div>

@push('scripts')
<script>
    // State
    const totalQuestions = 15;
    const questions = Array.from({length: totalQuestions}, (_, i) => ({
        id: i + 1,
        text: `Soal no ${i + 1}: Tag HTML manakah yang digunakan untuk membuat daftar bernomor (ordered list)?`,
        options: ['<ul>', '<ol>', '<li>', '<dl>'],
        answer: null,
        doubt: false
    }));
    
    // Default mock data for testing
    questions[4].answer = 1; // answered B
    questions[4].doubt = true; 

    let currentIndex = 0; // 0 to 14

    function initExam() {
        renderGrid();
        loadQuestion(currentIndex);
    }

    function loadQuestion(index) {
        currentIndex = index;
        const q = questions[index];
        
        document.getElementById('question-label').innerText = `Soal No. ${q.id}`;
        document.getElementById('question-text').innerText = q.text;
        document.getElementById('progress-current').innerText = q.id;
        document.getElementById('progress-total').innerText = totalQuestions;

        // Render Options
        const container = document.getElementById('options-container');
        container.innerHTML = '';
        const labels = ['A', 'B', 'C', 'D'];
        q.options.forEach((opt, idx) => {
            const isSelected = q.answer === idx;
            const bgClass = isSelected ? 'border-primary bg-primary/5 border-2' : 'border-outline-variant hover:border-primary hover:bg-surface-container-low border';
            const textClass = isSelected ? 'text-primary font-bold' : 'text-on-surface-variant';
            
            container.innerHTML += `
                <label class="group relative flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-all ${bgClass}">
                    <input ${isSelected ? 'checked' : ''} onchange="selectAnswer(${idx})" class="w-4 h-4 text-primary border-outline-variant focus:ring-primary" name="answer" type="radio" value="${idx}"/>
                    <div class="flex-1 flex gap-2 items-center text-xs">
                        <span class="font-bold text-sm ${isSelected ? 'text-primary' : 'text-on-surface'}">${labels[idx]}.</span>
                        <span class="${textClass}">${opt.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</span>
                    </div>
                </label>
            `;
        });

        // Doubt Button
        const btnRagu = document.getElementById('btn-ragu');
        const iconRagu = document.getElementById('icon-ragu');
        if (q.doubt) {
            btnRagu.classList.add('text-secondary', 'bg-secondary/10');
            btnRagu.classList.remove('text-outline');
            iconRagu.style.fontVariationSettings = "'FILL' 1";
        } else {
            btnRagu.classList.remove('text-secondary', 'bg-secondary/10');
            btnRagu.classList.add('text-outline');
            iconRagu.style.fontVariationSettings = "'FILL' 0";
        }

        // Prev/Next visibility
        document.getElementById('btn-prev').style.visibility = index === 0 ? 'hidden' : 'visible';
        document.getElementById('btn-next').style.visibility = index === totalQuestions - 1 ? 'hidden' : 'visible';

        renderGrid();
    }

    function selectAnswer(optIndex) {
        questions[currentIndex].answer = optIndex;
        loadQuestion(currentIndex);
    }

    function toggleDoubt() {
        questions[currentIndex].doubt = !questions[currentIndex].doubt;
        loadQuestion(currentIndex);
    }

    function changeQuestion(step) {
        const newIndex = currentIndex + step;
        if (newIndex >= 0 && newIndex < totalQuestions) {
            loadQuestion(newIndex);
        }
    }

    function renderGrid() {
        const grid = document.getElementById('grid-container');
        if(!grid) return;
        grid.innerHTML = '';
        questions.forEach((q, idx) => {
            let classes = 'aspect-square rounded flex items-center justify-center text-xs font-bold transition-all relative cursor-pointer ';
            
            if (idx === currentIndex) {
                classes += 'ring-2 ring-primary border-2 border-primary bg-primary/10 text-primary scale-105 ';
            } else if (q.doubt) {
                classes += 'bg-secondary-container text-on-secondary-container border border-secondary hover:opacity-90 ';
            } else if (q.answer !== null) {
                classes += 'bg-primary text-on-primary border border-primary hover:opacity-90 ';
            } else {
                classes += 'bg-surface text-on-surface-variant border border-outline-variant hover:bg-surface-container ';
            }

            let doubtDot = '';
            if (q.doubt) {
                doubtDot = '<div class="absolute -top-1 -right-1 w-2 h-2 bg-secondary rounded-full"></div>';
            }

            grid.innerHTML += `
                <button onclick="loadQuestion(${idx})" class="${classes}">
                    ${q.id}
                    ${doubtDot}
                </button>
            `;
        });
    }

    function submitExam() {
        const unanswered = questions.filter(q => q.answer === null).length;
        const doubtful = questions.filter(q => q.doubt).length;
        
        if (unanswered > 0 || doubtful > 0) {
            let msg = [];
            if (unanswered > 0) msg.push(`${unanswered} soal belum dijawab`);
            if (doubtful > 0) msg.push(`${doubtful} soal ragu-ragu`);
            
            Swal.fire({
                title: 'Belum Selesai!',
                text: `Masih ada ${msg.join(' dan ')}. Silakan periksa kembali jawaban Anda.`,
                icon: 'warning',
                confirmButtonColor: '#50290b',
                confirmButtonText: 'Periksa Kembali'
            });
            return;
        }

        Swal.fire({
            title: 'Kumpulkan Kuis?',
            text: "Apakah Anda yakin ingin menyelesaikan kuis ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#50290b',
            cancelButtonColor: '#ba1a1a',
            confirmButtonText: 'Ya, Kumpulkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Kuis telah berhasil dikumpulkan.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "{{ route('siswa.mapel.detail') }}?tab=tugas";
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', initExam);
</script>
@endpush
@endsection
