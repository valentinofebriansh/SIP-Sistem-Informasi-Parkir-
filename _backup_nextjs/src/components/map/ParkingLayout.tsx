"use client";
import { useEffect, useState } from "react";
import { ArrowDownToLine, ArrowUpFromLine } from "lucide-react";
import { Card, Tabs } from "@/components/ui/ui";
import SlotRow from "./SlotRow";
import AisleDivider from "./AisleDivider";
import SelectedSlotBar from "./SelectedSlotBar";
import StatusLegend from "@/components/parking/StatusLegend";
import { useApp } from "@/context/AppContext";
import { useLiveSimulation } from "@/hooks/useLiveSimulation";
import { genSlots } from "@/data/slots";
import { getLocation } from "@/data/locations";
import type { Slot } from "@/types";

export default function ParkingLayout({ locationId }: { locationId: string }) {
  const loc = getLocation(locationId)!;
  const maxFloor = Math.min(loc.floors, 4);
  const [floor, setFloor] = useState(Math.min(2, maxFloor));
  const full = loc.free === 0;
  const [slots, setSlots] = useState<Slot[]>(() => genSlots(locationId, floor, full));
  useEffect(() => setSlots(genSlots(locationId, floor, full)), [locationId, floor, full]);
  useLiveSimulation(setSlots, !full);
  const { selected, select, } = useApp();

  const view = slots.map((s): Slot =>
  selected?.locationId === locationId && selected.floor === floor &&
  selected.slotId === s.id && s.status === "available"
    ? { ...s, status: "selected" }
    : s
);

  const onSelect = (s: Slot) => select(s.status === "selected" ? null : { locationId, floor, slotId: s.id });
  const row = (r: Slot["row"]) => view.filter((s) => s.row === r);
  const freeCount = view.filter((s) => s.status === "available" || s.status === "selected").length;

  return (
    <Card className="p-4 md:p-6">
      <div className="flex flex-wrap items-start justify-between gap-3">
        <div>
          <p className="num inline-flex items-center gap-1.5 rounded bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-primary"><span className="dot-pulse size-1.5 rounded-full bg-secondary" />SENSOR REAL-TIME UB</p>
          <p className="num mt-1 text-[11px] text-sub">Update telemetri tiap 3 detik (simulasi)</p>
          <h2 className="mt-2 text-xl font-bold tracking-tight">Denah Blok Parkir: {loc.name}</h2>
          <p className="text-xs text-sub">Lantai {floor} · Akses utama dari Gerbang {loc.gate}</p>
        </div>
        {maxFloor > 1 && <Tabs value={floor} onChange={setFloor} items={Array.from({ length: maxFloor }, (_, i) => ({ value: i + 1, label: `Lt ${i + 1}${i + 1 === floor ? " (Aktif)" : ""}` }))} />}
      </div>
      <div className="mt-4 flex flex-wrap items-center justify-between gap-2 rounded-lg border border-line bg-canvas px-3 py-2">
        <StatusLegend />
        <span className="num text-[11px] font-semibold text-emerald-700">{freeCount} slot kosong di lantai ini</span>
      </div>

      <div className="mt-4 rounded-xl border border-line bg-well p-3 md:p-4">
        <div className="num mb-4 flex items-center gap-2 rounded-md border border-slate-300 bg-white px-3 py-2 text-[10px] text-mid"><ArrowDownToLine size={12} />RAMP MASUK LANTAI {floor} (ARAH GERBANG {loc.gate.toUpperCase()})<span className="ml-auto hidden sm:inline">MAKS. 10 KM/JAM</span></div>
        <SlotRow title="BARIS A · SLOT REGULER MOBIL CIVITAS" hint="Ukuran 2,5 m × 5,0 m" slots={row("A")} onSelect={onSelect} />
        <AisleDivider text="LORONG TENGAH AISLE 02 · JALUR DUA ARAH" extra="Sensor ultrasonik aktif" />
        <SlotRow title="BARIS B · LOKASI PILIHAN TERDEKAT DARI LOBI/LIFT" hint="Dekat pintu lift barat" slots={row("B")} onSelect={onSelect} />
        <div className="h-4" />
        <SlotRow title="BARIS C · ZONA KHUSUS EV FAST CHARGING (60 kW DC)" hint="Kabel tipe 2 & CCS2" slots={row("C")} onSelect={onSelect} />
        <div className="num mt-4 flex items-center gap-2 rounded-md border border-slate-300 bg-white px-3 py-2 text-[10px] text-mid"><ArrowUpFromLine size={12} />RAMP TURUN MENUJU GERBANG<span className="ml-auto hidden sm:inline">PALANG RFID OTOMATIS KTM UB</span></div>
      </div>
      <div className="mt-4"><SelectedSlotBar locationId={locationId} /></div>
    </Card>
  );
}
