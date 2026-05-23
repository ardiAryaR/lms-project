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

            <form method="POST" action="{{ route('verification.send') }}" class="mb-4" id="resend-form">
                @csrf
                <button type="submit" id="resend-btn" disabled class="w-full bg-secondary-container text-on-secondary-container font-bold py-4 px-6 rounded hover:bg-secondary-fixed transition-soft flex justify-center items-center gap-2 text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                    <span class="material-symbols-outlined">refresh</span>
                    <span id="resend-text">Tunggu 03:00 sebelum mengirim ulang</span>
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
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resendBtn = document.getElementById('resend-btn');
        const resendText = document.getElementById('resend-text');
        
        let timeLeft = 180; // 3 menit dalam detik
        
        // Cek localStorage kalau ada sisa waktu sebelumnya
        const savedTime = localStorage.getItem('resend_timer_end');
        if (savedTime) {
            const now = Math.floor(Date.now() / 1000);
            const diff = savedTime - now;
            if (diff > 0) {
                timeLeft = diff;
            } else {
                timeLeft = 0;
            }
        } else {
            // Set end time di localStorage
            localStorage.setItem('resend_timer_end', Math.floor(Date.now() / 1000) + timeLeft);
        }

        function updateTimer() {
            if (timeLeft <= 0) {
                resendBtn.removeAttribute('disabled');
                resendText.textContent = 'Kirim Ulang Email Verifikasi';
                localStorage.removeItem('resend_timer_end');
                return;
            }
            
            resendBtn.setAttribute('disabled', 'disabled');
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            resendText.textContent = `Tunggu ${formattedTime} sebelum mengirim ulang`;
            
            timeLeft--;
            setTimeout(updateTimer, 1000);
        }
        
        updateTimer();

        // Saat form disubmit, reset timer ke 3 menit
        document.getElementById('resend-form').addEventListener('submit', function() {
            if (!resendBtn.hasAttribute('disabled')) {
                localStorage.setItem('resend_timer_end', Math.floor(Date.now() / 1000) + 180);
                // Biarkan form submit
            }
        });
    });
</script>
@endpush
