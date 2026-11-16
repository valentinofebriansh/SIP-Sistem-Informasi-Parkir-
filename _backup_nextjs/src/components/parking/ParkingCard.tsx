import Link from "next/link";
import { Car, Bike, Warehouse } from "lucide-react";
import { Badge, Card } from "@/components/ui/ui";
import { locStatus } from "@/lib/status";
import type { ParkingLocation } from "@/types";

export default function ParkingCard({ loc }: { loc: ParkingLocation }) {
  const st = locStatus(loc);
  const badge = st === "open" ? <Badge tone="green" className="font-semibold">Tersedia {loc.free} Slot</Badge>
    : st === "almost" ? <Badge tone="amber" className="font-semibold">Sisa {loc.free} Slot (Hampir Penuh)</Badge>
    : <Badge tone="red" className="font-semibold">Penuh (0 Slot)</Badge>;
  return (
    <Link href={`/lokasi/${loc.id}`} className="group block h-full">
      <Card className="flex h-full flex-col overflow-hidden transition group-hover:border-primary group-hover:shadow-hover">
        <div className={`relative flex h-36 items-end bg-linear-to-br ${loc.hue} p-3`}>
          <Warehouse className="absolute right-4 top-4 text-white/25" size={56} />
          {badge}
        </div>
        <div className="flex flex-1 flex-col p-4">
          <p className="num text-[11px] text-sub">Gerbang {loc.gate} · {loc.distance} m</p>
          <h3 className="mt-1 font-semibold text-ink">{loc.name}</h3>
          <p className="text-xs text-sub">{loc.zone}</p>
          <div className="mt-3 flex gap-2 text-sub">
            {loc.vehicles.includes("motor") && <Bike size={16} aria-label="Motor" />}
            {loc.vehicles.includes("mobil") && <Car size={16} aria-label="Mobil" />}
          </div>
          <div className="mt-auto flex justify-end pt-4">
            <span className="rounded-lg bg-well px-3 py-1.5 text-xs font-medium text-mid">{st === "full" ? "Area Penuh" : "Lihat Lokasi"}</span>
          </div>
        </div>
      </Card>
    </Link>
  );
}
