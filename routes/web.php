<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes - LMS SMK Mandalahayu 1 Bekasi
|--------------------------------------------------------------------------
*/

// Home: halaman profil web sekolah (publik, tidak perlu login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ─── Auth Routes (Laravel Breeze / Manual) ────────────────────
require __DIR__.'/auth.php';

// ─── DEV SHORTCUTS: Akses Langsung Tanpa Login ────────────────
// ⚠️ HAPUS bagian ini sebelum deploy ke production!
if (app()->environment('local')) {

    // Masuk sebagai Guru (auto-login user pertama atau buat user dummy)
    Route::get('/dev/guru', function () {
        $user = User::first() ?? User::create([
            'name'     => 'Bpk. Ahmad Suherman',
            'email'    => 'guru@smkmandalahayu.sch.id',
            'password' => bcrypt('password'),
        ]);
        Auth::login($user);
        return redirect()->route('guru.dashboard');
    })->name('dev.guru');

    // Masuk sebagai Siswa (auto-login user kedua atau buat user dummy)
    Route::get('/dev/siswa', function () {
        $user = User::skip(1)->first() ?? User::create([
            'name'     => 'Budi Pratama',
            'email'    => 'siswa@smkmandalahayu.sch.id',
            'password' => bcrypt('password'),
        ]);
        Auth::login($user);
        return redirect()->route('siswa.dashboard');
    })->name('dev.siswa');

    // Masuk sebagai Admin (buat user dummy admin)
    Route::get('/dev/admin', function () {
        $user = User::firstOrCreate(
            ['email' => 'admin@smkmandalahayu.sch.id'],
            [
                'name'     => 'Administrator',
                'password' => bcrypt('password'),
            ]
        );
        Auth::login($user);
        return redirect()->route('admin.dashboard');
    })->name('dev.admin');

    // Halaman index semua shortcut
    Route::get('/dev', function () {
        return response()->view('dev-index');
    })->name('dev.index');
}

// ─── Guru Routes (Protected) ──────────────────────────────────
Route::prefix('guru')->name('guru.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('guru.dashboard'))->name('dashboard');

    // Kelas
    Route::get('/kelas', fn() => view('guru.kelas'))->name('kelas');
    Route::get('/kelas/detail', fn() => view('guru.kelas-detail'))->name('kelas.detail');
    Route::get('/kelas/buat', fn() => view('guru.buat-kelas'))->name('kelas.buat');

    // Materi
    Route::get('/materi', fn() => view('guru.materi'))->name('materi');
    Route::get('/materi/tambah', fn() => view('guru.tambah-materi'))->name('materi.tambah');
    Route::post('/materi/store', fn() => back()->with('success', 'Materi berhasil disimpan!'))->name('materi.store');

    // Tugas
    Route::get('/tugas', fn() => view('guru.tugas'))->name('tugas');
    Route::get('/tugas/buat', fn() => view('guru.buat-tugas'))->name('tugas.buat');

    // Kuis
    Route::get('/kuis', fn() => view('guru.kuis'))->name('kuis');
    Route::get('/kuis/buat', fn() => view('guru.buat-kuis'))->name('kuis.buat');

    // Ujian
    Route::get('/ujian', fn() => view('guru.ujian'))->name('ujian');
    Route::get('/ujian/buat', fn() => view('guru.buat-ujian'))->name('ujian.buat');

    // Nilai & Rekap
    Route::get('/nilai', fn() => view('guru.nilai'))->name('nilai');
    Route::get('/nilai/rekap', fn() => view('guru.rekap-nilai'))->name('nilai.rekap');

    // Monitor & Penilaian
    Route::get('/monitor', fn() => view('guru.monitor-tugas'))->name('monitor');
    Route::get('/monitor/tugas', fn() => view('guru.monitor-tugas'))->name('monitor.tugas');
    Route::get('/penilaian/tugas', fn() => view('guru.penilaian-tugas'))->name('penilaian.tugas');
    Route::get('/penilaian/kuis', fn() => view('guru.penilaian-kuis'))->name('penilaian.kuis');
    Route::get('/penilaian/ujian', fn() => view('guru.penilaian-ujian'))->name('penilaian.ujian');

    // Notifikasi
    Route::get('/notifikasi', fn() => view('guru.notifikasi'))->name('notifikasi');
});

// ─── Siswa Routes (Protected) ─────────────────────────────────
Route::prefix('siswa')->name('siswa.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('siswa.dashboard'))->name('dashboard');

    // Mata Pelajaran
    Route::get('/mapel', fn() => view('siswa.mapel'))->name('mapel');
    Route::get('/mapel/detail', fn() => view('siswa.kelas-detail'))->name('mapel.detail');

    // Materi
    Route::get('/materi', fn() => view('siswa.materi'))->name('materi');
    Route::get('/materi/lihat', fn() => view('siswa.lihat-materi'))->name('lihat-materi');

    // Tugas
    Route::get('/tugas', fn() => view('siswa.tugas'))->name('tugas');
    Route::get('/tugas/kerjakan', fn() => view('siswa.pengerjaan-tugas'))->name('pengerjaan-tugas');
    Route::get('/tugas/kumpulkan', fn() => view('siswa.kumpul-tugas'))->name('kumpul-tugas');

    // Ujian
    Route::get('/ujian', fn() => view('siswa.ujian'))->name('ujian');
    Route::get('/ujian/kerjakan', fn() => view('siswa.pengerjaan-ujian'))->name('pengerjaan-ujian');
    Route::get('/kuis/kerjakan', fn() => view('siswa.pengerjaan-kuis'))->name('pengerjaan-kuis');

    // Nilai
    Route::get('/nilai', fn() => view('siswa.nilai'))->name('nilai');

    // Notifikasi
    Route::get('/notifikasi', fn() => view('siswa.notifikasi'))->name('notifikasi');
});

// ─── Admin Routes (Protected) ─────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Manajemen Akun
    Route::get('/akun', fn() => view('admin.manajemen-akun'))->name('akun');
    
    // Laporan Aktivitas
    Route::get('/aktivitas', fn() => view('admin.laporan-aktivitas'))->name('aktivitas');
});
