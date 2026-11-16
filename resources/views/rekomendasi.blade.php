@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col pb-10">
    <!-- Top Bar Header -->
    <header class="bg-[#C9C2FF] px-5 pt-6 pb-6 relative overflow-hidden shadow-sm">
        <div class="flex items-center gap-3 relative z-10">
            <a href="{{ route('home') }}" class="w-10 h-10 rounded-full bg-white/90 text-[#5B4EE6] flex items-center justify-center shadow-sm hover:bg-white hover:scale-105 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <p class="text-xs uppercase font-bold text-[#5B4EE6] tracking-wider">Parkir Alternatif</p>
                <h1 class="font-heading font-extrabold text-lg text-gray-900 leading-tight">Rekomendasi Area Terdekat</h1>
            </div>
        </div>
    </header>

    <!-- Context Explanation Banner -->
    <div class="mx-5 mt-4 bg-gradient-to-r from-purple-50 to-indigo-50 border border-purple-200 rounded-2xl p-4 shadow-sm">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-full bg-[#5B4EE6] text-[#FAFF00] flex items-center justify-center flex-shrink-0 font-bold text-sm">
                ★
            </div>
            <div>
                <h2 class="font-heading font-bold text-xs text-gray-900">Area Parkir Utama (FILKOM) Penuh?</h2>
                <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                    Berikut pilihan area parkir motor dengan <strong>slot kosong terbanyak</strong> serta estimasi waktu jalan kaki terdekat menuju FILKOM.
                </p>
            </div>
        </div>
    </div>

    <!-- Recommendations List -->
    <div class="px-5 mt-5 space-y-3.5 flex-1">
        @forelse($areas as $index => $area)
        <a 
            href="{{ route('area.show', $area->slug) }}" 
            class="block bg-white rounded-2xl p-4 border border-purple-100 shadow-sm hover:shadow-md hover:border-purple-300 transition group relative overflow-hidden"
        >
            <!-- Rank Badge -->
            <div class="absolute top-0 right-0 bg-[#5B4EE6] text-[#FAFF00] font-heading font-black text-[11px] px-3 py-1 rounded-bl-xl shadow-xs">
                #{{ $index + 1 }} Rekomendasi
            </div>

            <div class="pr-20">
                <h3 class="font-heading font-bold text-sm text-gray-900 group-hover:text-[#5B4EE6] transition">
                    {{ $area->name }}
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">{{ $area->location }}</p>
            </div>

            <div class="grid grid-cols-2 gap-2 mt-3 pt-3 border-t border-gray-100">
                <!-- Slot Availability -->
                <div class="bg-purple-50/80 rounded-xl p-2.5">
                    <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block">Sisa Slot Kosong</span>
                    <span class="text-lg font-heading font-extrabold text-[#5B4EE6]">
                        {{ $area->available_slots }} <span class="text-xs text-gray-500 font-normal">/ {{ $area->total_slots }}</span>
                    </span>
                </div>

                <!-- Distance / Walking estimate -->
                <div class="bg-purple-50/80 rounded-xl p-2.5">
                    <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block">Jarak ke FILKOM</span>
                    <span class="text-xs font-heading font-bold text-gray-800 flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4 text-[#5B4EE6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span>~{{ $area->walking_minutes_from_filkom }} Menit Jalan</span>
                    </span>
                </div>
            </div>

            <div class="mt-3 flex items-center justify-between text-xs font-bold text-[#5B4EE6] group-hover:text-[#7C72F8]">
                <span>Buka Denah & Petunjuk Slot</span>
                <span class="text-base group-hover:translate-x-1 transition">→</span>
            </div>
        </a>
        @empty
        <div class="py-12 text-center text-gray-400">
            <p class="text-sm font-semibold">Seluruh area parkir kampus saat ini penuh.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
