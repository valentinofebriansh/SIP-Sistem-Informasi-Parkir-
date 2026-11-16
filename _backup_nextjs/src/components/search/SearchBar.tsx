"use client";
import { useState, type FormEvent } from "react";
import { useRouter } from "next/navigation";
import { Search } from "lucide-react";
import { Button, Input, Select } from "@/components/ui/ui";
import { GATES } from "@/data/locations";
import { defaultParams, type SearchParams } from "@/lib/filters";

export default function SearchBar({ initial = defaultParams }: { initial?: SearchParams }) {
  const router = useRouter();
  const [p, setP] = useState<SearchParams>(initial);
  const submit = (e: FormEvent) => {
    e.preventDefault();
    const q = new URLSearchParams();
    if (p.q) q.set("q", p.q); q.set("vehicle", p.vehicle); q.set("gate", p.gate); q.set("cond", p.cond);
    if (p.tag) q.set("tag", p.tag);
    router.push(`/cari?${q}`);
  };
  return (
    <form onSubmit={submit} className="grid gap-3 rounded-2xl border border-line bg-white p-3 shadow-card md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr_auto] lg:items-end">
      <div className="relative">
        <Search size={16} className="pointer-events-none absolute bottom-3.5 left-3 text-sub" />
        <Input label="CARI GEDUNG / LOKASI" className="pl-9" placeholder="Cari gedung, lot…" value={p.q} onChange={(e) => setP({ ...p, q: e.target.value })} />
      </div>
      <Select label="KATEGORI MODA" value={p.vehicle} onChange={(e) => setP({ ...p, vehicle: e.target.value as SearchParams["vehicle"] })}>
        <option value="all">Semua Kendaraan</option><option value="motor">Sepeda Motor Mahasiswa</option><option value="mobil">Mobil Dosen/Civitas</option>
      </Select>
      <Select label="AKSES GERBANG" value={p.gate} onChange={(e) => setP({ ...p, gate: e.target.value })}>
        {GATES.map((g) => <option key={g}>{g}</option>)}
      </Select>
      <Select label="KONDISI SLOT" value={p.cond} onChange={(e) => setP({ ...p, cond: e.target.value as SearchParams["cond"] })}>
        <option value="terbanyak">Slot Tersedia Terbanyak</option><option value="terdekat">Jarak Terdekat</option><option value="semua">Semua Kondisi</option>
      </Select>
      <Button type="submit" className="h-11"><Search size={16} />Cek Ketersediaan</Button>
    </form>
  );
}
