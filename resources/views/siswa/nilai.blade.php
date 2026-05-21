@extends('layouts.siswa')
@section('title', 'Nilai & Feedback - SMK Mandalahayu 1')
@section('page-title', 'Nilai dan Feedback')

@section('content')
<style>
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: var(--color-outline-variant); border-radius: 10px; }
</style>

<div class="space-y-6">
    <!-- Summary Stats Section -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- IPK Card -->
        <div class="bg-primary text-on-primary p-5 rounded-xl shadow-sm relative overflow-hidden group hover:-translate-y-0.5 transition-transform duration-300">
            <div class="relative z-10">
                <p class="text-[11px] uppercase tracking-widest text-on-primary/60 mb-1 font-bold">Rata-rata Semester</p>
                <h3 class="text-4xl font-bold leading-none mb-2" style="font-family: var(--font-serif)">88.5</h3>
                <p class="text-[11px] text-secondary font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">trending_up</span>
                    +2.4 dari bulan lalu
                </p>
            </div>
            <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4 group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-[100px]">school</span>
            </div>
        </div>

        <!-- Progress Ring Cards -->
        <div class="bg-primary-container text-on-primary p-5 rounded-xl shadow-sm relative overflow-hidden group hover:-translate-y-0.5 transition-transform duration-300">
            <div class="relative z-10 h-full flex flex-col justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-widest text-on-primary/60 mb-1 font-bold">Tugas Terkumpul</p>
                    <h3 class="text-4xl font-bold leading-none mb-2" style="font-family: var(--font-serif)">24/25</h3>
                    <p class="text-[11px] text-secondary font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">check_circle</span>
                        Diselesaikan
                    </p>
                </div>
                <div class="w-full bg-on-primary/10 h-1.5 rounded-full mt-4">
                    <div class="bg-secondary h-1.5 rounded-full w-[96%]"></div>
                </div>
            </div>
            <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4 group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-[100px]">assignment_turned_in</span>
            </div>
        </div>
    </section>

    <!-- Graded Items Table Section -->
    <section class="space-y-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[20px]">history_edu</span>
                <h3 class="text-lg font-bold text-primary" style="font-family: var(--font-serif)">Daftar Nilai & Evaluasi</h3>
            </div>
            <div class="flex flex-wrap gap-2">
                <select id="filter-category" onchange="applyFilters()" class="text-xs border-outline-variant rounded-lg focus:ring-secondary focus:border-secondary py-1.5 pl-3 pr-8 bg-surface">
                    <option value="semua">Semua Kategori</option>
                    <option value="ujian">Ujian</option>
                    <option value="tugas">Tugas</option>
                    <option value="kuis">Kuis</option>
                </select>
                <select id="sort-score" onchange="applyFilters()" class="text-xs border-outline-variant rounded-lg focus:ring-secondary focus:border-secondary py-1.5 pl-3 pr-8 bg-surface">
                    <option value="terbaru">Terbaru</option>
                    <option value="tertinggi">Nilai Tertinggi</option>
                    <option value="terendah">Nilai Terendah</option>
                </select>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden flex flex-col">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[700px]">
                    <thead class="bg-surface-container text-on-surface-variant uppercase text-[10px] font-bold tracking-widest sticky top-0 z-10">
                        <tr>
                            <th class="px-5 py-3 w-[40%]">Nama Tugas / Ujian</th>
                            <th class="px-4 py-3 w-[15%]">Kategori</th>
                            <th class="px-4 py-3 w-[15%]">Tanggal Dinilai</th>
                            <th class="px-4 py-3 text-center w-[15%]">Skor</th>
                            <th class="px-5 py-3 text-right w-[15%]">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            
            <!-- Limit to max 350px so about 7 rows are visible -->
            <div class="overflow-x-auto overflow-y-auto custom-scrollbar max-h-[350px]">
                <table class="w-full text-left border-collapse min-w-[700px]">
                    <tbody id="table-body" class="divide-y divide-outline-variant/20">
                        <!-- Rendered by JS -->
                    </tbody>
                </table>
            </div>
            
            <!-- Footer pagination info -->
            <div class="px-5 py-3 bg-surface-container flex justify-between items-center text-[11px] font-bold text-on-surface-variant border-t border-outline-variant/30">
                <p id="table-info">Menampilkan 10 entri</p>
                <div class="flex gap-1">
                    <button class="w-7 h-7 flex items-center justify-center rounded bg-surface-container-lowest border border-outline-variant/30 text-primary hover:bg-secondary hover:text-white transition-all shadow-sm">1</button>
                    <button class="w-7 h-7 flex items-center justify-center rounded border border-outline-variant/30 text-primary hover:bg-secondary hover:text-white transition-all">2</button>
                    <button class="w-7 h-7 flex items-center justify-center rounded border border-outline-variant/30 text-primary hover:bg-secondary hover:text-white transition-all">3</button>
                    <button class="w-7 h-7 flex items-center justify-center rounded border border-outline-variant/30 text-primary hover:bg-secondary hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    const dataNilai = [
        { id: 1, name: "Ujian Tengah Semester: Matematika Terapan", desc: "Materi: Kalkulus Dasar & Aljabar Linier", category: "ujian", dateStr: "12 Okt 2023", timestamp: 1697068800, score: 92, feedback: "Luar biasa, Andi. Pemahaman kamu pada soal nomor 4 sangat mendalam. Terus pertahankan ketelitian ini pada UAS nanti. Catatan: Perhatikan lagi penyederhanaan variabel pada bagian akhir.", teacher: "Bpk. Bambang S." },
        { id: 2, name: "Tugas 4: Pemrograman Web (Backend Logic)", desc: "Implementasi REST API dengan Node.js", category: "tugas", dateStr: "08 Okt 2023", timestamp: 1696723200, score: 85, feedback: "Logika backend sudah baik dan terstruktur. Namun, pastikan error handling (try-catch) diaplikasikan pada setiap route untuk mencegah aplikasi crash.", teacher: "Ibu Maya" },
        { id: 3, name: "Kuis Dadakan: Bahasa Inggris Teknis", desc: "Vocabulary and Technical Documentation", category: "kuis", dateStr: "01 Okt 2023", timestamp: 1696118400, score: 78, feedback: "Good effort, but you need to focus more on terminology specific to Software Engineering. Please review the manual guide we studied last week.", teacher: "Mr. Richard" },
        { id: 4, name: "Tugas 3: UI/UX Desain", desc: "Wireframing Aplikasi Mobile", category: "tugas", dateStr: "25 Sep 2023", timestamp: 1695600000, score: 90, feedback: "Desain kamu sangat bersih dan modern. Struktur navigasi juga intuitif.", teacher: "Ibu Rina" },
        { id: 5, name: "Kuis 2: Basis Data", desc: "Normalisasi dan Relasi Tabel", category: "kuis", dateStr: "18 Sep 2023", timestamp: 1694995200, score: 88, feedback: "Pemahaman normalisasi bentuk ketiga (3NF) sudah mantap. Perhatikan saja foreign key constraints.", teacher: "Bpk. Anton" },
        { id: 6, name: "Tugas 2: Algoritma", desc: "Sorting & Searching", category: "tugas", dateStr: "10 Sep 2023", timestamp: 1694304000, score: 95, feedback: "Implementasi Quick Sort sangat efisien dan clean code.", teacher: "Bpk. Bambang S." },
        { id: 7, name: "Kuis 1: Jaringan Dasar", desc: "Subnetting IPv4", category: "kuis", dateStr: "05 Sep 2023", timestamp: 1693872000, score: 82, feedback: "Hitungan host valid sudah benar, tapi alamat broadcast masih keliru sedikit di soal nomor 3.", teacher: "Ibu Siska" },
        { id: 8, name: "Ujian Blok 1: RPL", desc: "Dasar-dasar Pemrograman Terstruktur", category: "ujian", dateStr: "30 Agu 2023", timestamp: 1693353600, score: 89, feedback: "Secara keseluruhan sangat baik. Fokus pada pengoptimalan penggunaan memori pada perulangan.", teacher: "Ibu Maya" },
        { id: 9, name: "Tugas 1: Presentasi Diri", desc: "Video Perkenalan Bahasa Inggris", category: "tugas", dateStr: "20 Agu 2023", timestamp: 1692489600, score: 80, feedback: "Pronunciation is good, but try to speak a bit slower next time.", teacher: "Mr. Richard" },
        { id: 10, name: "Kuis Awal: Pengantar TI", desc: "Sejarah Komputer", category: "kuis", dateStr: "15 Agu 2023", timestamp: 1692057600, score: 91, feedback: "Awal yang sangat bagus! Pertahankan semangat belajar kamu.", teacher: "Bpk. Anton" }
    ];

    function getCategoryBadge(cat) {
        if (cat === 'ujian') return '<span class="px-2 py-0.5 bg-primary-fixed text-on-primary-fixed text-[9px] font-bold rounded-full uppercase tracking-wider">Ujian</span>';
        if (cat === 'tugas') return '<span class="px-2 py-0.5 bg-tertiary-fixed text-on-tertiary-fixed text-[9px] font-bold rounded-full uppercase tracking-wider">Tugas</span>';
        if (cat === 'kuis') return '<span class="px-2 py-0.5 bg-secondary-fixed text-on-secondary-fixed text-[9px] font-bold rounded-full uppercase tracking-wider">Kuis</span>';
        return '';
    }

    function renderTable(data) {
        const tbody = document.getElementById('table-body');
        tbody.innerHTML = '';
        
        if (data.length === 0) {
            tbody.innerHTML = `<tr><td colspan="5" class="px-5 py-8 text-center text-on-surface-variant font-bold text-xs">Tidak ada data untuk filter ini.</td></tr>`;
            document.getElementById('table-info').innerText = 'Menampilkan 0 entri';
            return;
        }

        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-surface-container-low transition-colors group';
            tr.innerHTML = `
                <td class="px-5 py-3 w-[40%]">
                    <div class="font-bold text-primary group-hover:text-secondary transition-colors text-[12px] truncate max-w-[280px]">${item.name}</div>
                    <div class="text-[10px] text-on-surface-variant/80 mt-0.5 truncate max-w-[280px]">${item.desc}</div>
                </td>
                <td class="px-4 py-3 w-[15%]">
                    ${getCategoryBadge(item.category)}
                </td>
                <td class="px-4 py-3 text-on-surface-variant text-[11px] font-medium w-[15%]">${item.dateStr}</td>
                <td class="px-4 py-3 w-[15%]">
                    <div class="flex flex-col items-center">
                        <span class="text-lg font-bold text-primary leading-none" style="font-family: var(--font-serif)">${item.score}</span>
                        <span class="text-[9px] text-on-surface-variant/60 font-bold">/ 100</span>
                    </div>
                </td>
                <td class="px-5 py-3 text-right w-[15%]">
                    <button class="bg-secondary text-on-secondary px-3 py-1.5 rounded-lg font-bold text-[10px] hover:brightness-110 transform active:scale-95 transition-all" onclick="toggleFeedback(${item.id})">Feedback</button>
                </td>
            `;

            const trFb = document.createElement('tr');
            trFb.id = `fb${item.id}`;
            trFb.className = 'hidden bg-surface-container-low border-t-0';
            trFb.innerHTML = `
                <td class="px-5 py-3" colspan="5">
                    <div class="flex gap-3 items-start bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/30 shadow-sm ml-4">
                        <span class="material-symbols-outlined text-secondary text-[20px]">chat_bubble</span>
                        <div class="space-y-1.5">
                            <p class="font-bold text-primary text-[11px]">Komentar Guru (${item.teacher}):</p>
                            <p class="italic text-on-surface-variant text-[11px] leading-relaxed">"${item.feedback}"</p>
                            <p class="text-[9px] font-bold text-error flex items-center gap-1 mt-2 pt-2 border-t border-surface-variant/50">
                                <span class="material-symbols-outlined text-[12px]">lock</span>
                                Nilai ini dikunci permanen.
                            </p>
                        </div>
                    </div>
                </td>
            `;

            tbody.appendChild(tr);
            tbody.appendChild(trFb);
        });

        document.getElementById('table-info').innerText = `Menampilkan ${data.length} entri`;
    }

    function applyFilters() {
        const cat = document.getElementById('filter-category').value;
        const sort = document.getElementById('sort-score').value;

        let filtered = dataNilai.slice();

        if (cat !== 'semua') {
            filtered = filtered.filter(d => d.category === cat);
        }

        if (sort === 'terbaru') {
            filtered.sort((a, b) => b.timestamp - a.timestamp);
        } else if (sort === 'tertinggi') {
            filtered.sort((a, b) => b.score - a.score);
        } else if (sort === 'terendah') {
            filtered.sort((a, b) => a.score - b.score);
        }

        renderTable(filtered);
    }

    function toggleFeedback(id) {
        const element = document.getElementById(`fb${id}`);
        if (element.classList.contains('hidden')) {
            element.classList.remove('hidden');
            element.classList.add('animate-fade-in');
        } else {
            element.classList.add('hidden');
            element.classList.remove('animate-fade-in');
        }
    }

    // Init table
    applyFilters();
</script>
@endpush
@endsection
