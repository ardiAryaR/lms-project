@extends('layouts.admin')
@section('title', 'Manajemen Akun - Admin Panel SMK Mandalahayu 1 Bekasi')

@section('content')
<!-- Page Header & Primary Action -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-outline-variant pb-6 mb-6">
    <div>
        <h1 class="font-h2 text-h2 text-primary">Manajemen Akun</h1>
        <p class="font-body-md text-body-md text-on-surface-variant mt-1">Kelola data pengguna, role, dan status akses sistem.</p>
    </div>
</div>

<!-- Controls: Filters & Search -->
<div class="bg-surface rounded-xl border border-outline-variant/30 shadow-sm mb-6 z-10 relative">
    <div class="p-4 bg-surface-container-low border-b border-surface-variant flex flex-col md:flex-row gap-4 items-center rounded-t-xl">
        <!-- Search Input -->
        <div class="relative flex-1 w-full group">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-secondary pointer-events-none transition-soft" style="font-size: 20px">search</span>
            <input id="searchInput" onkeyup="filterTable()" class="w-full bg-surface border-2 border-outline-variant/50 rounded-xl pl-10 pr-4 py-2.5 text-sm text-on-surface focus:outline-none focus:border-secondary focus:ring-0 transition-soft hover:border-secondary/50 placeholder-on-surface-variant/50" placeholder="Cari nama, email..." type="text">
        </div>
        <!-- Filter Role -->
        <div class="relative w-full md:w-auto md:min-w-[170px] shrink-0">
            <input type="hidden" id="filterRole" value="Semua">
            <button type="button" onclick="toggleDropdown('role')" class="w-full bg-surface border-2 border-outline-variant/50 rounded-xl pl-10 pr-10 py-2.5 text-sm font-medium text-on-surface text-left focus:outline-none focus:border-secondary focus:ring-0 transition-soft hover:border-secondary/50">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">badge</span>
                <span id="filterRoleLabel">Semua Role</span>
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">expand_more</span>
            </button>
            <div id="dropdownRole" class="hidden absolute z-20 mt-2 w-full md:min-w-[170px] bg-surface rounded-xl border border-outline-variant/30 shadow-xl overflow-hidden">
                <button type="button" onclick="selectDropdown('role','Semua','Semua Role')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Semua Role</button>
                <button type="button" onclick="selectDropdown('role','Siswa','Siswa')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Siswa</button>
                <button type="button" onclick="selectDropdown('role','Guru','Guru')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Guru</button>
                <button type="button" onclick="selectDropdown('role','Admin','Admin')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Admin</button>
            </div>
        </div>
        <!-- Filter Status -->
        <div class="relative w-full md:w-auto md:min-w-[170px] shrink-0">
            <input type="hidden" id="filterStatus" value="Semua">
            <button type="button" onclick="toggleDropdown('status')" class="w-full bg-surface border-2 border-outline-variant/50 rounded-xl pl-10 pr-10 py-2.5 text-sm font-medium text-on-surface text-left focus:outline-none focus:border-secondary focus:ring-0 transition-soft hover:border-secondary/50">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">inventory_2</span>
                <span id="filterStatusLabel">Semua Status</span>
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none transition-soft" style="font-size: 20px">expand_more</span>
            </button>
            <div id="dropdownStatus" class="hidden absolute z-20 mt-2 w-full md:min-w-[170px] bg-surface rounded-xl border border-outline-variant/30 shadow-xl overflow-hidden">
                <button type="button" onclick="selectDropdown('status','Semua','Semua Status')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Semua Status</button>
                <button type="button" onclick="selectDropdown('status','Active','Active')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Active</button>
                <button type="button" onclick="selectDropdown('status','Pending','Pending')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Pending</button>
                <button type="button" onclick="selectDropdown('status','Suspended','Suspended')" class="w-full text-left px-4 py-2.5 text-sm text-on-surface hover:bg-surface-variant/60 transition-soft">Suspended</button>
            </div>
        </div>
    </div>
</div>

<!-- Data Table Card -->
<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-xl shadow-sm shadow-primary/5 overflow-hidden flex-1 flex flex-col">
    <div class="overflow-x-auto table-scrollbar">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low border-b border-outline-variant">
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">No</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Nama</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">NIS/NRG</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Email</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Role</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Status Akun</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Tanggal Daftar</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant">Terakhir Login</th>
                    <th class="px-3 py-3 font-label-sm text-label-sm text-on-surface-variant text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="font-body-md text-body-md text-on-surface divide-y divide-outline-variant/50">
                <!-- Row 1: Active Guru -->
                <tr class="account-row hover:bg-surface-container-lowest/80 transition-colors group" data-role="Guru" data-status="Active">
                    <td class="px-3 py-3 text-on-surface-variant">1</td>
                    <td class="px-3 py-3 font-medium account-name">Budi Santoso, S.Pd</td>
                    <td class="px-3 py-3 text-on-surface-variant">2021005</td>
                    <td class="px-3 py-3 text-on-surface-variant account-email truncate max-w-[150px]" title="budi.santoso@smkmandalahayu.sch.id">budi.santoso@smkmandalahayu.sch.id</td>
                    <td class="px-3 py-3">Guru</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-600 border border-green-200">Active</span>
                    </td>
                    <td class="px-3 py-3 text-on-surface-variant">12 Aug 2023</td>
                    <td class="px-3 py-3 text-on-surface-variant">Hari ini, 08:30</td>
                    <td class="px-3 py-3 text-right relative">
                        <button onclick="toggleActionMenu(1)" class="text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
                        </button>
                        <div id="actionMenu1" class="hidden absolute right-6 top-8 w-36 bg-surface-container-lowest rounded-lg border border-outline-variant/30 shadow-lg py-1 z-10 text-left">
                            <button onclick="showActionModal('nonaktif')" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50 text-gray-700 transition-colors">Nonaktif</button>
                            <button onclick="showActionModal('suspend')" class="w-full text-left px-4 py-2 text-sm hover:bg-orange-50 text-orange-600 transition-colors">Suspend (Block)</button>
                            <button onclick="showActionModal('hapus')" class="w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600 transition-colors">Hapus Akun</button>
                        </div>
                    </td>
                </tr>
                <!-- Row 2: Pending Siswa -->
                <tr class="account-row hover:bg-surface-container-lowest/80 transition-colors group" data-role="Siswa" data-status="Pending">
                    <td class="px-3 py-3 text-on-surface-variant">2</td>
                    <td class="px-3 py-3 font-medium account-name">Siti Rahmawati</td>
                    <td class="px-3 py-3 text-on-surface-variant">3020012</td>
                    <td class="px-3 py-3 text-on-surface-variant account-email truncate max-w-[150px]" title="siti.r@student.smkmandalahayu.sch.id">siti.r@student.smkmandalahayu.sch.id</td>
                    <td class="px-3 py-3">Siswa</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-600 border border-blue-200">Pending</span>
                    </td>
                    <td class="px-3 py-3 text-on-surface-variant">24 Oct 2023</td>
                    <td class="px-3 py-3 text-on-surface-variant">-</td>
                    <td class="px-3 py-3 text-right relative">
                        <button onclick="toggleActionMenu(2)" class="text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
                        </button>
                        <div id="actionMenu2" class="hidden absolute right-6 top-8 w-36 bg-surface-container-lowest rounded-lg border border-outline-variant/30 shadow-lg py-1 z-10 text-left">
                            <button onclick="showActionModal('aktifkan')" class="w-full text-left px-4 py-2 text-sm hover:bg-green-50 text-green-600 transition-colors">Aktifkan</button>
                            <button onclick="showActionModal('tolak')" class="w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600 transition-colors">Tolak</button>
                        </div>
                    </td>
                </tr>
                <!-- Row 3: Suspended Siswa -->
                <tr class="account-row hover:bg-surface-container-lowest/80 transition-colors group bg-error-container/10" data-role="Siswa" data-status="Suspended">
                    <td class="px-3 py-3 text-on-surface-variant">3</td>
                    <td class="px-3 py-3 font-medium account-name">Agus Setiawan</td>
                    <td class="px-3 py-3 text-on-surface-variant">3020054</td>
                    <td class="px-3 py-3 text-on-surface-variant account-email truncate max-w-[150px]" title="agus.s@student.smkmandalahayu.sch.id">agus.s@student.smkmandalahayu.sch.id</td>
                    <td class="px-3 py-3">Siswa</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-orange-100 text-orange-600 border border-orange-200">Suspended</span>
                    </td>
                    <td class="px-3 py-3 text-on-surface-variant">10 Jul 2022</td>
                    <td class="px-3 py-3 text-on-surface-variant">15 Sep 2023</td>
                    <td class="px-3 py-3 text-right relative">
                        <button onclick="toggleActionMenu(3)" class="text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
                        </button>
                        <div id="actionMenu3" class="hidden absolute right-6 top-8 w-36 bg-surface-container-lowest rounded-lg border border-outline-variant/30 shadow-lg py-1 z-10 text-left">
                            <button onclick="showActionModal('aktifkan')" class="w-full text-left px-4 py-2 text-sm hover:bg-green-50 text-green-600 transition-colors">Aktifkan</button>
                            <button onclick="showActionModal('hapus')" class="w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600 transition-colors">Hapus Akun</button>
                        </div>
                    </td>
                </tr>
                <!-- Row 4: Inactive Guru -->
                <tr class="account-row hover:bg-surface-container-lowest/80 transition-colors group" data-role="Guru" data-status="Inactive">
                    <td class="px-3 py-3 text-on-surface-variant">4</td>
                    <td class="px-3 py-3 font-medium account-name">Dra. Ratna Ningsih</td>
                    <td class="px-3 py-3 text-on-surface-variant">2010042</td>
                    <td class="px-3 py-3 text-on-surface-variant account-email truncate max-w-[150px]" title="ratna.n@smkmandalahayu.sch.id">ratna.n@smkmandalahayu.sch.id</td>
                    <td class="px-3 py-3">Guru</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200">Inactive</span>
                    </td>
                    <td class="px-3 py-3 text-on-surface-variant">05 Jan 2020</td>
                    <td class="px-3 py-3 text-on-surface-variant">01 Dec 2022</td>
                    <td class="px-3 py-3 text-right relative">
                        <button onclick="toggleActionMenu(4)" class="text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
                        </button>
                        <div id="actionMenu4" class="hidden absolute right-6 bottom-8 mb-2 w-36 bg-surface-container-lowest rounded-lg border border-outline-variant/30 shadow-lg py-1 z-10 text-left">
                            <button onclick="showActionModal('aktifkan')" class="w-full text-left px-4 py-2 text-sm hover:bg-green-50 text-green-600 transition-colors">Aktifkan</button>
                            <button onclick="showActionModal('suspend')" class="w-full text-left px-4 py-2 text-sm hover:bg-orange-50 text-orange-600 transition-colors">Suspend (Block)</button>
                            <button onclick="showActionModal('hapus')" class="w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600 transition-colors">Hapus Akun</button>
                        </div>
                    </td>
                </tr>
                <!-- Row 5: Blocked User -->
                <tr class="account-row hover:bg-surface-container-lowest/80 transition-colors group bg-error-container/20" data-role="Siswa" data-status="Suspended">
                    <td class="px-3 py-3 text-on-surface-variant">5</td>
                    <td class="px-3 py-3 font-medium account-name">Unknown User</td>
                    <td class="px-3 py-3 text-on-surface-variant">-</td>
                    <td class="px-3 py-3 text-on-surface-variant account-email truncate max-w-[150px]" title="spam.account@example.com">spam.account@example.com</td>
                    <td class="px-3 py-3">Siswa</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-600 border border-red-200">Blocked</span>
                    </td>
                    <td class="px-3 py-3 text-on-surface-variant">25 Oct 2023</td>
                    <td class="px-3 py-3 text-on-surface-variant">-</td>
                    <td class="px-3 py-3 text-right relative">
                        <button onclick="toggleActionMenu(5)" class="text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
                        </button>
                        <div id="actionMenu5" class="hidden absolute right-6 bottom-8 mb-2 w-36 bg-surface-container-lowest rounded-lg border border-outline-variant/30 shadow-lg py-1 z-10 text-left">
                            <button onclick="showActionModal('aktifkan')" class="w-full text-left px-4 py-2 text-sm hover:bg-green-50 text-green-600 transition-colors">Aktifkan</button>
                            <button onclick="showActionModal('hapus')" class="w-full text-left px-4 py-2 text-sm hover:bg-red-50 text-red-600 transition-colors">Hapus Akun</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination Footer -->
    <div id="pagination-container" class="bg-surface-container-low border-t border-outline-variant p-4 flex items-center justify-between">
        <!-- Will be populated by JS -->
    </div>
</div>

<!-- Global Modals for Actions -->
<div id="modal-action" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/50 hidden backdrop-blur-sm transition-opacity">
    <!-- Dynamic Content will be injected here -->
</div>

<!-- Global Toasts for Actions -->
<div id="toast-action" class="fixed top-5 left-1/2 -translate-x-1/2 z-[70] flex items-center gap-3 px-6 py-3 rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform -translate-y-4">
    <span class="material-symbols-outlined" id="toast-icon"></span>
    <span class="font-bold text-sm" id="toast-text"></span>
</div>

@push('scripts')
<script>
    function toggleDropdown(type) {
        const targetId = type === 'role' ? 'dropdownRole' : 'dropdownStatus';
        const target = document.getElementById(targetId);
        const otherId = type === 'role' ? 'dropdownStatus' : 'dropdownRole';
        const other = document.getElementById(otherId);
        if (other && !other.classList.contains('hidden')) {
            other.classList.add('hidden');
        }
        target.classList.toggle('hidden');
    }

    function selectDropdown(type, value, label) {
        if (type === 'role') {
            document.getElementById('filterRole').value = value;
            document.getElementById('filterRoleLabel').textContent = label;
            document.getElementById('dropdownRole').classList.add('hidden');
        } else {
            document.getElementById('filterStatus').value = value;
            document.getElementById('filterStatusLabel').textContent = label;
            document.getElementById('dropdownStatus').classList.add('hidden');
        }
        filterTable();
    }
    
    let currentPage = 1;
    const rowsPerPage = 10;

    function filterTable() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        const role = document.getElementById('filterRole').value;
        const status = document.getElementById('filterStatus').value;
        
        const rows = document.querySelectorAll('.account-row');
        let visibleRows = [];
        
        rows.forEach(row => {
            const rowRole = row.getAttribute('data-role');
            const rowStatus = row.getAttribute('data-status');
            const rowName = row.querySelector('.account-name').textContent.toLowerCase();
            const rowEmail = row.querySelector('.account-email').textContent.toLowerCase();
            
            const matchSearch = query === '' || rowName.includes(query) || rowEmail.includes(query);
            const matchRole = role === 'Semua' || rowRole === role;
            const matchStatus = status === 'Semua' || rowStatus === status;
            
            if(matchSearch && matchRole && matchStatus) {
                visibleRows.push(row);
            } else {
                row.style.display = 'none';
            }
        });
        
        // Pagination logic
        const totalRows = visibleRows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage) || 1;
        
        if (currentPage > totalPages) currentPage = totalPages;
        
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        
        visibleRows.forEach((row, index) => {
            if (index >= start && index < end) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        
        renderPagination(totalRows, totalPages, start, end);
    }
    
    function changePage(page) {
        currentPage = page;
        filterTable();
    }
    
    function renderPagination(totalRows, totalPages, start, end) {
        const container = document.getElementById('pagination-container');
        if (!container) return;
        
        const startText = totalRows === 0 ? 0 : start + 1;
        const endText = Math.min(end, totalRows);
        
        let html = `<span class="font-body-md text-body-md text-on-surface-variant text-sm">Menampilkan ${startText}-${endText} dari ${totalRows} akun (Maksimal 10 per halaman)</span>`;
        html += `<div class="flex items-center gap-1">`;
        
        // Prev
        if (currentPage === 1) {
            html += `<button class="p-1 rounded text-outline hover:bg-surface-container opacity-50 cursor-not-allowed"><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></button>`;
        } else {
            html += `<button onclick="changePage(${currentPage - 1})" class="p-1 rounded text-on-surface-variant hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></button>`;
        }
        
        // Numbers
        for (let i = 1; i <= totalPages; i++) {
            if (i === currentPage) {
                html += `<button class="w-8 h-8 rounded bg-primary text-on-primary font-label-sm text-sm flex items-center justify-center">${i}</button>`;
            } else {
                html += `<button onclick="changePage(${i})" class="w-8 h-8 rounded text-on-surface-variant hover:bg-surface-container font-label-sm text-sm flex items-center justify-center">${i}</button>`;
            }
        }
        
        // Next
        if (currentPage === totalPages) {
            html += `<button class="p-1 rounded text-outline hover:bg-surface-container opacity-50 cursor-not-allowed"><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></button>`;
        } else {
            html += `<button onclick="changePage(${currentPage + 1})" class="p-1 rounded text-on-surface-variant hover:text-primary hover:bg-surface-container"><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></button>`;
        }
        
        html += `</div>`;
        container.innerHTML = html;
    }

    document.addEventListener('DOMContentLoaded', () => {
        filterTable();
    });
    
    function toggleActionMenu(id) {
        const menus = document.querySelectorAll('[id^="actionMenu"]');
        menus.forEach(menu => {
            if(menu.id !== 'actionMenu'+id) menu.classList.add('hidden');
        });
        const target = document.getElementById('actionMenu'+id);
        target.classList.toggle('hidden');
    }

    document.addEventListener('click', function (event) {
        const roleWrapper = document.getElementById('dropdownRole');
        const statusWrapper = document.getElementById('dropdownStatus');
        if (!event.target.closest('[onclick="toggleDropdown(\'role\')"]') && roleWrapper && !roleWrapper.classList.contains('hidden')) {
            roleWrapper.classList.add('hidden');
        }
        if (!event.target.closest('[onclick="toggleDropdown(\'status\')"]') && statusWrapper && !statusWrapper.classList.contains('hidden')) {
            statusWrapper.classList.add('hidden');
        }
        
        if (!event.target.closest('[onclick^="toggleActionMenu"]')) {
            const menus = document.querySelectorAll('[id^="actionMenu"]');
            menus.forEach(menu => menu.classList.add('hidden'));
        }
    });

    // --- Action Modal Logic ---
    const modalAction = document.getElementById('modal-action');
    const toastAction = document.getElementById('toast-action');
    let currentAction = '';

    const actionData = {
        'aktifkan': {
            icon: 'how_to_reg', iconColor: 'text-[#feae2c]', title: 'Aktifkan Akun?', titleColor: 'text-[#50290b]',
            desc: 'Akun akan aktif dan user dapat login ke dalam sistem.', bg: 'bg-[#fef9f3]', border: 'border-[#d6c3b8]',
            btnBg: 'bg-[#feae2c]', btnText: 'text-[#6b4500]', btnHover: 'hover:brightness-110', label: 'Ya, Aktifkan',
            toastBg: 'bg-green-100', toastBorder: 'border-green-300', toastText: 'text-green-800', toastIcon: 'check_circle', toastMsg: 'Akun berhasil diaktifkan!'
        },
        'tolak': {
            icon: 'person_off', iconColor: 'text-red-500', title: 'Tolak Akun?', titleColor: 'text-red-700',
            desc: 'Apakah Anda yakin ingin menolak pendaftaran akun ini?', bg: 'bg-red-50', border: 'border-red-200',
            btnBg: 'bg-red-500', btnText: 'text-white', btnHover: 'hover:bg-red-600', label: 'Ya, Tolak',
            toastBg: 'bg-red-100', toastBorder: 'border-red-300', toastText: 'text-red-800', toastIcon: 'delete', toastMsg: 'Pendaftaran ditolak.'
        },
        'suspend': {
            icon: 'block', iconColor: 'text-orange-500', title: 'Suspend Akun?', titleColor: 'text-orange-700',
            desc: 'User tidak akan bisa login sampai akun diaktifkan kembali.', bg: 'bg-orange-50', border: 'border-orange-200',
            btnBg: 'bg-orange-500', btnText: 'text-white', btnHover: 'hover:bg-orange-600', label: 'Ya, Suspend',
            toastBg: 'bg-orange-100', toastBorder: 'border-orange-300', toastText: 'text-orange-800', toastIcon: 'block', toastMsg: 'Akun berhasil disuspend.'
        },
        'nonaktif': {
            icon: 'person_remove', iconColor: 'text-gray-500', title: 'Nonaktifkan Akun?', titleColor: 'text-gray-700',
            desc: 'Akun akan dinonaktifkan sementara.', bg: 'bg-gray-50', border: 'border-gray-200',
            btnBg: 'bg-gray-500', btnText: 'text-white', btnHover: 'hover:bg-gray-600', label: 'Ya, Nonaktifkan',
            toastBg: 'bg-gray-100', toastBorder: 'border-gray-300', toastText: 'text-gray-800', toastIcon: 'info', toastMsg: 'Akun dinonaktifkan.'
        },
        'hapus': {
            icon: 'delete_forever', iconColor: 'text-red-600', title: 'Hapus Permanen?', titleColor: 'text-red-800',
            desc: 'Seluruh data akun ini akan dihapus secara permanen.', bg: 'bg-red-50', border: 'border-red-200',
            btnBg: 'bg-red-600', btnText: 'text-white', btnHover: 'hover:bg-red-700', label: 'Ya, Hapus',
            toastBg: 'bg-red-100', toastBorder: 'border-red-300', toastText: 'text-red-800', toastIcon: 'delete', toastMsg: 'Akun berhasil dihapus permanen.'
        }
    };

    function showActionModal(action) {
        currentAction = action;
        const data = actionData[action];
        
        modalAction.innerHTML = `
            <div class="${data.bg} rounded-xl shadow-2xl p-6 w-full max-w-sm border ${data.border} text-center">
                <span class="material-symbols-outlined ${data.iconColor} text-5xl mb-4">${data.icon}</span>
                <h3 class="text-xl font-bold ${data.titleColor} mb-2" style="font-family: var(--font-serif)">${data.title}</h3>
                <p class="text-xs text-on-surface-variant mb-6 opacity-80">${data.desc}</p>
                <div class="flex gap-2 justify-center">
                    <button type="button" onclick="closeActionModal()" class="px-4 py-2 rounded-lg font-bold text-xs text-on-surface-variant border ${data.border} hover:bg-black/5 transition-colors">Batal</button>
                    <button type="button" onclick="confirmAction()" class="px-4 py-2 rounded-lg font-bold text-xs ${data.btnBg} ${data.btnText} ${data.btnHover} transition-all">${data.label}</button>
                </div>
            </div>
        `;
        
        modalAction.classList.remove('hidden');
        const menus = document.querySelectorAll('[id^="actionMenu"]');
        menus.forEach(menu => menu.classList.add('hidden'));
    }

    function closeActionModal() {
        modalAction.classList.add('hidden');
    }

    function confirmAction() {
        closeActionModal();
        const data = actionData[currentAction];
        
        // Setup toast
        toastAction.className = `fixed top-5 left-1/2 -translate-x-1/2 z-[70] flex items-center gap-3 px-6 py-3 rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform -translate-y-4 ${data.toastBg} ${data.toastBorder} border ${data.toastText}`;
        document.getElementById('toast-icon').textContent = data.toastIcon;
        document.getElementById('toast-text').textContent = data.toastMsg;
        
        // Show toast
        toastAction.classList.remove('opacity-0', 'invisible', '-translate-y-4');
        toastAction.classList.add('opacity-100', 'visible', 'translate-y-0');
        
        setTimeout(() => {
            toastAction.classList.remove('opacity-100', 'visible', 'translate-y-0');
            toastAction.classList.add('opacity-0', 'invisible', '-translate-y-4');
        }, 3000);
    }
</script>
@endpush


@endsection
