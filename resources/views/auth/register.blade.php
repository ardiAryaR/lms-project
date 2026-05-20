@extends('layouts.auth')

@section('title', 'Daftar Akun - SMK Mandalahayu 1 Bekasi')

@section('content')
<div class="w-full min-h-screen md:h-screen flex flex-col md:flex-row overflow-hidden">
    @include('auth.partials.left-panel', [
        'heading'    => 'Mulai Perjalanan Akademik Anda',
        'subheading' => 'Bergabunglah dengan komunitas pembelajaran kami yang mengedepankan tradisi akademik dan kemajuan modern. Daftar sekarang untuk mengakses portal LMS.',
    ])
    {{-- Right Side: Register Form --}}
    <div class="w-full md:w-3/5 bg-surface-container-lowest flex items-center justify-center md:justify-start min-h-screen md:h-screen overflow-y-auto p-6 md:p-8 md:pl-10 lg:pl-14">
        <div class="w-full max-w-md">
            <div class="mb-4 text-center md:text-left">
                <h1 class="font-bold text-4xl text-primary mb-1" style="font-family: var(--font-serif)">Daftar Akun</h1>
                <p class="text-on-surface-variant text-sm">SMK Mandalahayu 1 Bekasi</p>
            </div>
            @if ($errors->any())
                <div class="mb-4 p-3 bg-error-container text-on-error-container rounded-lg text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-2.5" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-primary mb-1" for="name">Nama Lengkap</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="name" name="name" placeholder="Masukkan nama lengkap" type="text" value="{{ old('name') }}" required/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-primary mb-1" for="email">Email</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="email" name="email" placeholder="Masukkan email" type="email" value="{{ old('email') }}" required/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-primary mb-1" for="password">Password</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="password" name="password" placeholder="Buat password" type="password" required/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-primary mb-1" for="password_confirmation">Konfirmasi Password</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" type="password" required/>
                </div>
                <div class="pt-2">
                    <button class="w-full bg-secondary-container text-on-secondary-container font-bold py-4 px-6 rounded hover:bg-secondary-fixed transition-soft flex justify-center items-center gap-2" type="submit">
                        Daftar Sekarang
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center md:text-left text-sm">
                <p class="text-on-surface-variant">Sudah punya akun?
                    <a class="text-primary font-semibold hover:underline decoration-primary underline-offset-4" href="{{ route('login') }}">Masuk</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
