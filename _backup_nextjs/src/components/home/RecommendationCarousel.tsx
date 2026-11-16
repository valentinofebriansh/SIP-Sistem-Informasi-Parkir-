"use client";
import { useRef } from "react";
import { ChevronLeft, ChevronRight } from "lucide-react";
import ParkingCard from "@/components/parking/ParkingCard";
import { locations } from "@/data/locations";
import { defaultPrefs, recommend } from "@/lib/recommend";

export default function RecommendationCarousel() {
  const ref = useRef<HTMLDivElement>(null);
  const ranked = recommend(locations, defaultPrefs).map((r) => r.loc);
  const list = [...ranked.slice(0, 3), ...locations.filter((l) => l.free === 0)];
  const scroll = (d: number) => ref.current?.scrollBy({ left: d * 300, behavior: "smooth" });
  return (
    <section className="mt-12">
      <div className="mb-4 flex items-end justify-between">
        <div><p className="text-xs text-sub">Rekomendasi terbaik</p><h2 className="text-2xl font-bold tracking-tight">Lokasi parkir pilihan di sekitarmu</h2></div>
        <div className="flex gap-2">
          <button aria-label="Geser kiri" onClick={() => scroll(-1)} className="grid size-9 place-items-center rounded-full border border-line bg-white hover:bg-well"><ChevronLeft size={16} /></button>
          <button aria-label="Geser kanan" onClick={() => scroll(1)} className="grid size-9 place-items-center rounded-full border border-line bg-white hover:bg-well"><ChevronRight size={16} /></button>
        </div>
      </div>
      <div ref={ref} className="flex snap-x gap-4 overflow-x-auto pb-2">
        {list.map((l) => <div key={l.id} className="w-72 shrink-0 snap-start"><ParkingCard loc={l} /></div>)}
      </div>
    </section>
  );
}
