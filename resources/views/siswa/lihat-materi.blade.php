@extends('layouts.siswa')
@section('title', 'Materi Pembelajaran - Portal Siswa')
@section('page-title', 'Materi Pembelajaran')

@section('content')
<div class="flex flex-col lg:flex-row gap-6 items-start w-full">
    <!-- Local Course Sidebar -->
    <aside class="w-full lg:w-72 lg:sticky lg:top-20 bg-surface-container-low border border-outline-variant rounded-xl p-5 flex-shrink-0">
        <div class="mb-5">
            <p class="font-bold text-[10px] text-secondary uppercase tracking-widest mb-1">Mata Pelajaran</p>
            <h2 class="font-bold text-lg text-primary leading-tight" style="font-family: var(--font-serif)">Pemrograman Web</h2>
        </div>
        <div class="space-y-4">
            <div>
                <h4 class="font-bold text-[11px] text-outline mb-3">Materi Pembelajaran</h4>
                <ul class="space-y-2" id="materi-list">
                    <!-- JS will populate this list -->
                </ul>
            </div>
        </div>
    </aside>

    <!-- Content Viewer -->
    <section class="flex-1 w-full min-w-0">
        <!-- Title & Status -->
        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-6">
            <div class="flex-1">
                <h1 id="materi-title" class="font-bold text-2xl text-primary mb-2" style="font-family: var(--font-serif)">Modul 01: Pengenalan HTML5 &amp; Struktur Dasar</h1>
                <p id="materi-desc" class="text-xs text-on-surface-variant leading-relaxed">Materi ini membahas sejarah singkat HTML, evolusi ke HTML5, dan penjelasan mendalam mengenai struktur file HTML yang benar.</p>
            </div>
            <div class="flex flex-row md:flex-col items-center md:items-end gap-3 flex-shrink-0 w-full md:w-auto justify-between md:justify-start">
                <div class="flex items-center gap-2 bg-surface-container-high px-3 py-1.5 rounded-full border border-outline-variant">
                    <span class="font-bold text-[10px] text-primary">Sudah Dipelajari</span>
                    <input id="materi-checkbox" onchange="toggleStatus(this.checked)" class="w-4 h-4 rounded border-outline text-secondary focus:ring-secondary" type="checkbox"/>
                </div>
                <button class="flex items-center gap-1 font-bold text-[11px] text-secondary hover:underline transition-all">
                    <span class="material-symbols-outlined text-[16px]">download</span>
                    Download PDF
                </button>
            </div>
        </div>

        <!-- PDF Viewer Mockup -->
        <div class="bg-surface-container-highest rounded-xl shadow-sm border border-outline-variant overflow-hidden flex flex-col mb-6">
            <!-- Viewer Area -->
            <div class="p-4 md:p-8 flex justify-center bg-[#e5e5e5] h-[600px] overflow-y-auto custom-scrollbar">
                <div class="w-full max-w-3xl bg-white shadow-xl relative min-h-[800px] p-8 md:p-12" id="viewer-content">
                    <!-- Content will be injected by JS -->
                </div>
            </div>
        </div>

        <!-- Material Navigation Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4 border-t border-outline-variant">
            <button id="btn-prev" onclick="loadMateri(currentIndex - 1)" class="w-full sm:w-auto group flex items-center gap-3 py-2 px-4 rounded-xl hover:bg-secondary hover:shadow-sm transition-all text-left">
                <div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-outline group-hover:bg-white/20 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                </div>
                <div>
                    <p class="font-bold text-[10px] text-outline group-hover:text-on-secondary/80">Materi Sebelumnya</p>
                    <p id="prev-materi-title" class="text-xs text-primary font-bold group-hover:text-on-secondary">Orientasi Kursus</p>
                </div>
            </button>
            
            <!-- Spacer to push next button to right if prev is hidden -->
            <div class="flex-1"></div>

            <button id="btn-next" onclick="loadMateri(currentIndex + 1)" class="w-full sm:w-auto group flex items-center gap-3 py-2 px-4 rounded-xl hover:bg-secondary hover:shadow-sm transition-all text-right justify-end">
                <div>
                    <p class="font-bold text-[10px] text-outline group-hover:text-on-secondary/80">Materi Selanjutnya</p>
                    <p id="next-materi-title" class="text-xs font-bold text-primary group-hover:text-on-secondary">Modul 02</p>
                </div>
                <div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-outline group-hover:bg-white/20 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </div>
            </button>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    const materis = [
        {
            title: "Modul 01: Pengenalan HTML5 & Struktur Dasar",
            shortTitle: "Modul 01",
            desc: "Materi ini membahas sejarah singkat HTML, evolusi ke HTML5, dan penjelasan mendalam mengenai struktur file HTML yang benar.",
            status: true,
            html: `
                <div class="border-b-2 border-primary pb-3 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-primary" style="font-family: var(--font-serif)">Modul 01: Dasar Web</span>
                        <span class="font-bold text-[10px] text-outline">SMK Mandalahayu 1 Bekasi</span>
                    </div>
                </div>
                <div class="space-y-4 text-[#333]">
                    <h3 class="font-bold text-xl text-[#222]" style="font-family: var(--font-serif)">Apa itu HTML5?</h3>
                    <p class="text-sm leading-relaxed">HTML5 adalah versi terbaru dari Hypertext Markup Language, bahasa standar untuk membuat dan menyusun halaman web. HTML5 memperkenalkan elemen-elemen baru yang lebih semantik dan mendukung multimedia secara langsung tanpa perlu plugin tambahan.</p>
                    <div class="bg-[#f9f9f9] p-4 rounded border-l-4 border-secondary">
                        <p class="italic text-sm">"Tujuan utama HTML5 adalah memperbaiki bahasa tersebut agar mendukung multimedia terbaru sambil tetap dapat dibaca oleh komputer dan dipahami secara konsisten oleh perangkat, peramban, dan pengguna."</p>
                    </div>
                    <h4 class="font-bold text-lg text-[#222] mt-6" style="font-family: var(--font-serif)">Struktur Dasar HTML5</h4>
                    <p class="text-sm leading-relaxed">
                        Setiap dokumen HTML5 harus dimulai dengan deklarasi tipe dokumen agar browser tahu standar apa yang digunakan.
                    </p>
                    <pre class="bg-[#2d2d2d] text-[#e6e6e6] p-4 rounded font-mono text-[11px] overflow-x-auto shadow-inner">&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Judul Halaman&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Halo Dunia!&lt;/h1&gt;
    &lt;p&gt;Ini adalah paragraf pertama saya.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
                </div>
            `
        },
        {
            title: "Modul 02: CSS Flexbox & Grid Layout",
            shortTitle: "Modul 02",
            desc: "Pelajari cara menyusun tata letak halaman web yang responsif dengan mudah menggunakan Flexbox dan Grid Layout di CSS3.",
            status: true,
            html: `
                <div class="border-b-2 border-primary pb-3 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-primary" style="font-family: var(--font-serif)">Modul 02: Layout Web</span>
                        <span class="font-bold text-[10px] text-outline">SMK Mandalahayu 1 Bekasi</span>
                    </div>
                </div>
                <div class="space-y-4 text-[#333]">
                    <h3 class="font-bold text-xl text-[#222]" style="font-family: var(--font-serif)">Mengenal Flexbox</h3>
                    <p class="text-sm leading-relaxed">Flexbox adalah model tata letak yang didesain untuk satu dimensi. Dengan flexbox, Anda dapat mengatur elemen anak secara horizontal maupun vertikal dengan sangat efisien.</p>
                </div>
            `
        },
        {
            title: "Modul 03: Dasar JavaScript & DOM Manipulation",
            shortTitle: "Modul 03",
            desc: "Pengenalan pemrograman dengan JavaScript dan cara memanipulasi elemen HTML untuk membuat halaman web interaktif.",
            status: false,
            html: `
                <div class="border-b-2 border-primary pb-3 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-primary" style="font-family: var(--font-serif)">Modul 03: Interaktivitas</span>
                        <span class="font-bold text-[10px] text-outline">SMK Mandalahayu 1 Bekasi</span>
                    </div>
                </div>
                <div class="space-y-4 text-[#333]">
                    <h3 class="font-bold text-xl text-[#222]" style="font-family: var(--font-serif)">Pengenalan DOM</h3>
                    <p class="text-sm leading-relaxed">Document Object Model (DOM) adalah representasi struktural dari dokumen HTML yang memungkinkan JavaScript memanipulasi elemen, gaya, maupun isi halaman web.</p>
                </div>
            `
        }
    ];

    let currentIndex = 0;

    function renderSidebar() {
        const list = document.getElementById('materi-list');
        list.innerHTML = '';
        
        materis.forEach((m, index) => {
            const isActive = index === currentIndex;
            const bgClass = isActive ? 'bg-surface-container-lowest shadow-sm border border-secondary' : 'hover:bg-surface-container-high border border-transparent';
            const iconBg = isActive ? 'bg-secondary/10 text-secondary' : 'bg-surface-variant text-outline';
            const statusHtml = m.status ? `<div class="mt-2 flex items-center gap-1 text-[9px] text-secondary font-bold bg-secondary/5 px-2 py-0.5 rounded-full w-fit">
                                    <span class="material-symbols-outlined !text-[12px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Selesai
                                </div>` : '';
                                
            list.innerHTML += `
                <li>
                    <a href="#" onclick="event.preventDefault(); loadMateri(${index})" class="group flex items-start gap-3 p-3 rounded-xl transition-all ${bgClass}">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center ${iconBg}">
                            <span class="material-symbols-outlined text-[20px]">description</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-xs ${isActive ? 'text-primary' : 'text-on-surface'}">${m.shortTitle}</p>
                            <p class="text-[10px] text-on-surface-variant line-clamp-1 font-bold">${m.title.split(': ')[1] || m.title}</p>
                            ${statusHtml}
                        </div>
                    </a>
                </li>
            `;
        });
    }

    function loadMateri(index) {
        if (index < 0 || index >= materis.length) return;
        currentIndex = index;
        const m = materis[index];
        
        document.getElementById('materi-title').innerText = m.title;
        document.getElementById('materi-desc').innerText = m.desc;
        document.getElementById('materi-checkbox').checked = m.status;
        document.getElementById('viewer-content').innerHTML = m.html + `
            <!-- Watermark/Page Number -->
            <div class="absolute bottom-6 left-0 right-0 text-center text-outline text-[10px] font-bold">
                Halaman 1 dari 15 — Properti Akademik SMK Mandalahayu 1
            </div>
        `;
        
        const btnPrev = document.getElementById('btn-prev');
        const btnNext = document.getElementById('btn-next');
        
        if (index === 0) {
            btnPrev.classList.add('hidden');
        } else {
            btnPrev.classList.remove('hidden');
            btnPrev.classList.add('flex');
            document.getElementById('prev-materi-title').innerText = materis[index - 1].shortTitle;
        }
        
        if (index === materis.length - 1) {
            btnNext.classList.add('hidden');
        } else {
            btnNext.classList.remove('hidden');
            btnNext.classList.add('flex');
            document.getElementById('next-materi-title').innerText = materis[index + 1].shortTitle;
        }
        
        renderSidebar();
    }

    function toggleStatus(isChecked) {
        if (materis[currentIndex]) {
            materis[currentIndex].status = isChecked;
            renderSidebar();
        }
    }

    // Initialize
    loadMateri(0);
</script>
@endpush
