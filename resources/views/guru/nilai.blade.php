@extends('layouts.guru')
@section('title', 'Nilai & Rekap - SMK Mandalahayu 1')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4 mt-4">
    <div>
        <h2 class="font-bold text-2xl text-primary" style="font-family: var(--font-serif)">Nilai &amp; Rekap</h2>
        <p class="text-on-surface-variant text-sm mt-1">Kelola dan evaluasi hasil belajar siswa semester ini.</p>
    </div>
</div>

<!-- Filter Section -->
<section class="bg-white rounded-xl p-4 shadow-sm border border-outline-variant/30 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex flex-col">
            <label class="font-bold text-sm text-primary mb-1">Kelas</label>
            <select id="filterKelas" class="bg-surface-container-low border-b-2 border-primary border-t-0 border-l-0 border-r-0 rounded-t-md px-3 py-1.5 focus:ring-0 focus:border-secondary-container text-sm text-on-surface transition-colors">
                <option value="">Semua Kelas</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="XI TKJ 1">XI TKJ 1</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label class="font-bold text-sm text-primary mb-1">Mata Pelajaran</label>
            <select id="filterMapel" class="bg-surface-container-low border-b-2 border-primary border-t-0 border-l-0 border-r-0 rounded-t-md px-3 py-1.5 focus:ring-0 focus:border-secondary-container text-sm text-on-surface transition-colors">
                <option value="">Semua Mapel</option>
                <option value="Pemrograman Dasar">Pemrograman Dasar</option>
                <option value="Basis Data">Basis Data</option>
                <option value="Sistem Komputer">Sistem Komputer</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label class="font-bold text-sm text-primary mb-1">Semester</label>
            <select id="filterSemester" class="bg-surface-container-low border-b-2 border-primary border-t-0 border-l-0 border-r-0 rounded-t-md px-3 py-1.5 focus:ring-0 focus:border-secondary-container text-sm text-on-surface transition-colors">
                <option value="">Semua Semester</option>
                <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
                <option value="Genap 2023/2024">Genap 2023/2024</option>
            </select>
        </div>
    </div>
</section>

<!-- Summary Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
    <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col justify-center">
        <p class="text-on-surface-variant text-xs mb-1">Rata-rata Kelas</p>
        <div class="flex items-baseline gap-2">
            <h3 class="font-bold text-3xl text-primary" style="font-family: var(--font-serif)">82.4</h3>
            <span class="text-xs text-green-700 font-bold flex items-center"><span class="material-symbols-outlined text-[14px]">arrow_upward</span> 2.1</span>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col justify-center">
        <p class="text-on-surface-variant text-xs mb-1">Nilai Tertinggi</p>
        <div class="flex items-baseline gap-2">
            <h3 class="font-bold text-3xl text-secondary" style="font-family: var(--font-serif)">98.0</h3>
            <span class="text-xs text-on-surface-variant">/ 100</span>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col justify-center">
        <p class="text-on-surface-variant text-xs mb-1">Nilai Terendah</p>
        <div class="flex items-baseline gap-2">
            <h3 class="font-bold text-3xl text-outline" style="font-family: var(--font-serif)">65.5</h3>
            <span class="text-xs text-on-surface-variant">/ 100</span>
        </div>
    </div>
    <div class="bg-primary text-on-primary p-4 rounded-xl shadow-sm flex flex-col justify-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent"></div>
        <p class="text-primary-fixed-dim text-xs mb-1 relative z-10">Tingkat Kelulusan</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <h3 class="font-bold text-3xl" style="font-family: var(--font-serif)">92%</h3>
            <span class="text-xs text-tertiary-fixed-dim">32/35 Siswa</span>
        </div>
    </div>
</section>

<!-- Master Grade Table -->
<section class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
    <div class="p-4 border-b border-surface-variant flex justify-between items-center bg-surface-container-low">
        <h3 class="font-bold text-xl text-primary" style="font-family: var(--font-serif)">Rekapitulasi Nilai Akhir</h3>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
            <input id="searchInput" class="pl-9 pr-3 py-1.5 bg-white rounded-full border border-surface-variant focus:ring-2 focus:ring-secondary-container text-sm w-56" placeholder="Cari nama siswa..." type="text">
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="gradesTable">
            <thead>
                <tr class="bg-surface-container text-on-surface font-bold text-xs border-b border-surface-variant">
                    <th class="py-2 px-4 w-12">No</th>
                    <th class="py-2 px-4">Nama Siswa</th>
                    <th class="py-2 px-4">Kelas</th>
                    <th class="py-2 px-4">Semester</th>
                    <th class="py-2 px-4">Mata Pelajaran</th>
                    <th class="py-2 px-4 text-center">Tugas</th>
                    <th class="py-2 px-4 text-center">Kuis</th>
                    <th class="py-2 px-4 text-center">Ujian</th>
                    <th class="py-2 px-4 text-center text-primary">Akhir</th>
                    <th class="py-2 px-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="text-xs text-on-background">
                <tr class="grade-row border-b border-surface-variant hover:bg-surface-container-low transition-colors">
                    <td class="py-2 px-4 text-on-surface-variant">1</td>
                    <td class="py-2 px-4 font-semibold text-primary student-name">Ahmad Fajri</td>
                    <td class="py-2 px-4 student-kelas">X RPL 1</td>
                    <td class="py-2 px-4 student-semester">Ganjil 2023/2024</td>
                    <td class="py-2 px-4 student-mapel">Pemrograman Dasar</td>
                    <td class="py-2 px-4 text-center">85</td>
                    <td class="py-2 px-4 text-center">80</td>
                    <td class="py-2 px-4 text-center">88</td>
                    <td class="py-2 px-4 text-center font-bold">85.2</td>
                    <td class="py-2 px-4 text-center">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800">
                            <span class="material-symbols-outlined text-[12px]">check_circle</span> Lulus
                        </span>
                    </td>
                </tr>
                <tr class="grade-row border-b border-surface-variant hover:bg-surface-container-low transition-colors">
                    <td class="py-2 px-4 text-on-surface-variant">2</td>
                    <td class="py-2 px-4 font-semibold text-primary student-name">Budi Santoso</td>
                    <td class="py-2 px-4 student-kelas">X RPL 1</td>
                    <td class="py-2 px-4 student-semester">Ganjil 2023/2024</td>
                    <td class="py-2 px-4 student-mapel">Pemrograman Dasar</td>
                    <td class="py-2 px-4 text-center">78</td>
                    <td class="py-2 px-4 text-center">75</td>
                    <td class="py-2 px-4 text-center">80</td>
                    <td class="py-2 px-4 text-center font-bold">78.5</td>
                    <td class="py-2 px-4 text-center">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800">
                            <span class="material-symbols-outlined text-[12px]">check_circle</span> Lulus
                        </span>
                    </td>
                </tr>
                <tr class="grade-row border-b border-surface-variant hover:bg-surface-container-low transition-colors">
                    <td class="py-2 px-4 text-on-surface-variant">3</td>
                    <td class="py-2 px-4 font-semibold text-primary student-name">Citra Lestari</td>
                    <td class="py-2 px-4 student-kelas">X RPL 2</td>
                    <td class="py-2 px-4 student-semester">Ganjil 2023/2024</td>
                    <td class="py-2 px-4 student-mapel">Basis Data</td>
                    <td class="py-2 px-4 text-center">92</td>
                    <td class="py-2 px-4 text-center">95</td>
                    <td class="py-2 px-4 text-center">90</td>
                    <td class="py-2 px-4 text-center font-bold">92.0</td>
                    <td class="py-2 px-4 text-center">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800">
                            <span class="material-symbols-outlined text-[12px]">check_circle</span> Lulus
                        </span>
                    </td>
                </tr>
                <tr class="grade-row border-b border-surface-variant hover:bg-surface-container-low transition-colors">
                    <td class="py-2 px-4 text-on-surface-variant">4</td>
                    <td class="py-2 px-4 font-semibold text-primary student-name">Dina Oktavia</td>
                    <td class="py-2 px-4 student-kelas">XI TKJ 1</td>
                    <td class="py-2 px-4 student-semester">Ganjil 2023/2024</td>
                    <td class="py-2 px-4 student-mapel">Sistem Komputer</td>
                    <td class="py-2 px-4 text-center">70</td>
                    <td class="py-2 px-4 text-center">65</td>
                    <td class="py-2 px-4 text-center">72</td>
                    <td class="py-2 px-4 text-center font-bold text-error">70.0</td>
                    <td class="py-2 px-4 text-center">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-100 text-red-800">
                            <span class="material-symbols-outlined text-[12px]">cancel</span> Remedial
                        </span>
                    </td>
                </tr>
                <tr class="grade-row border-b border-surface-variant hover:bg-surface-container-low transition-colors">
                    <td class="py-2 px-4 text-on-surface-variant">5</td>
                    <td class="py-2 px-4 font-semibold text-primary student-name">Eka Putra</td>
                    <td class="py-2 px-4 student-kelas">XI TKJ 1</td>
                    <td class="py-2 px-4 student-semester">Ganjil 2023/2024</td>
                    <td class="py-2 px-4 student-mapel">Sistem Komputer</td>
                    <td class="py-2 px-4 text-center">88</td>
                    <td class="py-2 px-4 text-center">85</td>
                    <td class="py-2 px-4 text-center">85</td>
                    <td class="py-2 px-4 text-center font-bold">86.0</td>
                    <td class="py-2 px-4 text-center">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800">
                            <span class="material-symbols-outlined text-[12px]">check_circle</span> Lulus
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="p-3 border-t border-surface-variant flex items-center justify-between bg-surface-container-low">
        <span class="text-xs text-on-surface-variant">1-5 dari 35</span>
        <div class="flex gap-1">
            <button class="p-1 rounded bg-white border border-surface-variant text-on-surface-variant hover:bg-surface-container transition-colors disabled:opacity-50" disabled>
                <span class="material-symbols-outlined text-[16px]">chevron_left</span>
            </button>
            <button class="p-1 rounded bg-primary text-on-primary font-bold text-xs px-2 hover:bg-tertiary-container transition-colors">1</button>
            <button class="p-1 rounded bg-white border border-surface-variant text-on-surface hover:bg-surface-container transition-colors text-xs px-2">2</button>
            <button class="p-1 rounded bg-white border border-surface-variant text-on-surface-variant hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            </button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const filterKelas = document.getElementById('filterKelas');
        const filterMapel = document.getElementById('filterMapel');
        const filterSemester = document.getElementById('filterSemester');
        const rows = document.querySelectorAll('.grade-row');

        function applyFilters() {
            const query = searchInput.value.toLowerCase();
            const kelasVal = filterKelas.value;
            const mapelVal = filterMapel.value;
            const semesterVal = filterSemester.value;

            rows.forEach(row => {
                const name = (row.querySelector('.student-name')?.textContent || '').toLowerCase();
                const kelas = row.querySelector('.student-kelas')?.textContent || '';
                const mapel = row.querySelector('.student-mapel')?.textContent || '';
                const semester = row.querySelector('.student-semester')?.textContent || '';

                const matchName = name.includes(query);
                const matchKelas = kelasVal === '' || kelas === kelasVal;
                const matchMapel = mapelVal === '' || mapel === mapelVal;
                const matchSemester = semesterVal === '' || semester === semesterVal;

                if (matchName && matchKelas && matchMapel && matchSemester) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('keyup', applyFilters);
        filterKelas.addEventListener('change', applyFilters);
        filterMapel.addEventListener('change', applyFilters);
        filterSemester.addEventListener('change', applyFilters);
    });
</script>

@endsection
