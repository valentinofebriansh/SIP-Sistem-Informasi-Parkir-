@extends('layouts.app')

@section('content')
<div x-data="{ search: '' }" class="flex-1 flex flex-col">
    <!-- Header Hero Section with Soft Lavender & Decorative Yellow Flowers -->
    <header class="bg-[#C9C2FF] rounded-b-[2.5rem] px-6 pt-7 pb-8 relative overflow-hidden shadow-sm">
        <!-- Decorative Yellow Flowers in Background -->
        <div class="absolute -top-8 -right-8 w-28 h-28 opacity-40 pointer-events-none transform rotate-12">
            <svg viewBox="0 0 60 60" class="w-full h-full">
                <ellipse cx="30" cy="18" rx="9" ry="14" fill="#FAFF00" />
                <ellipse cx="30" cy="42" rx="9" ry="14" fill="#FAFF00" />
                <ellipse cx="18" cy="30" rx="14" ry="9" fill="#FAFF00" />
                <ellipse cx="42" cy="30" rx="14" ry="9" fill="#FAFF00" />
            </svg>
        </div>
        <div class="absolute -bottom-6 -left-6 w-24 h-24 opacity-30 pointer-events-none transform -rotate-45">
            <svg viewBox="0 0 60 60" class="w-full h-full">
                <ellipse cx="30" cy="18" rx="9" ry="14" fill="#FAFF00" />
                <ellipse cx="30" cy="42" rx="9" ry="14" fill="#FAFF00" />
                <ellipse cx="18" cy="30" rx="14" ry="9" fill="#FAFF00" />
                <ellipse cx="42" cy="30" rx="14" ry="9" fill="#FAFF00" />
            </svg>
        </div>

        <!-- Top Bar: Logo + Profile Button -->
        <div class="flex items-center justify-between relative z-10 mb-6">
            <!-- SIP Logo -->
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 flex items-center justify-center">
                    <svg viewBox="0 0 60 60" class="w-8 h-8 drop-shadow-sm">
                        <ellipse cx="30" cy="18" rx="9" ry="13" fill="#FAFF00" />
                        <ellipse cx="30" cy="42" rx="9" ry="13" fill="#FAFF00" />
                        <ellipse cx="18" cy="30" rx="13" ry="9" fill="#FAFF00" />
                        <ellipse cx="42" cy="30" rx="13" ry="9" fill="#FAFF00" />
                        <circle cx="30" cy="30" r="4.5" fill="#5B4EE6" />
                    </svg>
                </div>
                <span class="font-heading font-extrabold text-2xl tracking-wider text-[#5B4EE6]">SIP</span>
            </div>

            <!-- Profile / Auth Action (Guest-First) -->
            <div x-data="{ open: false }" class="relative">
                @auth
                    <button @click="open = !open" type="button" class="flex items-center gap-2 bg-white/90 backdrop-blur-sm border border-purple-200 px-3 py-1.5 rounded-full shadow-sm text-xs font-semibold text-[#5B4EE6] hover:bg-white transition">
                        <span class="w-6 h-6 rounded-full bg-[#5B4EE6] text-white flex items-center justify-center text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <span class="max-w-[80px] truncate">{{ Auth::user()->name }}</span>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg border border-purple-100 py-1.5 z-20 text-xs">
                        <div class="px-3 py-2 border-b border-gray-100 font-medium text-gray-600 truncate">
                            {{ Auth::user()->email }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-50 font-semibold transition">
                                Keluar (Logout)
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-1.5 bg-white/90 backdrop-blur-sm border border-purple-200 px-3.5 py-1.5 rounded-full shadow-sm text-xs font-bold text-[#5B4EE6] hover:bg-white hover:shadow transition">
                        <svg class="w-4 h-4 text-[#5B4EE6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Masuk</span>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Greeting -->
        <div class="relative z-10 mb-5">
            <h1 class="font-heading font-extrabold text-2xl text-gray-900 leading-snug">
                Halo {{ Auth::check() ? Auth::user()->name : 'Mahasiswa' }},<br>
                mau <span class="text-[#5B4EE6] underline decoration-[#FAFF00] decoration-4">parkir</span> di mana hari ini?
            </h1>
        </div>

        <!-- Search Bar (Interactive Real-time filter) -->
        <div class="relative z-10 mb-4">
            <div class="relative flex items-center">
                <input 
                    type="text" 
                    x-model="search"
                    placeholder="Cari area parkir..." 
                    class="w-full bg-white text-gray-800 placeholder-gray-400 pl-11 pr-10 py-3 rounded-2xl shadow-md border-0 text-sm focus:ring-2 focus:ring-[#5B4EE6] transition"
                >
                <div class="absolute left-3.5 text-gray-400 pointer-events-none">
                    <svg class="w-5 h-5 text-[#5B4EE6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button 
                    x-show="search.length > 0" 
                    @click="search = ''" 
                    class="absolute right-3 text-gray-400 hover:text-gray-600 p-1"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Quick Action Buttons: Peta & Rekomendasi -->
        <div class="grid grid-cols-2 gap-3 relative z-10">
            <a href="{{ route('peta') }}" class="flex items-center gap-3 bg-white/95 hover:bg-white rounded-2xl p-3 shadow-md hover:shadow-lg transition group border border-purple-100">
                <div class="w-10 h-10 rounded-xl bg-purple-50 group-hover:bg-[#5B4EE6] text-[#5B4EE6] group-hover:text-white flex items-center justify-center transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-xs text-gray-900 leading-tight">Peta</h3>
                    <p class="text-[11px] text-gray-500">Kumpulan titik</p>
                </div>
            </a>

            <a href="{{ route('rekomendasi') }}" class="flex items-center gap-3 bg-white/95 hover:bg-white rounded-2xl p-3 shadow-md hover:shadow-lg transition group border border-purple-100">
                <div class="w-10 h-10 rounded-xl bg-purple-50 group-hover:bg-[#5B4EE6] text-[#5B4EE6] group-hover:text-white flex items-center justify-center transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-xs text-gray-900 leading-tight">Rekomendasi</h3>
                    <p class="text-[11px] text-gray-500">Tempat parkir</p>
                </div>
            </a>
        </div>
    </header>

    <!-- Main Content: Parking Areas List -->
    <div class="px-5 py-6 flex-1 flex flex-col">
        <div class="flex items-center justify-between mb-3">
            <h2 class="font-heading font-bold text-base text-gray-900">Area Parkir Kampus UB</h2>
            <span class="text-xs text-gray-500 font-medium">{{ count($areas) }} Area Terdaftar</span>
        </div>

        <!-- Cards List -->
        <div class="space-y-3.5">
            @foreach($areas as $area)
            <a 
                href="{{ route('area.show', $area->slug) }}" 
                x-show="search === '' || '{{ strtolower($area->name . ' ' . $area->location) }}'.includes(search.toLowerCase())"
                x-transition
                class="block bg-white rounded-2xl p-3.5 border border-purple-100 shadow-sm hover:shadow-md hover:border-purple-300 transition group"
            >
                <div class="flex items-center gap-3.5">
                    <!-- Thumbnail / Initial Badge -->
                    <div class="w-16 h-16 rounded-xl flex-shrink-0 flex flex-col items-center justify-center relative overflow-hidden shadow-sm {{ $area->available_slots > 0 ? 'bg-gradient-to-br from-[#5B4EE6] to-[#7C72F8]' : 'bg-gradient-to-br from-gray-500 to-gray-700' }}">
                        <span class="text-white font-heading font-black text-xl tracking-tight">
                            {{ substr(str_replace('Area Parkir ', '', $area->name), 0, 3) }}
                        </span>
                        <span class="text-[9px] text-white/80 font-medium uppercase tracking-wider mt-0.5">Motor</span>
                    </div>

                    <!-- Details -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-1">
                            <h3 class="font-heading font-bold text-sm text-gray-900 truncate group-hover:text-[#5B4EE6] transition">
                                {{ $area->name }}
                            </h3>
                            <span class="flex-shrink-0 inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $area->available_slots > 0 ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                                {{ $area->available_slots > 0 ? 'Tersedia' : 'Penuh' }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-500 truncate mt-0.5">{{ $area->location }}</p>

                        <div class="flex items-center justify-between mt-2 pt-1 border-t border-gray-100 text-xs">
                            <div class="flex items-center gap-1.5 font-semibold {{ $area->available_slots > 0 ? 'text-[#5B4EE6]' : 'text-red-500' }}">
                                <span class="w-2 h-2 rounded-full {{ $area->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                <span>{{ $area->available_slots }} kosong <span class="text-gray-400 font-normal">dari {{ $area->total_slots }} slot</span></span>
                            </div>

                            @if($area->walking_minutes_from_filkom > 0)
                            <span class="text-[11px] text-gray-400">
                                ~{{ $area->walking_minutes_from_filkom }}m jalan
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            <!-- Empty Search State -->
            <div 
                x-show="search !== '' && ![...$el.parentElement.querySelectorAll('a')].some(el => el.style.display !== 'none')" 
                class="py-12 text-center text-gray-400"
            >
                <div class="w-12 h-12 rounded-full bg-purple-50 text-[#5B4EE6] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-600">Area parkir tidak ditemukan</p>
                <p class="text-xs mt-1">Coba kata kunci lain seperti "FILKOM", "EduTech", atau "GOR".</p>
            </div>
        </div>
    </div>
</div>
@endsection
