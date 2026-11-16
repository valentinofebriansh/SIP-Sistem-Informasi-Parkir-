"use client";
import { useState } from "react";
import ParkingListItem from "@/components/parking/ParkingListItem";
import ParkingLayout from "@/components/map/ParkingLayout";
import CampusMap from "@/components/map/CampusMap";
import { Badge, Card } from "@/components/ui/ui";
import { locations } from "@/data/locations";

export default function HomeArea() {
  const [active, setActive] = useState("gedung-bersama");
  const usable = locations.filter((l) => l.free > 0).slice(0, 4);
  return (
    <section className="mt-12 grid gap-6 lg:grid-cols-[minmax(0,1fr)_minmax(0,2fr)]">
      <div className="space-y-4">
        <div className="flex items-end justify-between"><div><p className="text-xs text-sub">Area parkir kampus</p><h2 className="text-2xl font-bold tracking-tight">Fasilitas Parkir UB</h2></div><Badge tone="green">Gratis Civitas UB</Badge></div>
        {usable.map((l) => <ParkingListItem key={l.id} loc={l} active={l.id === active} onSelect={() => setActive(l.id)} />)}
        <Card className="p-4"><p className="mb-3 text-sm font-semibold">Peta navigasi kampus</p><CampusMap /></Card>
      </div>
      <ParkingLayout key={active} locationId={active} />
    </section>
  );
}
