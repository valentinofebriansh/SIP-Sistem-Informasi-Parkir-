import type { ParkingLocation } from "@/types";

export const GATES = ["Semua Gerbang", "Veteran", "Panjaitan", "MT Haryono"];

export const locations: ParkingLocation[] = [
  { id: "gedung-bersama", name: "Gedung Parkir Bersama UB", zone: "Gedung Parkir 6 Lantai (Zona Utama Kampus)", gate: "Veteran", distance: 120,
    vehicles: ["motor", "mobil"], total: 200, free: 142, floors: 6, tags: ["Dekat Gedung Kuliah"],
    hue: "from-slate-900 to-teal-800", desc: "Gedung parkir utama dengan zona EV charging dan lift menuju gedung kuliah.", hours: "05.00 – 22.00" },
  { id: "filkom-vokasi", name: "Parkir FILKOM & Vokasi", zone: "Area Terpadu Gedung G & Vokasi UB", gate: "Panjaitan", distance: 200,
    vehicles: ["motor", "mobil"], total: 50, free: 18, floors: 2, tags: ["Dekat Gedung Kuliah"],
    hue: "from-slate-900 to-emerald-900", desc: "Parkir terpadu di sekitar Fakultas Ilmu Komputer dan Vokasi.", hours: "05.00 – 21.00" },
  { id: "samantha-krida", name: "Parkir Samantha Krida", zone: "Lapangan Terbuka Gedung Serbaguna", gate: "MT Haryono", distance: 450,
    vehicles: ["motor", "mobil"], total: 120, free: 4, floors: 1, tags: ["Lapangan Terbuka"],
    hue: "from-zinc-800 to-amber-800", desc: "Lapangan parkir terbuka, sering penuh saat ada acara kampus.", hours: "24 jam" },
  { id: "rektorat", name: "Parkir Belakang Rektorat", zone: "Area Khusus Tamu & Biro Rektorat", gate: "Veteran", distance: 300,
    vehicles: ["mobil"], total: 60, free: 0, floors: 1, tags: ["Khusus Tamu/VIP"],
    hue: "from-slate-800 to-rose-900", desc: "Khusus tamu dan pimpinan universitas.", hours: "06.00 – 18.00" },
  { id: "fisip-hukum", name: "Parkir FISIP & Hukum", zone: "Basement Gedung Fakultas", gate: "MT Haryono", distance: 260,
    vehicles: ["motor"], total: 150, free: 64, floors: 2, tags: ["Dekat Gedung Kuliah"],
    hue: "from-indigo-900 to-slate-800", desc: "Parkir motor mahasiswa di basement dekat ruang kuliah.", hours: "05.00 – 21.00" },
  { id: "gor-terbuka", name: "Parkir Lapangan GOR", zone: "Lapangan Terbuka Sebelah GOR", gate: "Panjaitan", distance: 520,
    vehicles: ["motor", "mobil"], total: 100, free: 40, floors: 1, tags: ["Lapangan Terbuka"],
    hue: "from-sky-900 to-slate-800", desc: "Lapangan terbuka luas, cocok untuk jam kuliah siang.", hours: "24 jam" },
];

export const getLocation = (id: string) => locations.find((l) => l.id === id);
