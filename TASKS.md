# TASKS.md — Frontend Progress Tracker

Update file ini setiap kali menyelesaikan atau memulai halaman baru.
Format: `[x]` = selesai, `[-]` = sedang dikerjakan, `[ ]` = belum dikerjakan

---

## ✅ Sudah Selesai

### Layouts
- [x] `layouts/auth.blade.php` — Layout login/register
- [x] `layouts/guru.blade.php` — Sidebar + navbar guru (dengan collapsible)
- [x] `layouts/siswa.blade.php` — Sidebar + navbar siswa (dengan collapsible)
- [x] `layouts/admin.blade.php` — Sidebar + navbar admin (dengan collapsible)

### Modul Autentikasi
- [x] Login (`auth/login.blade.php`)
- [x] Register (`auth/register.blade.php`) — NIS untuk murid, NRG untuk guru
- [x] Lupa Password (`auth/forgot-password.blade.php`)
- [x] Verifikasi Email (`auth/verify-email.blade.php`) — dengan countdown timer 3 menit

### Modul Guru
- [x] Dashboard Guru (`guru/dashboard.blade.php`) — stats, tabel submission pending
- [x] Daftar Kelas (`guru/kelas/index.blade.php`) — card grid, stats, progress bar
- [x] Detail Kelas (`guru/kelas/detail.blade.php`) — tabs: Siswa, Materi, Tugas, Kuis, Ujian, Pengumuman; enrollment key management
- [x] Buat Kelas (`guru/kelas/buat.blade.php`) — form + class key generator + status terjadwal
- [x] Daftar Materi (`guru/materi/index.blade.php`) — grid card, filter, search, delete modal
- [x] Tambah/Edit Materi (`guru/materi/tambah.blade.php`) — drag & drop upload, status publikasi
- [x] Daftar Tugas (`guru/tugas/index.blade.php`) — table, filter kelas & status
- [x] Buat/Edit Tugas (`guru/tugas/buat.blade.php`) — form lengkap, tipe tugas, format pengumpulan
- [x] Daftar Kuis (`guru/kuis/index.blade.php`) — table, filter
- [x] Buat/Edit Kuis (`guru/kuis/buat.blade.php`) — pembuat soal dinamis (PG & esai), auto-save time
- [x] Daftar Ujian (`guru/ujian/index.blade.php`) — table, filter
- [x] Buat/Edit Ujian (`guru/ujian/buat.blade.php`) — sama dengan kuis + randomisasi + auto-submit toggle
- [x] Nilai & Rekap (`guru/nilai.blade.php`) — summary stats + tabel rekap nilai akhir
- [x] Monitor Pengumpulan (`guru/monitor.blade.php`) — tabel monitoring semua submission
- [x] Penilaian Tugas (`guru/penilaian/tugas.blade.php`) — PDF viewer mockup, grading panel
- [x] Penilaian Kuis (`guru/penilaian/kuis.blade.php`) — tampilkan jawaban PG + input nilai esai, student navigator
- [x] Penilaian Ujian (`guru/penilaian/ujian.blade.php`) — sama dengan penilaian kuis
- [x] Notifikasi Guru (`guru/notifikasi.blade.php`) — list notifikasi dengan markRead & delete

### Modul Siswa
- [x] Dashboard Siswa (`siswa/dashboard.blade.php`) — stats, tugas deadline, materi terbaru, notifikasi
- [x] Daftar Mata Pelajaran (`siswa/mapel/index.blade.php`) — card grid, filter, gabung kelas modal
- [x] Detail Mata Pelajaran (`siswa/mapel/detail.blade.php`) — tabs: Materi, Tugas, Pengumuman
- [x] Lihat Materi (`siswa/lihat-materi.blade.php`) — PDF viewer mockup, sidebar daftar materi, navigasi prev/next
- [x] Nilai & Feedback (`siswa/nilai.blade.php`) — summary stats + tabel nilai dengan toggle feedback
- [x] Notifikasi Siswa (`siswa/notifikasi.blade.php`) — list notifikasi
- [x] Ruang Kuis (`siswa/pengerjaan-kuis.blade.php`) — timer countdown, navigasi soal grid, ragu-ragu flag
- [x] Pengumpulan Tugas (`siswa/pengerjaan-tugas.blade.php`) — split panel: detail tugas | area upload
- [x] Ruang Ujian (`siswa/pengerjaan-ujian.blade.php`) — sama dengan kuis tapi 40 soal

### Modul Admin
- [x] Dashboard Admin (`admin/dashboard.blade.php`) — KPI cards, tabel pending verifikasi
- [x] Manajemen Akun (`admin/akun.blade.php`) — tabel semua user, filter, action menu per baris
- [x] Laporan Aktivitas (`admin/aktivitas.blade.php`) — log login, filter role & status

### Halaman Lain
- [x] Landing Page (`welcome.blade.php`) — hero, about, program, kegiatan, PPDB, footer
- [x] Dev Panel (`dev.blade.php`) — quick access ke semua halaman (hanya untuk `APP_ENV=local`)

---

## 🔄 Sedang Dikerjakan

*(Kosongkan bagian ini saat tidak ada yang sedang dikerjakan)*

---

## ⬜ Belum Dikerjakan

### Global
- [ ] Halaman 404 custom
- [ ] Halaman 403 (unauthorized)
- [ ] Loading state / skeleton saat ada integrasi API

---

## 📌 Catatan Penting

- Semua halaman saat ini menggunakan **data dummy (hardcoded)** — belum terhubung ke backend/API
- Pastikan koordinasi dengan tim backend sebelum mengubah nama route
- Dev panel hanya aktif saat `APP_ENV=local`
- Semua modal konfirmasi sudah menggunakan pola standar (lihat `CLAUDE.md`)
