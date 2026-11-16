"use client";
import { Navigation } from "lucide-react";
import { useApp } from "@/context/AppContext";
import { Badge, Button } from "@/components/ui/ui";
import { getLocation } from "@/data/locations";

export default function SelectedSlotBar({ locationId }: { locationId: string }) {
  const { selected, select } = useApp();
  const loc = getLocation(locationId)!;
  const sel = selected && selected.locationId === locationId ? selected : null;
  if (!sel) return (
    <div className="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-sm text-sub" aria-live="polite">
      Pilih slot hijau di denah untuk melihat detail slot.
    </div>
  );
  return (
    <div className="flex flex-col gap-4 rounded-xl border border-primary bg-white p-4 shadow-hover md:flex-row md:items-center md:justify-between" aria-live="polite">
      <div className="flex items-center gap-4">
        <span className="num grid h-12 min-w-14 place-items-center rounded-lg bg-primary px-2 text-lg font-bold text-white">{sel.slotId}</span>
        <div>
          <p className="font-semibold">Blok {sel.slotId} <Badge tone="green" className="ml-1">Tersedia</Badge></p>
          <p className="text-xs text-sub">{loc.name} · Lantai {sel.floor} · Gerbang {loc.gate}</p>
        </div>
      </div>
      <div className="flex items-center gap-2">
        <Button variant="secondary" onClick={() => window.open(`https://www.google.com/maps/search/${encodeURIComponent(loc.name + " Universitas Brawijaya")}`, "_blank")}><Navigation size={14} />Petunjuk Arah</Button>
        <button className="text-xs text-sub underline" onClick={() => select(null)}>Batal</button>
      </div>
    </div>
  );
}