@extends('layouts.siswa')
@section('title', 'Pengumpulan Tugas - SMK Mandalahayu 1')
@section('page-title', 'Tugas 1: Portofolio Sederhana')

@section('content')
<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background-color: var(--color-outline-variant); border-radius: 10px; }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex-1 overflow-hidden flex gap-4 w-full h-[calc(100vh-120px)] -mt-2">
    <!-- LEFT PANEL: Task Details -->
    <section class="w-full md:w-1/2 flex flex-col h-full bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
        <div class="p-5 border-b border-outline-variant/30 shrink-0">
            <div class="inline-flex items-center gap-2 bg-surface-container-low text-primary px-2.5 py-0.5 rounded-full mb-3">
                <span class="material-symbols-outlined text-[14px]">menu_book</span>
                <span class="font-bold text-[10px]">Pemrograman Web</span>
            </div>
            <h1 class="font-bold text-lg text-primary mb-4" style="font-family: var(--font-serif)">Tugas 1: Membuat Halaman Portofolio Sederhana</h1>
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-1.5 bg-error/10 text-error rounded-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                    </div>
                    <div>
                        <span class="font-bold text-[10px] text-on-surface-variant block">Tenggat Waktu</span>
                        <span class="font-bold text-[11px] text-error block mt-0.5">05 Nov 2023 • 23:59 WIB</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="p-1.5 bg-primary/10 text-primary rounded-md">
                        <span class="material-symbols-outlined text-[16px]">monitoring</span>
                    </div>
                    <div>
                        <span class="font-bold text-[10px] text-on-surface-variant block">Bobot Nilai</span>
                        <span class="font-bold text-[11px] text-on-surface block mt-0.5">20% dari Akhir Semester</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5 overflow-y-auto flex-1 custom-scrollbar">
            <h3 class="font-bold text-sm text-primary mb-3">Deskripsi Tugas</h3>
            <div class="prose max-w-none text-[11px] text-on-surface-variant space-y-2">
                <p>Gunakan HTML dan CSS murni tanpa framework untuk membuat halaman portofolio sederhana.</p>
                <p class="font-bold text-on-surface mt-3">Kriteria Penilaian:</p>
                <ul class="list-disc pl-4 space-y-1 mt-1">
                    <li>Minimal terdiri dari bagian Header, About Me, Projects, dan Contact.</li>
                    <li>Desain responsif dan enak dilihat.</li>
                    <li>Struktur HTML yang rapi (semantik).</li>
                </ul>
            </div>
            
            <div class="mt-5 pt-4 border-t border-surface-container">
                <p class="font-bold text-[10px] text-on-surface-variant mb-2">Lampiran Guru:</p>
                <a class="flex items-center gap-2 p-2 rounded-lg border border-outline-variant hover:bg-surface-container-low transition-colors group" href="#">
                    <span class="material-symbols-outlined text-primary text-[18px] group-hover:text-secondary">picture_as_pdf</span>
                    <div class="flex-1 leading-tight">
                        <p class="font-bold text-[11px] text-on-surface group-hover:text-secondary transition-colors">Mockup_Portofolio.pdf</p>
                        <p class="text-[10px] text-on-surface-variant mt-0.5">1.2 MB</p>
                    </div>
                    <span class="material-symbols-outlined text-on-surface-variant text-[16px] group-hover:text-secondary">download</span>
                </a>
            </div>
        </div>
    </section>

    <!-- RIGHT PANEL: Submission Area -->
    <section class="w-full md:w-1/2 flex flex-col h-full gap-4">
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/30 flex justify-between items-center shrink-0">
            <div>
                <p class="font-bold text-[10px] text-on-surface-variant">Status Pengumpulan</p>
                <div class="flex items-center gap-1.5 mt-1">
                    <span class="material-symbols-outlined text-[16px] text-outline">pending_actions</span>
                    <p class="font-bold text-xs text-on-surface">Belum diserahkan</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-bold text-[10px] text-on-surface-variant">Nilai</p>
                <p class="font-bold text-xs text-outline">-</p>
            </div>
        </div>

        <div class="bg-surface-container-lowest rounded-xl p-5 shadow-sm border border-outline-variant/30 flex-1 flex flex-col overflow-hidden">
            <h3 class="font-bold text-sm text-primary mb-3">Area Pengumpulan</h3>
            
            <div class="flex-1 overflow-y-auto custom-scrollbar flex flex-col pr-1 gap-3">
                <div class="shrink-0">
                    <label class="block font-bold text-[10px] text-on-surface mb-1.5">Catatan Tambahan (Opsional)</label>
                    <div class="border border-outline-variant rounded-lg overflow-hidden focus-within:border-secondary transition-all">
                        <textarea class="w-full p-2 bg-transparent border-none focus:ring-0 text-[11px] text-on-surface resize-none placeholder-on-surface-variant/50" placeholder="Tuliskan pesan untuk guru..." rows="2"></textarea>
                    </div>
                </div>
                
                <div class="flex-1 flex flex-col min-h-[120px]">
                    <label class="block font-bold text-[10px] text-on-surface mb-1.5">Unggah Berkas <span class="text-error">*</span></label>
                    <input type="file" id="file-upload" class="hidden" onchange="handleFileUpload(event)">
                    <div id="upload-zone" onclick="document.getElementById('file-upload').click()" class="border-2 border-dashed border-outline-variant hover:border-secondary bg-surface-container-low hover:bg-surface-container rounded-xl flex-1 flex flex-col items-center justify-center text-center cursor-pointer transition-colors group p-4">
                        <div class="w-10 h-10 bg-surface-container-highest rounded-full flex items-center justify-center mb-2 group-hover:bg-primary-fixed-dim/20 transition-colors">
                            <span class="material-symbols-outlined text-xl text-primary group-hover:text-secondary">cloud_upload</span>
                        </div>
                        <p id="upload-text" class="text-xs text-on-surface font-bold">Tarik & lepas file</p>
                        <p id="upload-subtext" class="text-[10px] text-on-surface-variant">atau klik untuk mencari dari perangkat</p>
                        <p class="text-[9px] text-on-surface-variant mt-2 font-bold">Maks. 50MB (ZIP/RAR/PDF)</p>
                    </div>
                    <p id="file-error" class="text-[10px] font-bold text-error mt-2 hidden">Berkas wajib diunggah sebelum dikumpulkan!</p>
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-surface-container flex flex-col gap-3 shrink-0">
                <div class="flex gap-3 w-full justify-end">
                    <button onclick="simpanDraf()" class="px-4 py-2 rounded-lg border-2 border-outline-variant text-primary font-bold text-xs hover:bg-surface-container-low transition-colors">
                        Simpan Draf
                    </button>
                    <button onclick="submitTugas()" class="px-5 py-2 rounded-lg bg-secondary text-on-secondary font-bold text-xs hover:bg-secondary/90 transition-colors flex items-center gap-1.5 shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">send</span>
                        Kumpulkan
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('upload-text').innerText = file.name;
            document.getElementById('upload-subtext').innerText = "Berkas siap diunggah.";
            document.getElementById('upload-zone').classList.add('border-primary', 'bg-primary/5');
            document.getElementById('file-error').classList.add('hidden');
        }
    }

    function submitTugas() {
        const fileInput = document.getElementById('file-upload');
        if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
            document.getElementById('file-error').classList.remove('hidden');
            return;
        }
        
        Swal.fire({
            title: 'Kumpulkan Tugas?',
            text: "Pastikan berkas sudah lengkap karena tidak bisa diubah lagi.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#50290b',
            cancelButtonColor: '#ba1a1a',
            confirmButtonText: 'Ya, Kumpulkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Tugas telah dikumpulkan.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "{{ route('siswa.mapel.detail') }}?tab=tugas";
                });
            }
        });
    }

    function simpanDraf() {
        Swal.fire({
            title: 'Simpan Draf?',
            text: "Progres tugas akan disimpan dan dapat dilanjutkan nanti.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#50290b',
            cancelButtonColor: '#ba1a1a',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tersimpan!',
                    text: 'Draf tugas berhasil disimpan.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "{{ route('siswa.mapel.detail') }}?tab=tugas";
                });
            }
        });
    }
</script>
@endpush
@endsection
