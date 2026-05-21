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

<!-- Toast Container -->
<div id="toastContainer" class="fixed top-4 left-1/2 -translate-x-1/2 z-[60] flex flex-col gap-2 transition-all pointer-events-none"></div>

<div class="max-w-[1200px] mx-auto space-y-8">
    <div class="flex flex-wrap items-end justify-between gap-4 border-b border-outline-variant/30 pb-4">
        <div>
            <h2 class="font-bold text-4xl text-primary" style="font-family: var(--font-serif)">{{ request('edit') ? 'Edit Kuis' : 'Buat Kuis Baru' }}</h2>
            <p class="text-on-surface-variant text-lg">Rancang asesmen berkualitas untuk perkembangan akademik siswa.</p>
        </div>
        <div class="flex items-center gap-2 text-sm font-semibold text-on-surface-variant/60 italic">
            <span class="material-symbols-outlined text-sm">schedule</span>
            Tersimpan otomatis 14:05
        </div>
    </div>
    
    <form class="space-y-10 pb-10" id="quizForm">
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 space-y-6 sticky top-6">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Informasi Kuis</h3>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Nama Kuis</label>
                    <input class="w-full text-2xl font-semibold stationery-input py-2" id="quizName" placeholder="Contoh: Kuis Akhir Bab 3 - Jaringan Komputer" type="text" value="{{ request('judul') }}"/>
                    <p class="text-xs text-error font-bold hidden" id="err-quizName"></p>
                </div>
                <div class="space-y-2 relative" id="classDropdownContainer">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Pilih Kelas</label>
                    <button type="button" class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container flex justify-between items-center" onclick="toggleClassesDropdown()">
                        <span id="selectedClassesText" class="text-on-surface-variant">Pilih Kelas...</span>
                        <span class="material-symbols-outlined">expand_more</span>
                    </button>
                    <div id="classesDropdown" class="absolute z-10 w-full mt-1 bg-white border border-outline-variant/50 rounded-lg shadow-lg hidden top-full left-0">
                        <ul class="p-2 space-y-1 max-h-48 overflow-y-auto">
                            <li>
                                <label class="flex items-center gap-3 p-2 hover:bg-surface-container-low rounded cursor-pointer group">
                                    <input type="checkbox" value="X TKJ 1" class="w-5 h-5 text-secondary border-outline rounded class-checkbox" onchange="updateSelectedClasses()" {{ str_contains(request('kelas', ''), 'X TKJ 1') ? 'checked' : '' }}>
                                    <span class="text-sm group-hover:text-primary">X TKJ 1</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center gap-3 p-2 hover:bg-surface-container-low rounded cursor-pointer group">
                                    <input type="checkbox" value="X TKJ 2" class="w-5 h-5 text-secondary border-outline rounded class-checkbox" onchange="updateSelectedClasses()" {{ str_contains(request('kelas', ''), 'X TKJ 2') ? 'checked' : '' }}>
                                    <span class="text-sm group-hover:text-primary">X TKJ 2</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center gap-3 p-2 hover:bg-surface-container-low rounded cursor-pointer group">
                                    <input type="checkbox" value="XI TKJ 1" class="w-5 h-5 text-secondary border-outline rounded class-checkbox" onchange="updateSelectedClasses()" {{ str_contains(request('kelas', ''), 'XI TKJ 1') ? 'checked' : '' }}>
                                    <span class="text-sm group-hover:text-primary">XI TKJ 1</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center gap-3 p-2 hover:bg-surface-container-low rounded cursor-pointer group">
                                    <input type="checkbox" value="XI TKJ 2" class="w-5 h-5 text-secondary border-outline rounded class-checkbox" onchange="updateSelectedClasses()" {{ str_contains(request('kelas', ''), 'XI TKJ 2') ? 'checked' : '' }}>
                                    <span class="text-sm group-hover:text-primary">XI TKJ 2</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <p class="text-xs text-error font-bold hidden" id="err-quizClasses"></p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Semester/Periode</label>
                        <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container" id="quizSemester">
                            <option>Ganjil 2023/2024</option>
                            <option>Genap 2023/2024</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Durasi Kuis (Menit)</label>
                        <div class="relative flex items-center">
                            <input class="w-full p-3 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container pr-12" id="quizDuration" type="number" value="{{ request('durasi', 60) }}"/>
                            <span class="absolute right-4 text-on-surface-variant/60 text-xs font-bold uppercase tracking-wider">Min</span>
                        </div>
                        <p class="text-xs text-error font-bold hidden" id="err-quizDuration"></p>
                    </div>
                </div>
                <div class="space-y-4">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Status Kuis</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input {{ request('status', 'draft') === 'draft' ? 'checked' : '' }} class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="draft" onchange="toggleScheduleInput()"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Draft</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input {{ in_array(request('status'), ['aktif', 'published']) ? 'checked' : '' }} class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="published" onchange="toggleScheduleInput()"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Published</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input {{ in_array(request('status'), ['selesai', 'closed']) ? 'checked' : '' }} class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="closed" onchange="toggleScheduleInput()"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Closed</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input {{ request('status') === 'archived' ? 'checked' : '' }} class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="archived" onchange="toggleScheduleInput()"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Archived</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input {{ request('status') === 'scheduled' ? 'checked' : '' }} class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" name="status" type="radio" value="scheduled" onchange="toggleScheduleInput()"/>
                            <span class="text-sm group-hover:text-primary transition-colors">Terjadwal</span>
                        </label>
                    </div>
                    <div id="scheduleContainer" class="hidden space-y-2 mt-4 bg-surface-container-low p-4 rounded-lg border border-outline/30">
                        <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Pilih Waktu Mulai</label>
                        <input class="w-full p-3 bg-white border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container" type="datetime-local" id="quizScheduleDate"/>
                        <p class="text-xs text-on-surface-variant/60 italic">Kuis akan otomatis diterbitkan pada waktu yang ditentukan (minimal 5 menit dari sekarang).</p>
                        <p class="text-xs text-error font-bold hidden" id="err-quizSchedule"></p>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Deskripsi Kuis</label>
                    <textarea class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container resize-none" placeholder="Berikan instruksi atau deskripsi singkat mengenai cakupan materi kuis ini..." rows="4"></textarea>
                </div>
                
                <div class="pt-6 border-t border-outline-variant/30 flex items-center justify-end gap-4">
                    <button class="px-6 py-3 border-2 border-primary text-primary font-bold rounded-lg hover:bg-primary/5 transition-colors" type="button" onclick="openActionModal('cancel')">
                        Batalkan
                    </button>
                    <button class="px-8 py-3 bg-secondary-container text-on-secondary-container font-bold rounded-lg shadow-sm hover:opacity-90 active:scale-95 transition-all flex items-center gap-2" type="button" onclick="openActionModal('save')">
                        <span class="material-symbols-outlined">send</span>
                        {{ request('edit') ? 'Perbarui Tugas' : 'Simpan Tugas' }}
                    </button>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 space-y-6" id="questionContainer">
                <h3 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Pembuat Soal</h3>
                <p class="text-on-surface-variant text-base">Tambahkan butir soal satu per satu. Anda bisa memilih antara Pilihan Ganda untuk penilaian otomatis atau Esai.</p>
                <p class="text-xs text-error font-bold hidden" id="err-quizQuestions"></p>
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
                    <button class="absolute top-4 right-4 text-on-surface-variant/40 hover:text-error transition-colors" type="button" onclick="openDeleteModal(this)">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Tipe Soal</label>
                            <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg question-type" onchange="toggleQuestionType(this, 1)">
                                <option value="pg">Pilihan Ganda</option>
                                <option value="essay">Esai</option>
                            </select>
                        </div>
                        <div class="col-span-1 md:col-span-2 pg-multi-option" id="multi-1">
                            <label class="flex items-center gap-3 cursor-pointer group w-max">
                                <input class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" type="checkbox" onchange="toggleMultiAnswer(this, 1)"/>
                                <span class="text-sm font-bold text-on-surface-variant group-hover:text-primary transition-colors">Jawaban benar lebih dari satu</span>
                            </label>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Bobot Nilai</label>
                            <input class="w-full p-3 bg-surface-container-low border border-outline rounded-lg question-weight" type="number" value="10"/>
                            <p class="text-xs text-error font-bold hidden err-weight"></p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Teks Soal</label>
                            <textarea class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container question-text" placeholder="Masukkan pertanyaan kuis di sini..." rows="3"></textarea>
                            <p class="text-xs text-error font-bold hidden err-text"></p>
                        </div>
                <div class="pg-options space-y-4" id="options-1">
                            <p class="text-xs text-on-surface-variant italic mb-2">Tentukan opsi jawaban dan pilih jawaban yang benar:</p>
                            <p class="text-xs text-error font-bold hidden err-options"></p>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline opt-input-1 question-correct" name="q1-correct" type="radio" value="A"/>
                                <span class="font-bold text-on-surface-variant">A.</span>
                                <input class="flex-1 stationery-input py-1 question-option-text" placeholder="Opsi A" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline opt-input-1 question-correct" name="q1-correct" type="radio" value="B"/>
                                <span class="font-bold text-on-surface-variant">B.</span>
                                <input class="flex-1 stationery-input py-1 question-option-text" placeholder="Opsi B" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline opt-input-1 question-correct" name="q1-correct" type="radio" value="C"/>
                                <span class="font-bold text-on-surface-variant">C.</span>
                                <input class="flex-1 stationery-input py-1 question-option-text" placeholder="Opsi C" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline opt-input-1 question-correct" name="q1-correct" type="radio" value="D"/>
                                <span class="font-bold text-on-surface-variant">D.</span>
                                <input class="flex-1 stationery-input py-1 question-option-text" placeholder="Opsi D" type="text"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <input class="w-5 h-5 text-secondary border-outline opt-input-1 question-correct" name="q1-correct" type="radio" value="E"/>
                                <span class="font-bold text-on-surface-variant">E.</span>
                                <input class="flex-1 stationery-input py-1 question-option-text" placeholder="Opsi E" type="text"/>
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

<!-- Modal Confirm Delete Question -->
<div id="deleteQuestionModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-white rounded-xl shadow-lg w-[90%] max-w-md p-6 transform scale-95 transition-transform duration-300">
        <h4 class="text-xl font-bold text-primary mb-2">Hapus Soal?</h4>
        <p class="text-on-surface-variant mb-6">Apakah Anda yakin ingin menghapus soal ini? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex justify-end gap-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2 font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="px-5 py-2 font-bold bg-error text-on-error rounded-lg shadow-sm hover:opacity-90 transition-all">Hapus</button>
        </div>
    </div>
</div>

<!-- Modal Confirm Action -->
<div id="actionModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-white rounded-xl shadow-lg w-[90%] max-w-md p-6 transform scale-95 transition-transform duration-300">
        <h4 class="text-xl font-bold text-primary mb-2" id="actionModalTitle">Konfirmasi</h4>
        <p class="text-on-surface-variant mb-6" id="actionModalDesc">Apakah Anda yakin dengan tindakan ini?</p>
        <div class="flex justify-end gap-3">
            <button type="button" onclick="closeActionModal()" class="px-5 py-2 font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors">Tidak, Kembali</button>
            <button type="button" id="confirmActionBtn" class="px-5 py-2 font-bold bg-secondary-container text-on-secondary-container rounded-lg shadow-sm hover:opacity-90 transition-all">Ya, Yakin</button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let questionCount = 1;

    function toggleQuestionType(selectElement, id) {
        const optionsDiv = document.getElementById(`options-${id}`);
        const noteDiv = document.getElementById(`note-${id}`);
        const multiDiv = document.getElementById(`multi-${id}`);

        if (selectElement.value === 'essay') {
            optionsDiv.classList.add('hidden');
            noteDiv.classList.remove('hidden');
            if(multiDiv) multiDiv.classList.add('hidden');
        } else {
            optionsDiv.classList.remove('hidden');
            noteDiv.classList.add('hidden');
            if(multiDiv) multiDiv.classList.remove('hidden');
        }
    }

    function toggleMultiAnswer(checkboxElement, id) {
        const inputs = document.querySelectorAll(`.opt-input-${id}`);
        inputs.forEach(input => {
            if (checkboxElement.checked) {
                input.type = 'checkbox';
                input.name = `q${id}-correct[]`;
            } else {
                input.type = 'radio';
                input.name = `q${id}-correct`;
                input.checked = false;
            }
        });
    }

    function addQuestion() {
        questionCount++;
        const container = document.getElementById('questionContainer');
        const btn = container.querySelector('button[onclick="addQuestion()"]');

        const newCard = document.createElement('div');
        newCard.className = 'question-card bg-white p-6 rounded-xl shadow-sm border border-outline-variant/20 relative group animate-in fade-in slide-in-from-bottom-4 duration-300';
        newCard.innerHTML = `
            <div class="absolute -left-3 top-6 bg-primary text-on-primary w-8 h-8 rounded-full flex items-center justify-center font-bold">${questionCount}</div>
            <button type="button" class="absolute top-4 right-4 text-on-surface-variant/40 hover:text-error transition-colors" onclick="openDeleteModal(this)">
                <span class="material-symbols-outlined">delete</span>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Tipe Soal</label>
                    <select class="w-full p-3 bg-surface-container-low border border-outline rounded-lg question-type" onchange="toggleQuestionType(this, ${questionCount})">
                        <option value="pg">Pilihan Ganda</option>
                        <option value="essay">Esai</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Bobot Nilai</label>
                    <input type="number" value="10" class="w-full p-3 bg-surface-container-low border border-outline rounded-lg question-weight">
                    <p class="text-xs text-error font-bold hidden err-weight"></p>
                </div>
                <div class="col-span-1 md:col-span-2 pg-multi-option" id="multi-${questionCount}">
                    <label class="flex items-center gap-3 cursor-pointer group w-max">
                        <input class="w-5 h-5 text-secondary border-outline focus:ring-secondary-container" type="checkbox" onchange="toggleMultiAnswer(this, ${questionCount})"/>
                        <span class="text-sm font-bold text-on-surface-variant group-hover:text-primary transition-colors">Jawaban benar lebih dari satu</span>
                    </label>
                </div>
            </div>

            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Teks Soal</label>
                    <textarea rows="3" placeholder="Masukkan pertanyaan kuis di sini..." class="w-full p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-2 focus:ring-secondary-container question-text"></textarea>
                    <p class="text-xs text-error font-bold hidden err-text"></p>
                </div>

                <div class="pg-options space-y-4" id="options-${questionCount}">
                    <p class="text-xs text-on-surface-variant italic mb-2">Tentukan opsi jawaban dan pilih jawaban yang benar:</p>
                    <p class="text-xs text-error font-bold hidden err-options"></p>
                            ${['A', 'B', 'C', 'D', 'E'].map(letter => `
                        <div class="flex items-center gap-4">
                            <input type="radio" name="q${questionCount}-correct" class="w-5 h-5 text-secondary border-outline opt-input-${questionCount} question-correct" value="${letter}">
                            <span class="font-bold text-on-surface-variant">${letter}.</span>
                            <input type="text" placeholder="Opsi ${letter}" class="flex-1 stationery-input py-1 question-option-text">
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

    // Modal Delete Logic
    let questionToDelete = null;

    function openDeleteModal(btn) {
        questionToDelete = btn.closest('.question-card');
        const modal = document.getElementById('deleteQuestionModal');
        modal.classList.remove('hidden');
        void modal.offsetWidth; // trigger reflow
        modal.classList.remove('opacity-0');
        modal.querySelector('div').classList.remove('scale-95');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteQuestionModal');
        modal.classList.add('opacity-0');
        modal.querySelector('div').classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            questionToDelete = null;
        }, 300);
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (questionToDelete) {
            questionToDelete.remove();
        }
        closeDeleteModal();
    });

    // Modal Action Logic
    let currentAction = null;

    function openActionModal(action) {
        currentAction = action;
        const modal = document.getElementById('actionModal');
        const title = document.getElementById('actionModalTitle');
        const desc = document.getElementById('actionModalDesc');
        const confirmBtn = document.getElementById('confirmActionBtn');

        if (action === 'cancel') {
            title.textContent = 'Batalkan Pembuatan?';
            desc.textContent = 'Apakah Anda yakin ingin membatalkan? Semua data yang telah diisi akan hilang.';
            confirmBtn.className = 'px-5 py-2 font-bold bg-error text-on-error rounded-lg shadow-sm hover:opacity-90 transition-all';
            confirmBtn.textContent = 'Ya, Batalkan';
        } else if (action === 'save') {
            title.textContent = 'Simpan Kuis?';
            desc.textContent = 'Apakah Anda yakin ingin menyimpan kuis ini? Kuis akan dipublikasikan atau disimpan sesuai status.';
            confirmBtn.className = 'px-5 py-2 font-bold bg-secondary-container text-on-secondary-container rounded-lg shadow-sm hover:opacity-90 transition-all';
            confirmBtn.textContent = 'Ya, Simpan';
        }

        modal.classList.remove('hidden');
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        modal.querySelector('div').classList.remove('scale-95');
    }

    function closeActionModal() {
        const modal = document.getElementById('actionModal');
        modal.classList.add('opacity-0');
        modal.querySelector('div').classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            currentAction = null;
        }, 300);
    }

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `px-6 py-3 rounded-full shadow-lg font-bold text-white transform transition-all duration-300 -translate-y-4 opacity-0 flex items-center gap-2 ${type === 'success' ? 'bg-green-500' : 'bg-error text-on-error'}`;
        toast.innerHTML = `
            <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : 'info'}</span>
            ${message}
        `;
        document.getElementById('toastContainer').appendChild(toast);
        
        setTimeout(() => toast.classList.remove('-translate-y-4', 'opacity-0'), 10);

        setTimeout(() => {
            toast.classList.add('-translate-y-4', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }

    function clearErrors() {
        document.querySelectorAll('.text-error:not(#toastContainer .text-error)').forEach(el => {
            if(el.tagName === 'P') {
                el.classList.add('hidden');
                el.innerText = '';
            }
        });
    }

    function toggleScheduleInput() {
        const scheduledRadio = document.querySelector('input[name="status"][value="scheduled"]');
        const scheduleContainer = document.getElementById('scheduleContainer');
        if (scheduledRadio.checked) {
            scheduleContainer.classList.remove('hidden');
        } else {
            scheduleContainer.classList.add('hidden');
        }
    }

    function toggleClassesDropdown() {
        const dropdown = document.getElementById('classesDropdown');
        dropdown.classList.toggle('hidden');
    }

    function updateSelectedClasses() {
        const checked = document.querySelectorAll('.class-checkbox:checked');
        const textSpan = document.getElementById('selectedClassesText');
        if (checked.length === 0) {
            textSpan.textContent = 'Pilih Kelas...';
            textSpan.classList.add('text-on-surface-variant');
            textSpan.classList.remove('font-semibold');
        } else {
            const values = Array.from(checked).map(cb => cb.value);
            textSpan.textContent = values.join(', ');
            textSpan.classList.remove('text-on-surface-variant');
            textSpan.classList.add('font-semibold');
        }
    }

    document.addEventListener('click', function(event) {
        const container = document.getElementById('classDropdownContainer');
        const dropdown = document.getElementById('classesDropdown');
        if (container && !container.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    function validateForm() {
        clearErrors();
        let isValid = true;
        let firstErrorElement = null;

        function showError(idOrElement, message) {
            isValid = false;
            let el = typeof idOrElement === 'string' ? document.getElementById(idOrElement) : idOrElement;
            if (el) {
                el.innerText = message;
                el.classList.remove('hidden');
                if (!firstErrorElement) firstErrorElement = el;
            }
        }

        const name = document.getElementById('quizName').value.trim();
        if (!name) showError('err-quizName', 'Nama Kuis harus diisi.');

        const classes = document.querySelectorAll('.class-checkbox:checked');
        if (classes.length === 0) showError('err-quizClasses', 'Pilih minimal satu Kelas.');

        const duration = document.getElementById('quizDuration').value;
        if (!duration || duration <= 0) showError('err-quizDuration', 'Durasi Kuis tidak valid.');

        const scheduledRadio = document.querySelector('input[name="status"][value="scheduled"]');
        if (scheduledRadio.checked) {
            const scheduleInput = document.getElementById('quizScheduleDate').value;
            if (!scheduleInput) {
                showError('err-quizSchedule', 'Waktu mulai harus diisi jika kuis terjadwal.');
            } else {
                const scheduleDate = new Date(scheduleInput);
                const now = new Date();
                const diffMinutes = (scheduleDate - now) / 1000 / 60;
                if (diffMinutes < 5) {
                    showError('err-quizSchedule', 'Waktu mulai minimal 5 menit dari waktu saat ini.');
                }
            }
        }

        const questions = document.querySelectorAll('.question-card');
        if (questions.length < 5) showError('err-quizQuestions', 'Minimal harus ada 5 soal.');

        questions.forEach((q, index) => {
            const weight = q.querySelector('.question-weight').value;
            if (!weight || weight <= 0) showError(q.querySelector('.err-weight'), 'Bobot nilai belum diisi.');
            
            const text = q.querySelector('.question-text').value.trim();
            if (!text) showError(q.querySelector('.err-text'), 'Teks soal belum diisi.');

            const type = q.querySelector('.question-type').value;
            if (type === 'pg') {
                const opts = q.querySelectorAll('.question-option-text');
                let optsValid = true;
                opts.forEach(opt => {
                    if (!opt.value.trim()) optsValid = false;
                });
                
                const checked = q.querySelectorAll('.question-correct:checked');
                
                let optErr = [];
                if (!optsValid) optErr.push('Semua opsi jawaban harus diisi.');
                if (checked.length === 0) optErr.push('Pilih minimal satu jawaban benar.');
                
                if (optErr.length > 0) {
                    showError(q.querySelector('.err-options'), optErr.join(' '));
                }
            }
        });

        if (!isValid && firstErrorElement) {
            firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        return isValid;
    }

    document.getElementById('confirmActionBtn').addEventListener('click', function() {
        if (currentAction === 'cancel') {
            closeActionModal();
            showToast('Berhasil dibatalkan', 'error');
            setTimeout(() => {
                window.location.href = '/guru/kuis';
            }, 1500);
        } else if (currentAction === 'save') {
            if (validateForm()) {
                closeActionModal();
                showToast(document.querySelector('h2').textContent.includes('Edit') ? 'Berhasil diperbarui' : 'Berhasil disimpan', 'success');
                setTimeout(() => {
                    window.location.href = '/guru/kuis';
                }, 1500);
            } else {
                closeActionModal();
            }
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateSelectedClasses();
        toggleScheduleInput();
    });
</script>
@endpush

