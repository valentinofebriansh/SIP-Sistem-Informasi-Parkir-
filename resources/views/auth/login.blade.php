@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col justify-between bg-gradient-to-b from-[#C9C2FF] via-[#E2DEFF] to-white relative overflow-hidden px-7 py-8">
    <!-- Decorative Yellow Flower Accents in Corners -->
    <div class="absolute -top-10 -right-10 w-36 h-36 opacity-50 pointer-events-none transform rotate-12">
        <svg viewBox="0 0 60 60" class="w-full h-full">
            <ellipse cx="30" cy="18" rx="9" ry="14" fill="#FAFF00" />
            <ellipse cx="30" cy="42" rx="9" ry="14" fill="#FAFF00" />
            <ellipse cx="18" cy="30" rx="14" ry="9" fill="#FAFF00" />
            <ellipse cx="42" cy="30" rx="14" ry="9" fill="#FAFF00" />
        </svg>
    </div>
    <div class="absolute -bottom-10 -left-10 w-36 h-36 opacity-40 pointer-events-none transform -rotate-12">
        <svg viewBox="0 0 60 60" class="w-full h-full">
            <ellipse cx="30" cy="18" rx="9" ry="14" fill="#FAFF00" />
            <ellipse cx="30" cy="42" rx="9" ry="14" fill="#FAFF00" />
            <ellipse cx="18" cy="30" rx="14" ry="9" fill="#FAFF00" />
            <ellipse cx="42" cy="30" rx="14" ry="9" fill="#FAFF00" />
        </svg>
    </div>

    <!-- Top Logo & Back to Home -->
    <div class="flex items-center justify-between relative z-10">
        <a href="{{ route('home') }}" class="w-9 h-9 rounded-full bg-white/90 text-[#5B4EE6] flex items-center justify-center shadow-xs hover:bg-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex items-center gap-1.5">
            <svg viewBox="0 0 60 60" class="w-6 h-6">
                <ellipse cx="30" cy="18" rx="9" ry="13" fill="#FAFF00" />
                <ellipse cx="30" cy="42" rx="9" ry="13" fill="#FAFF00" />
                <ellipse cx="18" cy="30" rx="13" ry="9" fill="#FAFF00" />
                <ellipse cx="42" cy="30" rx="13" ry="9" fill="#FAFF00" />
                <circle cx="30" cy="30" r="4.5" fill="#5B4EE6" />
            </svg>
            <span class="font-heading font-extrabold text-lg text-[#5B4EE6]">SIP</span>
        </div>
    </div>

    <!-- Login Box Card -->
    <div class="relative z-10 my-auto py-6">
        <div class="text-center mb-6">
            <h1 class="font-heading font-black text-2xl text-gray-900 leading-snug">
                Masuk dengan <br><span class="text-[#5B4EE6]">akunmu!</span>
            </h1>
            <p class="text-xs text-gray-600 mt-1">Akses cepat info parkir motor Kampus Brawijaya</p>
        </div>

        @if(isset($errors) && $errors->any())
        <div class="mb-4 p-3 bg-red-100 border border-red-200 text-red-700 text-xs rounded-xl">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-3.5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Email / NIM</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="mahasiswa@student.ub.ac.id"
                    class="w-full bg-white text-xs px-4 py-3 rounded-xl border border-purple-200 focus:ring-2 focus:ring-[#5B4EE6] focus:border-[#5B4EE6] shadow-xs"
                >
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Kata Sandi</label>
                <input 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="••••••••"
                    class="w-full bg-white text-xs px-4 py-3 rounded-xl border border-purple-200 focus:ring-2 focus:ring-[#5B4EE6] focus:border-[#5B4EE6] shadow-xs"
                >
            </div>

            <button type="submit" class="w-full bg-[#5B4EE6] hover:bg-[#7C72F8] text-white text-sm font-heading font-bold py-3 rounded-xl shadow-md hover:shadow-lg transition">
                Masuk Sekarang
            </button>
        </form>

        <!-- Social SSO Mock -->
        <div class="mt-5 text-center">
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Atau masuk dengan:</p>
            <div class="flex gap-2 justify-center">
                <button type="button" class="px-3.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-semibold text-gray-700 hover:bg-gray-50 shadow-2xs">
                    Google
                </button>
                <button type="button" class="px-3.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-semibold text-gray-700 hover:bg-gray-50 shadow-2xs">
                    SSO UB
                </button>
            </div>
        </div>

        <!-- Links to Register and Guest -->
        <div class="mt-6 text-center space-y-3">
            <p class="text-xs text-gray-600">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-[#5B4EE6] hover:underline">Daftar Akun Baru</a>
            </p>

            <!-- PROMINENT GUEST-FIRST BUTTON -->
            <div class="pt-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white/90 hover:bg-white text-xs font-bold text-[#5B4EE6] border border-purple-200 rounded-full shadow-xs hover:shadow transition">
                    <span>Lanjutkan Langsung Tanpa Login</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Note -->
    <div class="text-center text-[10px] text-gray-400 relative z-10">
        SIP Universitas Brawijaya • Motor Campus Parking
    </div>
</div>
@endsection
