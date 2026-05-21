@extends('layouts.siswa')
@section('title', 'Pemrograman Web - Portal Siswa SMK Mandalahayu 1')
@section('page-title', 'Mata Pelajaran')

@section('content')
<style>
.active-tab-indicator {
    height: 4px;
    width: 100%;
    background-color: #feae2c;
    position: absolute;
    bottom: 0;
    left: 0;
    border-radius: 4px 4px 0 0;
}
.batik-overlay {
    background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD3cnn9KQW8AvbB_SLOab0Wa4tzABThbgbiGAIRbz8vYqoI05HFRDZcgv3USFXNjOC7MU6D2YRIZn-JncIoOIolm-pCA_EEkzr8ZlOQUXBLDZvApGbskAnB-51YHb2jU1deDpp2hfIBddb7IqKqL1Rm1RBiDVq4joArfF9wNQiKnpy63G9jpF8j4Gbp1TQzvLSgUVK7P85iTVLEDeXgb2DKdcX1Xc_pPwcygxAFCngWgjSEact4KY-1In3I0DuO2_axHqHSqh5-dUxB');
    opacity: 0.05;
}
</style>

<!-- Hero Section -->
<section class="relative bg-primary overflow-hidden py-12 px-8 -mx-4 md:-mx-6 -mt-8 mb-10 md:rounded-b-3xl shadow-md">
    <div class="absolute inset-0 batik-overlay"></div>
    <div class="relative z-10 max-w-container-max mx-auto flex flex-col md:flex-row items-end justify-between gap-8">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-4">
                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container font-bold text-xs rounded-full">TIK - Rekayasa Perangkat Lunak</span>
            </div>
            <h2 class="font-bold text-2xl text-on-primary mb-4" style="font-family: var(--font-serif)">Pemrograman Web</h2>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-secondary-container bg-surface-variant flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-surface-variant text-[16px]">person</span>
                </div>
                <div>
                    <p class="font-bold text-[10px] text-secondary-container">Guru Pengampu</p>
                    <p class="font-bold text-sm text-on-primary">Bpk. Budi Santoso, S.Kom.</p>
                </div>
            </div>
        </div>
        <div class="hidden lg:block w-64 bg-on-primary/5 p-4 rounded-xl border border-on-primary/10 backdrop-blur-sm">
            <p class="text-on-primary/80 italic text-xs mb-3">"Mempelajari dasar-dasar HTML5, CSS3, dan JavaScript untuk membangun fondasi pengembang web modern yang kompeten dan kreatif."</p>
            <div class="flex justify-between items-center text-on-primary">
                <div class="text-center">
                    <p class="font-bold text-lg">12</p>
                    <p class="text-[10px] opacity-60 font-bold">Modul</p>
                </div>
                <div class="text-center">
                    <p class="font-bold text-lg">4</p>
                    <p class="text-[10px] opacity-60 font-bold">Tugas Aktif</p>
                </div>
                <div class="text-center">
                    <p class="font-bold text-lg">92%</p>
                    <p class="text-[10px] opacity-60 font-bold">Progres</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Tabs & Body -->
<section class="max-w-[1000px] mx-auto px-2 md:px-4">
    <!-- Tabs Navigation -->
    <div class="flex border-b border-outline-variant mb-6 relative overflow-x-auto">
        <button class="px-4 md:px-6 py-3 text-sm text-secondary font-bold relative transition-all duration-300 whitespace-nowrap" id="tab-materi" onclick="switchTab('materi')">
            Materi
            <div class="active-tab-indicator" id="indicator-materi"></div>
        </button>
        <button class="px-4 md:px-6 py-3 text-sm text-on-surface-variant hover:text-primary transition-all duration-300 relative whitespace-nowrap font-bold" id="tab-tugas" onclick="switchTab('tugas')">
            Tugas
            <div class="active-tab-indicator hidden" id="indicator-tugas"></div>
        </button>
        <button class="px-4 md:px-6 py-3 text-sm text-on-surface-variant hover:text-primary transition-all duration-300 relative whitespace-nowrap font-bold" id="tab-pengumuman" onclick="switchTab('pengumuman')">
            Pengumuman
            <div class="active-tab-indicator hidden" id="indicator-pengumuman"></div>
        </button>
    </div>

    <!-- Content Area -->
    <div class="w-full">
        <!-- Tab: Materi (Content) -->
        <div class="space-y-4" id="content-materi">
            <h3 class="font-bold text-lg text-primary mb-4" style="font-family: var(--font-serif)">Daftar Modul Pembelajaran</h3>
            
            <!-- Materi Card 1 -->
            <a href="{{ route('siswa.lihat-materi') }}" class="bg-surface-container-lowest p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 hover:shadow-md transition-all group block">
                <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform flex-shrink-0">
                    <span class="material-symbols-outlined text-xl">description</span>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-sm text-on-surface">Modul 01: Pengenalan HTML5 &amp; Struktur Dasar</h4>
                    <p class="text-on-surface-variant text-[11px] flex flex-wrap items-center gap-2 mt-1 font-bold">
                        <span class="material-symbols-outlined text-[12px]">calendar_month</span> Diunggah: 12 Okt 2023
                        <span class="mx-1">•</span>
                        <span class="material-symbols-outlined text-[12px]">database</span> 4.2 MB
                        <span class="mx-1">•</span>
                        <span class="text-secondary flex items-center gap-1"><span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check_circle</span> Selesai</span>
                    </p>
                </div>
                <button type="button" class="p-2 rounded-full bg-surface-container hover:bg-secondary-container transition-colors flex-shrink-0" onclick="event.preventDefault(); alert('Download Started')">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                </button>
            </a>
            
            <!-- Materi Card 2 -->
            <a href="{{ route('siswa.lihat-materi') }}" class="bg-surface-container-lowest p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 hover:shadow-md transition-all group block">
                <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform flex-shrink-0">
                    <span class="material-symbols-outlined text-xl">description</span>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-sm text-on-surface">Modul 02: CSS Flexbox &amp; Grid Layout</h4>
                    <p class="text-on-surface-variant text-[11px] flex flex-wrap items-center gap-2 mt-1 font-bold">
                        <span class="material-symbols-outlined text-[12px]">calendar_month</span> Diunggah: 18 Okt 2023
                        <span class="mx-1">•</span>
                        <span class="material-symbols-outlined text-[12px]">database</span> 5.1 MB
                        <span class="mx-1">•</span>
                        <span class="text-secondary flex items-center gap-1"><span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check_circle</span> Selesai</span>
                    </p>
                </div>
                <button type="button" class="p-2 rounded-full bg-surface-container hover:bg-secondary-container transition-colors flex-shrink-0" onclick="event.preventDefault(); alert('Download Started')">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                </button>
            </a>
            
            <!-- Materi Card 3 -->
            <a href="{{ route('siswa.lihat-materi') }}" class="bg-surface-container-lowest p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 hover:shadow-md transition-all group block">
                <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform flex-shrink-0">
                    <span class="material-symbols-outlined text-xl">description</span>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-sm text-on-surface">Modul 03: Dasar JavaScript &amp; DOM Manipulation</h4>
                    <p class="text-on-surface-variant text-[11px] flex flex-wrap items-center gap-2 mt-1 font-bold">
                        <span class="material-symbols-outlined text-[12px]">calendar_month</span> Diunggah: 25 Okt 2023
                        <span class="mx-1">•</span>
                        <span class="material-symbols-outlined text-[12px]">database</span> 3.8 MB
                    </p>
                </div>
                <button type="button" class="p-2 rounded-full bg-surface-container hover:bg-secondary-container transition-colors flex-shrink-0" onclick="event.preventDefault(); alert('Download Started')">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                </button>
            </a>
        </div>

        <!-- Tab: Tugas (Hidden by default) -->
        <div class="hidden space-y-4" id="content-tugas">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4 border-b border-surface-container pb-4">
                <h3 class="font-bold text-lg text-primary" style="font-family: var(--font-serif)">Daftar Tugas</h3>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-on-surface-variant font-bold">Urutkan:</span>
                    <select id="filter-tugas" onchange="filterTugas()" class="text-xs border-outline-variant rounded-lg focus:ring-secondary focus:border-secondary py-1.5 pl-3 pr-8 bg-surface">
                        <option value="semua">Semua Tugas</option>
                        <option value="belum">Belum Dikerjakan</option>
                        <option value="sudah">Sudah Dikerjakan</option>
                    </select>
                </div>
            </div>
            
            <!-- Tugas Card 1 -->
            <div class="tugas-card bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/30 hover:border-secondary transition-all" data-status="belum">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2 py-0.5 bg-error/10 text-error font-bold text-[10px] rounded-full uppercase tracking-wider">BELUM DIKUMPULKAN</span>
                            <span class="text-xs text-on-surface-variant font-bold">Bobot: 20%</span>
                        </div>
                        <h4 class="font-bold text-xl text-primary" style="font-family: var(--font-serif)">Tugas 1: Membuat Halaman Portofolio Sederhana</h4>
                        <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">Gunakan HTML dan CSS murni tanpa framework untuk membangun halaman portofolio sesuai dengan kriteria yang ditentukan.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-outline-variant/20 gap-4 mt-2">
                    <div class="flex items-center gap-4 text-xs font-bold text-on-surface-variant w-full sm:w-auto">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">calendar_today</span> Tenggat: 05 Nov 2023, 23:59</span>
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">attach_file</span> 1 Lampiran</span>
                    </div>
                    <a href="{{ route('siswa.pengerjaan-tugas') }}" class="w-full sm:w-auto bg-primary text-on-primary px-6 py-2 rounded-lg font-bold text-xs hover:bg-primary-container transition-colors text-center shadow-sm">Kerjakan Tugas</a>
                </div>
            </div>
            
            <!-- Quiz Card 1 -->
            <div class="tugas-card bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/30 hover:border-secondary transition-all" data-status="sudah">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2 py-0.5 bg-green-100 text-green-800 font-bold text-[10px] rounded-full uppercase tracking-wider">SUDAH DIKUMPULKAN</span>
                            <span class="text-xs text-on-surface-variant font-bold">Bobot: 15%</span>
                        </div>
                        <h4 class="font-bold text-xl text-primary" style="font-family: var(--font-serif)">Quiz 1</h4>
                        <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">Buatlah struktur dasar dokumen HTML yang mencakup elemen semantik seperti header, nav, main, section, dan footer dengan konten bebas.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-outline-variant/20 gap-4 mt-2">
                    <div class="flex items-center gap-4 text-xs font-bold text-on-surface-variant w-full sm:w-auto">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">calendar_today</span> Tenggat: 25 Okt 2023, 23:59</span>
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">attach_file</span> 2 Lampiran</span>
                    </div>
                    <a href="{{ route('siswa.nilai') }}" class="w-full sm:w-auto border-2 border-outline-variant text-secondary px-6 py-2 rounded-lg font-bold text-xs hover:bg-surface-container-low transition-colors text-center">Lihat Nilai</a>
                </div>
            </div>

            <!-- Ujian Card -->
            <div class="tugas-card bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/30 hover:border-secondary transition-all" data-status="belum">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2 py-0.5 bg-error/10 text-error font-bold text-[10px] rounded-full uppercase tracking-wider">BELUM DIKUMPULKAN</span>
                            <span class="text-xs text-on-surface-variant font-bold">Bobot: 40%</span>
                        </div>
                        <h4 class="font-bold text-xl text-primary" style="font-family: var(--font-serif)">Ujian Akhir Semester</h4>
                        <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">Ujian akhir semester mencakup seluruh materi yang telah dipelajari. Waktu pengerjaan 120 menit.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-outline-variant/20 gap-4 mt-2">
                    <div class="flex items-center gap-4 text-xs font-bold text-on-surface-variant w-full sm:w-auto">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">calendar_today</span> Tenggat: 15 Des 2023, 10:00</span>
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">timer</span> 120 Menit</span>
                    </div>
                    <a href="{{ route('siswa.pengerjaan-ujian') }}" class="w-full sm:w-auto bg-primary text-on-primary px-6 py-2 rounded-lg font-bold text-xs hover:bg-primary-container transition-colors text-center shadow-sm">Kerjakan Ujian</a>
                </div>
            </div>
        </div>

        <!-- Tab: Pengumuman (Hidden by default) -->
        <div class="hidden space-y-4" id="content-pengumuman">
            <h3 class="font-bold text-lg text-primary mb-4" style="font-family: var(--font-serif)">Pengumuman Terkini</h3>
            
            <div class="relative bg-secondary-container/10 p-5 rounded-xl border-l-4 border-secondary">
                <span class="material-symbols-outlined absolute top-4 right-4 text-3xl text-secondary opacity-20 hidden sm:block">campaign</span>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full bg-surface flex items-center justify-center border border-secondary text-secondary">
                        <span class="material-symbols-outlined text-[16px]">person</span>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-on-secondary-container">Bpk. Budi Santoso</p>
                        <p class="text-[10px] text-on-secondary-container/70 font-bold">2 hari yang lalu</p>
                    </div>
                </div>
                <p class="text-xs text-on-surface leading-relaxed">
                    Halo semuanya, untuk pertemuan minggu depan kita akan mengadakan sesi live coding di Laboratorium Komputer 2. Harap pastikan laptop masing-masing sudah terpasang <strong>Visual Studio Code</strong> dan ekstensi <strong>Live Server</strong>. Jangan lupa kerjakan tugas portofolio tepat waktu!
                </p>
            </div>
            
            <div class="bg-surface-container-lowest p-5 rounded-xl border border-outline-variant/30">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full bg-surface flex items-center justify-center border border-outline text-outline">
                        <span class="material-symbols-outlined text-[16px]">person</span>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-on-surface">Bpk. Budi Santoso</p>
                        <p class="text-[10px] text-on-surface-variant font-bold">1 minggu yang lalu</p>
                    </div>
                </div>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                    Daftar nilai Kuis 1 sudah saya unggah. Bagi siswa yang nilainya di bawah KKM (75), silakan hubungi saya untuk jadwal remedial di hari Jumat pukul 14.00.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function switchTab(tabName) {
        const tabs = ['materi', 'tugas', 'pengumuman'];
        
        tabs.forEach(t => {
            const content = document.getElementById(`content-${t}`);
            const btn = document.getElementById(`tab-${t}`);
            const indicator = document.getElementById(`indicator-${t}`);
            
            if (t === tabName) {
                content.classList.remove('hidden');
                btn.classList.add('text-secondary', 'font-bold');
                btn.classList.remove('text-on-surface-variant');
                indicator.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
                btn.classList.remove('text-secondary', 'font-bold');
                btn.classList.add('text-on-surface-variant');
                indicator.classList.add('hidden');
            }
        });
    }
</script>
<script>
    function filterTugas() {
        const val = document.getElementById('filter-tugas').value;
        const cards = document.querySelectorAll('.tugas-card');
        cards.forEach(card => {
            if (val === 'semua' || card.getAttribute('data-status') === val) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endpush
