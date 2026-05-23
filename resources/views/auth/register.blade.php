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
                {{-- Role Selection --}}
                <div>
                    <label class="block text-sm font-semibold text-primary mb-2">Daftar Sebagai</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="role" value="murid" class="peer sr-only" {{ old('role', 'murid') === 'murid' ? 'checked' : '' }} onchange="toggleIdentifier()" />
                            <div class="w-full text-center py-2.5 rounded-lg border-2 border-primary/20 bg-surface-container-low text-on-surface-variant text-sm font-semibold peer-checked:border-secondary-container peer-checked:bg-secondary-container/20 peer-checked:text-primary transition-soft flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined" style="font-size:18px">school</span> Murid
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="role" value="guru" class="peer sr-only" {{ old('role') === 'guru' ? 'checked' : '' }} onchange="toggleIdentifier()" />
                            <div class="w-full text-center py-2.5 rounded-lg border-2 border-primary/20 bg-surface-container-low text-on-surface-variant text-sm font-semibold peer-checked:border-secondary-container peer-checked:bg-secondary-container/20 peer-checked:text-primary transition-soft flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined" style="font-size:18px">person</span> Guru
                            </div>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-primary mb-1" for="name">Nama Lengkap</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="name" name="name" placeholder="Masukkan nama lengkap" type="text" value="{{ old('name') }}" required/>
                </div>
                {{-- NIS Field (for Murid) --}}
                <div id="nis-field">
                    <label class="block text-sm font-semibold text-primary mb-1" for="nis">NIS (Nomor Induk Siswa)</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="nis" name="nis" placeholder="Masukkan NIS" type="number" value="{{ old('nis') }}" required/>
                </div>
                {{-- NRG Field (for Guru) --}}
                <div id="nrg-field" style="display: none;">
                    <label class="block text-sm font-semibold text-primary mb-1" for="nrg">NRG (Nomor Registrasi Guru)</label>
                    <input class="w-full bg-surface-container-low border-0 border-b-2 border-primary/20 text-on-surface focus:ring-0 focus:border-secondary-container transition-soft py-2 px-3 text-sm"
                           id="nrg" name="nrg" placeholder="Masukkan NRG" type="number" value="{{ old('nrg') }}"/>
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

<script>
    function toggleIdentifier() {
        const role = document.querySelector('input[name="role"]:checked')?.value;
        const nisField = document.getElementById('nis-field');
        const nisInput = document.getElementById('nis');
        const nrgField = document.getElementById('nrg-field');
        const nrgInput = document.getElementById('nrg');
        
        if (role === 'guru') {
            nisField.style.display = 'none';
            nisInput.removeAttribute('required');
            
            nrgField.style.display = 'block';
            nrgInput.setAttribute('required', 'required');
        } else {
            nisField.style.display = 'block';
            nisInput.setAttribute('required', 'required');
            
            nrgField.style.display = 'none';
            nrgInput.removeAttribute('required');
        }
    }

    // Panggil saat pertama kali load agar validasi menyesuaikan pilihan default
    document.addEventListener('DOMContentLoaded', toggleIdentifier);
</script>
