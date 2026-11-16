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
                <p class="text-xs uppercase font-bold text-[#5B4EE6] tracking-wider">Peta Skematik</p>
                <h1 class="font-heading font-extrabold text-lg text-gray-900 leading-tight">Titik Parkir Kampus UB</h1>
            </div>
        </div>
    </header>

    <div class="px-5 mt-4">
        <!-- Campus Schematic Canvas -->
        <div class="bg-gradient-to-b from-purple-50/60 to-indigo-50/40 rounded-3xl p-4 border border-purple-200/80 shadow-inner relative">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-[#5B4EE6]"></span>
                    <span>Tata Letak Zona Kampus UB</span>
                </span>
                <span class="text-[10px] bg-white px-2 py-0.5 rounded-full text-purple-700 font-semibold border border-purple-100">
                    Tap titik untuk buka denah
                </span>
            </div>

            <!-- Gate Indicators -->
            <div class="flex justify-between text-[10px] font-bold text-gray-400 px-2 mb-2">
                <span class="bg-white/80 px-2 py-0.5 rounded-md border border-gray-200">Gerbang MT Haryono</span>
                <span class="bg-white/80 px-2 py-0.5 rounded-md border border-gray-200">Gerbang Veteran</span>
            </div>

            <!-- Schematic Interactive Grid -->
            <div class="relative w-full rounded-2xl bg-white/90 backdrop-blur-xs border border-purple-100 p-3 shadow-xs space-y-3">
                <!-- Zone FILKOM & Edutech (Utara / Dekat Panjaitan) -->
                <div>
                    <span class="text-[10px] font-black text-[#5B4EE6] uppercase tracking-wider block mb-1.5">
                        ZONA FILKOM & VOKASI
                    </span>
                    <div class="grid grid-cols-2 gap-2">
                        @php
                            $filkom = $areas->firstWhere('slug', 'filkom');
                            $edutech = $areas->firstWhere('slug', 'edutech');
                        @endphp
                        @if($filkom)
                        <a href="{{ route('area.show', $filkom->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $filkom->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">Parkir FILKOM</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $filkom->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Gedung A</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $filkom->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $filkom->available_slots > 0 ? $filkom->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif

                        @if($edutech)
                        <a href="{{ route('area.show', $edutech->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $edutech->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">Parkir EduTech</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $edutech->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Taman EduTech</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $edutech->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $edutech->available_slots > 0 ? $edutech->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Road connecting schematic -->
                <div class="flex items-center justify-center my-1">
                    <div class="h-0.5 w-full bg-purple-100 flex items-center justify-center">
                        <span class="bg-purple-100 px-3 py-0.5 rounded-full text-[9px] font-bold text-purple-600 uppercase tracking-widest">
                            Jalan Lingkar Dalam Kampus
                        </span>
                    </div>
                </div>

                <!-- Zone Kantin CL & GOR Pertamina -->
                <div>
                    <span class="text-[10px] font-black text-[#5B4EE6] uppercase tracking-wider block mb-1.5">
                        ZONA KANTIN CL & FASILITAS OLAHRAGA
                    </span>
                    <div class="grid grid-cols-2 gap-2">
                        @php
                            $cl = $areas->firstWhere('slug', 'kantin-cl');
                            $gor = $areas->firstWhere('slug', 'gor-pertamina');
                        @endphp
                        @if($cl)
                        <a href="{{ route('area.show', $cl->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $cl->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">Kantin CL</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $cl->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Creative Land</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $cl->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $cl->available_slots > 0 ? $cl->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif

                        @if($gor)
                        <a href="{{ route('area.show', $gor->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $gor->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">GOR Pertamina</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $gor->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Depan GOR</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $gor->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $gor->available_slots > 0 ? $gor->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Road connecting schematic -->
                <div class="flex items-center justify-center my-1">
                    <div class="h-0.5 w-full bg-purple-100 flex items-center justify-center">
                        <span class="bg-purple-100 px-3 py-0.5 rounded-full text-[9px] font-bold text-purple-600 uppercase tracking-widest">
                            Jalan Penghubung FTP - PLD
                        </span>
                    </div>
                </div>

                <!-- Zone FTP & PLD -->
                <div>
                    <span class="text-[10px] font-black text-[#5B4EE6] uppercase tracking-wider block mb-1.5">
                        ZONA TEKNOLOGI PERTANIAN & LAYANAN DISABILITAS
                    </span>
                    <div class="grid grid-cols-2 gap-2">
                        @php
                            $ftp = $areas->firstWhere('slug', 'ftp');
                            $pld = $areas->firstWhere('slug', 'pld');
                        @endphp
                        @if($ftp)
                        <a href="{{ route('area.show', $ftp->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $ftp->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">Parkir FTP</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $ftp->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Gedung D & E</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $ftp->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $ftp->available_slots > 0 ? $ftp->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif

                        @if($pld)
                        <a href="{{ route('area.show', $pld->slug) }}" class="block p-2.5 rounded-xl border-2 {{ $pld->available_slots > 0 ? 'border-green-300 bg-green-50/40 hover:bg-green-50' : 'border-red-300 bg-red-50/50 hover:bg-red-50' }} transition">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-900 leading-tight">Parkir PLD</span>
                                <span class="w-2.5 h-2.5 rounded-full {{ $pld->available_slots > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-0.5">Gedung PLD</p>
                            <p class="text-[11px] font-black mt-1.5 {{ $pld->available_slots > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $pld->available_slots > 0 ? $pld->available_slots . ' Kosong' : 'Penuh (0)' }}
                            </p>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom Gate Indicator -->
            <div class="flex justify-center mt-2">
                <span class="bg-white/80 px-3 py-0.5 rounded-md border border-gray-200 text-[10px] font-bold text-gray-400">
                    Gerbang Panjaitan (Arah Soekarno Hatta)
                </span>
            </div>
        </div>

        <!-- Legend -->
        <div class="mt-4 flex items-center justify-around bg-white p-3 rounded-2xl border border-gray-100 shadow-xs">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-green-500 ring-4 ring-green-100"></span>
                <span class="text-xs font-semibold text-gray-700">Tersedia Slot</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-red-500 ring-4 ring-red-100"></span>
                <span class="text-xs font-semibold text-gray-700">Penuh</span>
            </div>
        </div>
    </div>
</div>
@endsection
