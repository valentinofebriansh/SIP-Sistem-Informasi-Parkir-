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
            <div class="flex-1 min-w-0">
                <p class="text-xs uppercase font-bold text-[#5B4EE6] tracking-wider">Denah Parkir Motor</p>
                <h1 class="font-heading font-extrabold text-lg text-gray-900 truncate leading-tight">{{ $area->name }}</h1>
            </div>
        </div>
    </header>

    <!-- Alert Banner when Area is FULL (0 Available) -->
    @if($area->available_slots === 0)
    <div class="mx-5 mt-4 bg-gradient-to-r from-red-50 to-orange-50 border border-red-200 rounded-2xl p-4 shadow-sm flex items-start gap-3">
        <div class="w-9 h-9 rounded-xl bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <div class="flex-1">
            <h3 class="font-heading font-bold text-sm text-red-800">Area Ini Sedang Penuh!</h3>
            <p class="text-xs text-red-600 mt-0.5">Semua slot sepeda motor saat ini sudah terisi.</p>
            <a href="{{ route('rekomendasi') }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#5B4EE6] hover:text-[#7C72F8] mt-2 underline">
                <span>Lihat rekomendasi parkir alternatif terdekat</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
    @endif

    <!-- Area Summary Card -->
    <div class="mx-5 mt-4 bg-white rounded-2xl border border-purple-100 shadow-sm p-4">
        <div class="flex items-center justify-between">
            <div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $area->available_slots > 0 ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                    {{ $area->available_slots > 0 ? '● Tersedia' : '● Penuh' }}
                </span>
                <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $area->location }}</span>
                </p>
            </div>
            <div class="text-right">
                <p class="text-2xl font-heading font-black {{ $area->available_slots > 0 ? 'text-[#5B4EE6]' : 'text-red-600' }}">
                    {{ $area->available_slots }}
                </p>
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Kosong / {{ $area->total_slots }} Slot</p>
            </div>
        </div>
    </div>

    <!-- 2D Visual Grid Section with Alpine.js Sub-Section Selector -->
    <div x-data="{ activeSection: '{{ $area->subSections->first()->slug ?? '' }}' }" class="px-5 mt-5">
        <!-- Sub-section selector -->
        <div class="mb-3">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                Pilih Sub-Bagian Area:
            </label>
            <div class="relative">
                <select 
                    x-model="activeSection" 
                    class="w-full bg-white border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-gray-800 shadow-sm focus:ring-2 focus:ring-[#5B4EE6] focus:border-[#5B4EE6] transition appearance-none"
                >
                    @foreach($area->subSections as $subSection)
                    <option value="{{ $subSection->slug }}">
                        {{ $subSection->name }} — {{ $subSection->available_slots }} kosong dari {{ $subSection->total_slots }} slot
                    </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- 2D Grid Visualizer for each Sub-Section -->
        @foreach($area->subSections as $subSection)
        <div x-show="activeSection === '{{ $subSection->slug }}'" x-transition class="bg-gray-50 rounded-2xl p-4 border border-gray-200 shadow-inner">
            <div class="flex items-center justify-between mb-3 border-b border-gray-200 pb-2">
                <div>
                    <h3 class="font-heading font-bold text-sm text-gray-900">{{ $subSection->name }}</h3>
                    <p class="text-[11px] text-gray-500">Denah visual slot motor</p>
                </div>
                <span class="text-xs font-bold px-2.5 py-1 rounded-lg {{ $subSection->available_slots > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $subSection->available_slots }} Kosong
                </span>
            </div>

            <!-- Entrance Marker -->
            <div class="flex justify-center mb-3">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-yellow-100 border border-yellow-300 rounded-full text-[10px] font-bold text-yellow-800 uppercase tracking-wider">
                    <svg class="w-3 h-3 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    <span>JALUR MASUK SEPEDA MOTOR</span>
                </div>
            </div>

            <!-- Grouped by Row -->
            @php
                $grouped = $subSection->slots->groupBy('row_label');
            @endphp

            <div class="space-y-2.5">
                @foreach($grouped as $rowLabel => $slots)
                <div class="flex items-center gap-2">
                    <!-- Row Label -->
                    <div class="w-7 h-8 rounded-lg bg-purple-100 text-[#5B4EE6] font-heading font-bold text-xs flex items-center justify-center flex-shrink-0">
                        {{ $rowLabel }}
                    </div>

                    <!-- Slots in Row -->
                    <div class="flex-1 flex gap-1.5 flex-wrap">
                        @foreach($slots->sortBy('row_number') as $slot)
                        <div 
                            class="w-8 h-8 rounded-lg flex items-center justify-center text-[10px] font-heading font-extrabold transition transform hover:scale-105 select-none
                            {{ $slot->is_occupied 
                                ? 'bg-[#7C72F8] border border-[#5B4EE6] text-white shadow-sm' 
                                : 'bg-white border-2 border-[#5B4EE6] text-[#5B4EE6] shadow-sm animate-pulse' }}"
                            title="Slot {{ $slot->code }} — {{ $slot->is_occupied ? 'Terisi' : 'Kosong (Tersedia)' }}"
                        >
                            {{ $slot->row_number }}
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Legend -->
            <div class="mt-4 pt-3 border-t border-gray-200 flex items-center justify-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-md bg-white border-2 border-[#5B4EE6] flex items-center justify-center text-[10px] font-bold text-[#5B4EE6]">1</div>
                    <span class="text-xs font-semibold text-gray-700">Kosong (Tersedia)</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-md bg-[#7C72F8] border border-[#5B4EE6] flex items-center justify-center text-[10px] font-bold text-white">1</div>
                    <span class="text-xs font-semibold text-gray-700">Terisi</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Comments & Reviews Section (Could Have) -->
    <section class="px-5 mt-6">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-heading font-bold text-sm text-gray-900 flex items-center gap-1.5">
                <span>💬</span>
                <span>Catatan Kondisi dari Mahasiswa</span>
            </h3>
            <span class="text-xs text-gray-400 font-medium">{{ count($area->comments) }} Catatan</span>
        </div>

        <!-- Add Comment Form (Guest-Friendly) -->
        <div class="bg-purple-50/70 border border-purple-100 rounded-2xl p-4 mb-4">
            <p class="text-xs font-semibold text-gray-700 mb-2">Bantu temanmu, bagikan kondisi parkir terkini:</p>
            <form method="POST" action="{{ route('comment.store', $area->slug) }}" class="space-y-2.5">
                @csrf
                <div>
                    <input 
                        type="text" 
                        name="author_name" 
                        placeholder="Nama kamu (misal: Rian FILKOM)" 
                        value="{{ Auth::check() ? Auth::user()->name : old('author_name') }}"
                        required
                        class="w-full bg-white text-xs px-3 py-2 rounded-xl border border-purple-200 focus:ring-2 focus:ring-[#5B4EE6] focus:border-[#5B4EE6]"
                    >
                </div>
                <div>
                    <textarea 
                        name="body" 
                        rows="2" 
                        placeholder="Kondisi parkir saat ini (misal: masih banyak slot kosong di sisi timur)..." 
                        required
                        class="w-full bg-white text-xs px-3 py-2 rounded-xl border border-purple-200 focus:ring-2 focus:ring-[#5B4EE6] focus:border-[#5B4EE6]"
                    >{{ old('body') }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#5B4EE6] hover:bg-[#7C72F8] text-white text-xs font-bold px-4 py-2 rounded-xl shadow transition flex items-center gap-1">
                        <span>Kirim Catatan</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Comments Feed -->
        <div class="space-y-2.5">
            @forelse($area->comments->sortByDesc('created_at') as $comment)
            <div class="bg-white rounded-xl p-3 border border-gray-100 shadow-xs">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-1.5">
                        <span class="w-5 h-5 rounded-full bg-purple-100 text-[#5B4EE6] text-[10px] font-bold flex items-center justify-center">
                            {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                        </span>
                        <span class="text-xs font-bold text-gray-800">{{ $comment->author_name }}</span>
                    </div>
                    <span class="text-[10px] text-gray-400">
                        {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'baru saja' }}
                    </span>
                </div>
                <p class="text-xs text-gray-600 pl-6">{{ $comment->body }}</p>
            </div>
            @empty
            <p class="text-center text-xs text-gray-400 py-3">Belum ada catatan untuk area ini.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
