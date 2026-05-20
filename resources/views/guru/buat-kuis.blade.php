@extends('layouts.guru')

@section('title', 'Buat Kuis Baru - SMK Mandalahayu 1')
@section('page-title', 'Kuis')

@section('content')
<style>
    .stationery-input {
        border: none;
        border-bottom: 2px solid #84746b;
        background: transparent;
        transition: border-color 0.3s ease;
    }
    .stationery-input:focus {
        outline: none;
        border-bottom-color: #feae2c;
        ring: 0;
    }
</style>

<div class="max-w-[1200px] mx-auto space-y-8">
    <div class="flex flex-wrap items-end justify-between gap-4 border-b border-outline-variant/30 pb-4">
        <div>
            <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">Buat Kuis Baru</h2>
            <p class="text-on-surface-variant text-lg">Rancang asesmen berkualitas untuk perkembangan akademik siswa.</p>
        </div>
        <div class="flex items-center gap-2 text-sm font-semibold text-on-surface-variant/60 italic">
            <span class="material-symbols-outlined text-sm">schedule</span>
            Tersimpan otomatis 14:05
        </div>
    </div>
    
    <form class="space-y-10 pb-28" id="quizForm">
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 space-y-6">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Informasi Kuis</h3>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Kuis</label>
                    <input class="w-full text-2xl font-semibold stationery-input py-2" placeholder="Contoh: Kuis Akhir Bab 3 - Jaringan Komputer" type="text"/>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Pilih Kelas</label>
                    <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container appearance-none min-h-[120px]" multiple>
                        <option value="X-TKJ-1">X TKJ 1</option>
                        <option value="X-TKJ-2">X TKJ 2</option>
                        <option value="XI-TKJ-1">XI TKJ 1</option>
                        <option value="XI-TKJ-2">XI TKJ 2</option>
                    </select>
                    <p class="text-xs text-on-surface-variant/60 mt-1 italic">Tahan Ctrl/Cmd untuk memilih lebih dari satu.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Semester/Periode</label>
                        <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container">
                            <option>Ganjil 2023/2024</option>
                            <option>Genap 2023/2024</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Durasi Kuis (Menit)</label>
                        <div class="relative flex items-center">
                            <input class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container pr-12" type="number" value="60"/>
                            <span class="absolute right-4 text-on-surface-variant/60 text-xs font-bold uppercase tracking-wider">Min</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Status Kuis</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input checked class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="draft"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Draft</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="published"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Published</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="closed"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Closed</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="archived"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Archived</span>
                        </label>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Deskripsi Kuis</label>
                    <textarea class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container resize-none" placeholder="Berikan instruksi atau deskripsi singkat mengenai cakupan materi kuis ini..." rows="4"></textarea>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 space-y-6" id="questionContainer">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Pembuat Soal</h3>
                <p class="text-on-surface-variant text-base">Tambahkan butir soal satu per satu. Anda bisa memilih antara Pilihan Ganda untuk penilaian otomatis atau Esai.</p>
                <div class="mt-4 p-4 bg-secondary-fixed/30 rounded-lg border border-secondary-container/20">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-secondary-container">info</span>
                        <div>
                            <p class="font-bold text-on-secondary-container">Tips Auto-Grading</p>
                            <p class="text-sm text-on-secondary-container/80">Pastikan Anda memilih 'Jawaban Benar' untuk tipe soal Pilihan Ganda agar sistem dapat menilai secara otomatis.</p>
                        </div>
                    </div>
                </div>
                <div class="question-card bg-white p-6 rounded-xl shadow-sm border border-outline-variant/20 relative group">
                    <div class="absolute -left-3 top-6 bg-primary text-on-primary w-8 h-8 rounded-full flex items-center justify-center font-bold">1</div>
                    <button class="absolute top-4 right-4 text-on-surface-variant/40 hover:text-error transition-colors" type="button">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Tipe Soal</label>
                            <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg" onchange="toggleQuestionType(this, 1)">
                                <option value="pg">Pilihan Ganda</option>
                                <option value="essay">Esai</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Bobot Nilai</label>
                            <input class="w-full p-3 bg-surface-container-low border border-outline rounded-lg" type="number" value="10"/>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Teks Soal</label>
                            <textarea class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container" placeholder="Masukkan pertanyaan kuis di sini..." rows="3"></textarea>
                        </div>
                <div class="pg-options space-y-4" id="options-1">
                            <p class="text-xs text-on-surface-variant italic mb-2">Tentukan opsi jawaban dan pilih jawaban yang benar:</p>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline" name="q1-correct" type="checkbox" value="A"/>
                                <span class="font-bold text-on-surface-variant">A.</span>
                                <input class="flex-1 stationery-input py-1" placeholder="Opsi A" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline" name="q1-correct" type="checkbox" value="B"/>
                                <span class="font-bold text-on-surface-variant">B.</span>
                                <input class="flex-1 stationery-input py-1" placeholder="Opsi B" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline" name="q1-correct" type="checkbox" value="C"/>
                                <span class="font-bold text-on-surface-variant">C.</span>
                                <input class="flex-1 stationery-input py-1" placeholder="Opsi C" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline" name="q1-correct" type="checkbox" value="D"/>
                                <span class="font-bold text-on-surface-variant">D.</span>
                                <input class="flex-1 stationery-input py-1" placeholder="Opsi D" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline" name="q1-correct" type="checkbox" value="E"/>
                                <span class="font-bold text-on-surface-variant">E.</span>
                                <input class="flex-1 stationery-input py-1" placeholder="Opsi E" type="text"/>
                            </div>
                        </div>
                        <div class="essay-note hidden bg-surface-container-highest p-4 rounded-lg flex items-start gap-3 text-on-surface-variant" id="note-1">
                            <span class="material-symbols-outlined text-primary">edit_square</span>
                            <p class="text-sm italic">Soal bertipe Esai akan dinilai secara manual oleh guru setelah kuis selesai dikerjakan.</p>
                        </div>
                    </div>
                </div>
                <button class="w-full py-5 border-2 border-dashed border-outline-variant hover:border-secondary-container hover:bg-secondary-container/5 transition-all rounded-xl flex flex-col items-center justify-center gap-2 group" onclick="addQuestion()" type="button">
                    <span class="material-symbols-outlined text-4xl text-outline-variant group-hover:text-secondary-container transition-colors">add_circle</span>
                    <span class="font-bold text-on-surface-variant group-hover:text-primary transition-colors">Tambah Soal Baru</span>
                </button>
            </div>
        </section>
    </form>
</div>

<!-- Sticky Footer Form Actions -->
<footer class="fixed bottom-0 right-0 left-0 md:left-64 bg-white/80 backdrop-blur-md border-t border-outline-variant/30 px-6 md:px-8 py-5 flex flex-wrap gap-4 justify-between items-center z-40">
    <div class="flex items-center gap-4 text-on-surface-variant">
        <div class="flex -space-x-2">
            <div class="w-8 h-8 rounded-full border-2 border-white bg-primary-fixed-dim"></div>
            <div class="w-8 h-8 rounded-full border-2 border-white bg-secondary-fixed"></div>
        </div>
        <span class="text-sm font-semibold">Akses tersedia untuk 4 kelas pilihan.</span>
    </div>
    <div class="flex items-center gap-4">
                            <button class="px-6 py-3 border-2 border-primary text-primary font-bold rounded-lg hover:bg-primary/5 transition-colors" type="button">
            Batalkan
        </button>
        <button class="px-8 py-3 bg-secondary-container text-on-secondary-container font-bold rounded-lg shadow-sm hover:opacity-90 active:scale-95 transition-all flex items-center gap-2" form="quizForm" type="submit">
            <span class="material-symbols-outlined">send</span>
            Simpan Tugas
        </button>
    </div>
</footer>
@endsection

@push('scripts')
<script>
    let questionCount = 1;

    function toggleQuestionType(selectElement, id) {
        const optionsDiv = document.getElementById(`options-${id}`);
        const noteDiv = document.getElementById(`note-${id}`);

        if (selectElement.value === 'essay') {
            optionsDiv.classList.add('hidden');
            noteDiv.classList.remove('hidden');
        } else {
            optionsDiv.classList.remove('hidden');
            noteDiv.classList.add('hidden');
        }
    }

    function addQuestion() {
        questionCount++;
        const container = document.getElementById('questionContainer');
        const btn = container.querySelector('button[onclick="addQuestion()"]');

        const newCard = document.createElement('div');
        newCard.className = 'question-card bg-white p-6 rounded-xl shadow-sm border border-outline-variant/20 relative group animate-in fade-in slide-in-from-bottom-4 duration-300';
        newCard.innerHTML = `
            <div class="absolute -left-3 top-6 bg-primary text-on-primary w-8 h-8 rounded-full flex items-center justify-center font-bold">${questionCount}</div>
            <button type="button" class="absolute top-4 right-4 text-on-surface-variant/40 hover:text-error transition-colors" onclick="this.closest('.question-card').remove()">
                <span class="material-symbols-outlined">delete</span>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Tipe Soal</label>
                    <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg" onchange="toggleQuestionType(this, ${questionCount})">
                        <option value="pg">Pilihan Ganda</option>
                        <option value="essay">Esai</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Bobot Nilai</label>
                    <input type="number" value="10" class="w-full p-3 bg-surface-container-low border border-outline rounded-lg">
                </div>
            </div>

            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Teks Soal</label>
                    <textarea rows="3" placeholder="Masukkan pertanyaan kuis di sini..." class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container"></textarea>
                </div>

                <div class="pg-options space-y-4" id="options-${questionCount}">
                    <p class="text-xs text-on-surface-variant italic mb-2">Tentukan opsi jawaban dan pilih jawaban yang benar:</p>
                            ${['A', 'B', 'C', 'D', 'E'].map(letter => `
                        <div class="flex items-center gap-4">
                            <input type="checkbox" name="q${questionCount}-correct" class="w-5 h-5 text-secondary border-outline" value="${letter}">
                            <span class="font-bold text-on-surface-variant">${letter}.</span>
                            <input type="text" placeholder="Opsi ${letter}" class="flex-1 stationery-input py-1">
                        </div>
                    `).join('')}
                </div>

                <div class="essay-note hidden bg-surface-container-highest p-4 rounded-lg flex items-start gap-3 text-on-surface-variant" id="note-${questionCount}">
                    <span class="material-symbols-outlined text-primary">edit_square</span>
                    <p class="text-sm italic">Soal bertipe Esai akan dinilai secara manual oleh guru setelah kuis selesai dikerjakan.</p>
                </div>
            </div>
        `;

        container.insertBefore(newCard, btn);
        newCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
</script>
@endpush

