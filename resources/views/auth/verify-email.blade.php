@extends('layouts.auth')
@section('title', 'Verifikasi Email - SMK Mandalahayu 1')
@section('content')
<div class="w-full min-h-screen md:h-screen flex flex-col md:flex-row overflow-hidden">
    @include('auth.partials.left-panel', [
        'heading'    => 'Satu Langkah Lagi!',
        'subheading' => 'Verifikasi email Anda untuk mengaktifkan akun dan mengakses seluruh fitur portal e-learning SMK Mandalahayu 1 Bekasi.',
    ])

    {{-- Right Side --}}
    <div class="w-full md:w-3/5 bg-surface-container-lowest flex items-center justify-center md:justify-start min-h-screen md:h-screen overflow-y-auto p-6 md:p-8 md:pl-10 lg:pl-14">
        <div class="w-full max-w-md text-center md:text-left">
            <div class="w-16 h-16 rounded-full bg-secondary-fixed/30 flex items-center justify-center mx-auto md:mx-0 mb-4">
                <span class="material-symbols-outlined text-4xl text-secondary">mark_email_read</span>
            </div>
            <h1 class="font-bold text-4xl text-primary mb-2" style="font-family: var(--font-serif)">Cek Email Anda</h1>
            <p class="text-on-surface-variant mb-6 leading-relaxed text-sm">
                Terima kasih! Link verifikasi telah dikirim ke email Anda.<br>
                Silakan buka email Anda dan klik tautan verifikasi.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-3 bg-secondary-fixed/30 text-on-secondary-fixed rounded-lg text-sm">
                    Link verifikasi baru telah dikirim ke email Anda.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
                @csrf
                <button type="submit" class="w-full bg-secondary-container text-on-secondary-container font-bold py-4 px-6 rounded hover:bg-secondary-fixed transition-soft flex justify-center items-center gap-2 text-sm">
                    <span class="material-symbols-outlined">refresh</span>
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-on-surface-variant hover:text-error font-semibold text-sm flex items-center gap-1 mx-auto transition-soft">
                    <span class="material-symbols-outlined" style="font-size:16px">logout</span>
                    Keluar dari Akun
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
