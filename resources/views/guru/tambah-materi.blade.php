@extends('layouts.guru')
@section('title', request('edit') ? 'Edit Materi - SMK Mandalahayu 1' : 'Tambah Materi Baru - SMK Mandalahayu 1')
@section('content')
@php
    $isEdit = request('edit') == 'true';
    $judul = request('judul', '');
@endphp
<div class="mb-4">
    <nav class="flex items-center gap-2 text-on-surface-variant/60 text-xs font-bold uppercase tracking-wider mb-1">
        <a class="hover:text-primary transition-soft" href="{{ route('guru.dashboard') }}">Dashboard</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <a class="hover:text-primary transition-soft" href="{{ route('guru.materi') }}">Materi</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <span class="text-primary">{{ $isEdit ? 'Edit Materi' : 'Tambah Materi Baru' }}</span>
    </nav>
    <h2 class="font-bold text-3xl text-primary serif" style="font-family: var(--font-serif)">{{ $isEdit ? 'Edit Materi' : 'Tambah Materi Baru' }}</h2>
    <p class="text-sm text-on-surface-variant mt-1">{{ $isEdit ? 'Perbarui informasi materi yang sudah diunggah.' : 'Buat dan publikasikan materi pembelajaran digital untuk siswa Anda.' }}</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
    <div class="lg:col-span-8 space-y-4">
        <div class="bg-surface-container-lowest rounded-2xl p-5 shadow-ambient border border-outline-variant/30">
            <form method="POST" action="{{ route('guru.materi.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-1" for="judul">Judul Materi</label>
                        <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary focus:border-secondary focus:ring-0 text-base transition-soft px-3 py-2"
                               id="judul" name="judul" placeholder="Contoh: Pengantar Jaringan Komputer Dasar" type="text" value="{{ $judul }}" required/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-1" for="deskripsi">Deskripsi Materi</label>
                        <textarea class="w-full bg-surface-container-low border-0 border-b-2 border-primary focus:border-secondary focus:ring-0 transition-soft px-3 py-2 resize-none"
                                  id="deskripsi" name="deskripsi" rows="2" placeholder="Jelaskan secara singkat kompetensi dasar...">{{ $isEdit ? 'Deskripsi dummy untuk materi ' . $judul . ' (Dalam mode edit, deskripsi akan diisi secara otomatis).' : '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-2">Dokumen Materi</label>
                        <div class="border-2 border-dashed border-outline-variant rounded-xl p-4 text-center bg-surface-container-low/50 hover:bg-surface-container-low transition-soft cursor-pointer group" id="drop-area">
                            <input accept=".pdf,.ppt,.pptx,image/*" class="hidden" id="file-upload" name="file" type="file"/>
                            <span class="material-symbols-outlined text-3xl text-primary/40 group-hover:scale-110 group-hover:text-primary transition-soft mb-1" style="display:block;">cloud_upload</span>
                            <p class="text-sm text-on-surface-variant"><span class="text-primary font-bold">Klik untuk unggah</span> atau seret file ke sini</p>
                            <p class="text-xs text-on-surface-variant/60 mt-1 uppercase tracking-widest">PDF, PPTX, JPG (Max. 20MB)</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-2">Kelas Tujuan</label>
                            <div class="space-y-2 bg-surface-container-low p-3 rounded-xl max-h-32 overflow-y-auto custom-scrollbar">
                                @foreach(['X TKJ 1','X TKJ 2','XI RPL 1','XI RPL 2'] as $kelas)
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input class="w-4 h-4 rounded border-outline-variant text-secondary focus:ring-secondary" name="kelas[]" type="checkbox" value="{{ $kelas }}"/>
                                    <span class="text-sm text-on-surface-variant group-hover:text-primary">{{ $kelas }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-primary mb-2" for="urutan">Urutan Materi (Pertemuan)</label>
                            <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary focus:border-secondary focus:ring-0 transition-soft px-3 py-2"
                                   id="urutan" name="urutan" min="1" placeholder="1" type="number"/>
                            <p class="text-[10px] text-on-surface-variant/60 mt-1 italic">Urutan materi membantu siswa mengikuti alur kurikulum.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="lg:col-span-4 space-y-4">
        <div class="bg-surface-container-lowest rounded-2xl p-5 shadow-ambient border border-outline-variant/30">
            <h3 class="text-xs font-bold uppercase tracking-wider text-primary mb-3">Status Publikasi</h3>
            <div class="space-y-2">
                @foreach([['draft','Simpan Draft','Hanya dapat dilihat oleh Anda'],['published','Publikasikan','Siswa dapat langsung mengakses'],['archived','Arsip','Materi lama tidak untuk siswa']] as [$val,$label,$desc])
                <label class="relative flex items-center p-3 rounded-xl border-2 border-outline-variant/30 hover:bg-surface-container transition-soft cursor-pointer group has-[:checked]:border-secondary has-[:checked]:bg-secondary/5">
                    <input {{ $val === 'draft' ? 'checked' : '' }} class="hidden peer" name="status" type="radio" value="{{ $val }}"/>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-on-surface group-hover:text-secondary transition-soft">{{ $label }}</p>
                        <p class="text-[10px] text-on-surface-variant/70">{{ $desc }}</p>
                    </div>
                    <span class="material-symbols-outlined text-secondary opacity-0 peer-checked:opacity-100">check_circle</span>
                </label>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <button type="submit" class="w-full bg-secondary text-on-secondary font-bold py-3 rounded-xl shadow-lg transition-soft hover:brightness-110 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined">save</span> {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Materi' }}
            </button>
            <a href="{{ route('guru.materi') }}" class="w-full text-center border-2 border-primary/20 text-primary font-bold py-3 rounded-xl transition-soft hover:bg-primary/5">Batal</a>
        </div>
            </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('file-upload');
dropArea.addEventListener('click', () => fileInput.click());
['dragenter','dragover','dragleave','drop'].forEach(e => dropArea.addEventListener(e, ev => { ev.preventDefault(); ev.stopPropagation(); }));
['dragenter','dragover'].forEach(e => dropArea.addEventListener(e, () => dropArea.classList.add('border-secondary','bg-secondary/5')));
['dragleave','drop'].forEach(e => dropArea.addEventListener(e, () => dropArea.classList.remove('border-secondary','bg-secondary/5')));
dropArea.addEventListener('drop', e => { const files = e.dataTransfer.files; if(files.length) fileInput.files = files; });
</script>
@endpush
