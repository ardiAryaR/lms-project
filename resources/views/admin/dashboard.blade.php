@extends('layouts.admin')
@section('title', 'Admin Dashboard - SMK Mandalahayu 1 Bekasi')

@section('content')
<div class="max-w-[1200px] mx-auto flex flex-col gap-10">
    <!-- Header -->
    <div>
        <h1 class="font-h1 text-h1 text-primary mb-2">Tinjauan Sistem</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Pantau aktivitas, kelola akun, dan pastikan kelancaran akademik harian.</p>
    </div>
    
    <!-- KPI Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm shadow-primary/5 flex flex-col justify-between group hover:bg-surface-container-low transition-colors">
            <div class="flex justify-between items-start mb-4">
                <span class="font-label-sm text-label-sm text-on-surface-variant">Total Akun Aktif</span>
                <div class="w-10 h-10 rounded-full bg-primary-container/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">groups</span>
                </div>
            </div>
            <div>
                <span class="font-h2 text-h2 text-primary">2,450</span>
                <p class="font-body-md text-[13px] text-on-surface-variant mt-1">Siswa + Guru</p>
            </div>
        </div>
        
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm shadow-primary/5 flex flex-col justify-between group hover:bg-surface-container-low transition-colors relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-error/5 rounded-bl-full -z-0"></div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <span class="font-label-sm text-label-sm text-on-surface-variant">Pending Verifikasi</span>
                <div class="w-10 h-10 rounded-full bg-error-container text-on-error-container flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">how_to_reg</span>
                </div>
            </div>
            <div class="flex items-center gap-3 relative z-10">
                <span class="font-h2 text-h2 text-primary">42</span>
                <span class="bg-error text-on-error px-2 py-0.5 rounded-full font-label-sm text-[11px] animate-pulse">Perlu Tindakan</span>
            </div>
        </div>
        
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm shadow-primary/5 flex flex-col justify-between group hover:bg-surface-container-low transition-colors">
            <div class="flex justify-between items-start mb-4">
                <span class="font-label-sm text-label-sm text-on-surface-variant">Suspended / Blocked</span>
                <div class="w-10 h-10 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">block</span>
                </div>
            </div>
            <div>
                <span class="font-h2 text-h2 text-primary">18</span>
                <p class="font-body-md text-[13px] text-on-surface-variant mt-1">Akun dibatasi</p>
            </div>
        </div>
        
    </div>
    
    <!-- Main Layout -->
    <div class="flex flex-col gap-8">
        <!-- Table -->
        <div class="flex flex-col gap-6 w-full">
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm shadow-primary/5 overflow-hidden">
                <div class="p-6 border-b border-outline-variant flex justify-between items-center bg-surface-container-low/50">
                    <h3 class="font-h3 text-[20px] text-primary">Akun Menunggu Tindakan</h3>
                    <button class="text-secondary font-label-sm text-label-sm hover:underline">Lihat Semua</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-lowest border-b border-outline-variant font-label-sm text-label-sm text-on-surface-variant">
                                <th class="py-4 px-6 font-semibold">Nama</th>
                                <th class="py-4 px-6 font-semibold">NIS/NRG</th>
                                <th class="py-4 px-6 font-semibold">Email</th>
                                <th class="py-4 px-6 font-semibold">Role</th>
                                <th class="py-4 px-6 font-semibold">Tanggal Daftar</th>
                                <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="font-body-md text-[15px]">
                            <tr class="border-b border-outline-variant hover:bg-surface-container-low transition-colors">
                                <td class="py-4 px-6 font-medium text-primary">Budi Santoso</td>
                                <td class="py-4 px-6 text-on-surface-variant">2021001</td>
                                <td class="py-4 px-6 text-on-surface-variant">budi.s@student.com</td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-md bg-surface-variant text-on-surface-variant text-[12px] font-label-sm">Siswa</span>
                                </td>
                                <td class="py-4 px-6 text-on-surface-variant">12 Okt 2024</td>
                                <td class="py-4 px-6 flex justify-end gap-2">
                                    <button onclick="showModalAktifkan()" class="px-4 py-1.5 bg-[#feae2c] text-[#6b4500] hover:brightness-110 font-bold text-xs rounded-md shadow-sm transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">check</span> Aktifkan</button>
                                    <button onclick="showModalTolak()" class="px-4 py-1.5 border border-[#d6c3b8] text-[#51443c] hover:bg-[#f8f3ed] font-bold text-xs rounded-md transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">close</span> Tolak</button>
                                </td>
                            </tr>
                            <tr class="border-b border-outline-variant hover:bg-surface-container-low transition-colors">
                                <td class="py-4 px-6 font-medium text-primary">Siti Aminah</td>
                                <td class="py-4 px-6 text-on-surface-variant">2021002</td>
                                <td class="py-4 px-6 text-on-surface-variant">siti.a@student.com</td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-md bg-surface-variant text-on-surface-variant text-[12px] font-label-sm">Siswa</span>
                                </td>
                                <td class="py-4 px-6 text-on-surface-variant">12 Okt 2024</td>
                                <td class="py-4 px-6 flex justify-end gap-2">
                                    <button onclick="showModalAktifkan()" class="px-4 py-1.5 bg-[#feae2c] text-[#6b4500] hover:brightness-110 font-bold text-xs rounded-md shadow-sm transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">check</span> Aktifkan</button>
                                    <button onclick="showModalTolak()" class="px-4 py-1.5 border border-[#d6c3b8] text-[#51443c] hover:bg-[#f8f3ed] font-bold text-xs rounded-md transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">close</span> Tolak</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="py-4 px-6 font-medium text-primary">Ahmad Fauzi</td>
                                <td class="py-4 px-6 text-on-surface-variant">3032001</td>
                                <td class="py-4 px-6 text-on-surface-variant">fauzi.guru@school.ac.id</td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-md bg-primary-container text-on-primary-container text-[12px] font-label-sm">Guru</span>
                                </td>
                                <td class="py-4 px-6 text-on-surface-variant">11 Okt 2024</td>
                                <td class="py-4 px-6 flex justify-end gap-2">
                                    <button onclick="showModalAktifkan()" class="px-4 py-1.5 bg-[#feae2c] text-[#6b4500] hover:brightness-110 font-bold text-xs rounded-md shadow-sm transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">check</span> Aktifkan</button>
                                    <button onclick="showModalTolak()" class="px-4 py-1.5 border border-[#d6c3b8] text-[#51443c] hover:bg-[#f8f3ed] font-bold text-xs rounded-md transition-soft flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">close</span> Tolak</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Aktifkan -->
<div id="modal-aktifkan" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/50 hidden backdrop-blur-sm transition-opacity">
    <div class="bg-[#fef9f3] rounded-xl shadow-2xl p-6 w-full max-w-sm border border-[#d6c3b8] text-center">
        <span class="material-symbols-outlined text-[#feae2c] text-5xl mb-4">how_to_reg</span>
        <h3 class="text-xl font-bold text-[#50290b] mb-2" style="font-family: var(--font-serif)">Aktifkan Akun?</h3>
        <p class="text-xs text-[#51443c] mb-6">Akun akan aktif dan user dapat login ke dalam sistem.</p>
        <div class="flex gap-2 justify-center">
            <button type="button" onclick="closeModalAktifkan()" class="px-4 py-2 rounded-lg font-bold text-xs text-[#51443c] border border-[#d6c3b8] hover:bg-[#f8f3ed] transition-colors">Batal</button>
            <button type="button" onclick="confirmAktifkan()" class="px-4 py-2 rounded-lg font-bold text-xs bg-[#feae2c] text-[#6b4500] hover:brightness-110 transition-all">Ya, Aktifkan</button>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div id="modal-tolak" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/50 hidden backdrop-blur-sm transition-opacity">
    <div class="bg-red-50 rounded-xl shadow-2xl p-6 w-full max-w-sm border border-red-200 text-center">
        <span class="material-symbols-outlined text-red-500 text-5xl mb-4">person_off</span>
        <h3 class="text-xl font-bold text-red-700 mb-2" style="font-family: var(--font-serif)">Tolak Akun?</h3>
        <p class="text-xs text-red-600/80 mb-6">Apakah Anda yakin ingin menolak pendaftaran akun ini? Akun akan dihapus dari antrean.</p>
        <div class="flex gap-2 justify-center">
            <button type="button" onclick="closeModalTolak()" class="px-4 py-2 rounded-lg font-bold text-xs text-red-700 border border-red-200 hover:bg-red-100 transition-colors">Batal</button>
            <button type="button" onclick="confirmTolak()" class="px-4 py-2 rounded-lg font-bold text-xs bg-red-500 text-white hover:bg-red-600 transition-all shadow-md hover:shadow-lg">Ya, Tolak</button>
        </div>
    </div>
</div>

<!-- Toasts -->
<div id="toast-aktifkan" class="fixed top-5 left-1/2 -translate-x-1/2 z-[70] flex items-center gap-3 bg-green-100 border border-green-300 text-green-800 px-6 py-3 rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform -translate-y-4">
    <span class="material-symbols-outlined">check_circle</span>
    <span class="font-bold text-sm">Akun berhasil diaktifkan!</span>
</div>
<div id="toast-tolak" class="fixed top-5 left-1/2 -translate-x-1/2 z-[70] flex items-center gap-3 bg-red-100 border border-red-300 text-red-800 px-6 py-3 rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform -translate-y-4">
    <span class="material-symbols-outlined">delete</span>
    <span class="font-bold text-sm">Pendaftaran akun ditolak.</span>
</div>

@push('scripts')
<script>
    const modalAktifkan = document.getElementById('modal-aktifkan');
    const modalTolak = document.getElementById('modal-tolak');
    const toastAktifkan = document.getElementById('toast-aktifkan');
    const toastTolak = document.getElementById('toast-tolak');

    function showModalAktifkan() { modalAktifkan.classList.remove('hidden'); }
    function closeModalAktifkan() { modalAktifkan.classList.add('hidden'); }
    
    function showModalTolak() { modalTolak.classList.remove('hidden'); }
    function closeModalTolak() { modalTolak.classList.add('hidden'); }

    function showToast(toastEl) {
        toastEl.classList.remove('opacity-0', 'invisible', '-translate-y-4');
        toastEl.classList.add('opacity-100', 'visible', 'translate-y-0');
        setTimeout(() => {
            toastEl.classList.remove('opacity-100', 'visible', 'translate-y-0');
            toastEl.classList.add('opacity-0', 'invisible', '-translate-y-4');
        }, 3000);
    }

    function confirmAktifkan() {
        closeModalAktifkan();
        showToast(toastAktifkan);
    }
    
    function confirmTolak() {
        closeModalTolak();
        showToast(toastTolak);
    }
</script>
@endpush
@endsection
