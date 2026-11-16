import Link from "next/link";
import { Card, Badge, Button } from "@/components/ui/ui";
import CapacityInfo from "@/components/parking/CapacityInfo";
import { genSlots } from "@/data/slots";
import type { ParkingLocation } from "@/types";

export default function RecommendedSlotCard({ loc, score, rank }: { loc: ParkingLocation; score: number; rank: number }) {
  const slot = genSlots(loc.id, 1).find((s) => s.status === "available" && s.type === "regular");
  return (
    <Card className="flex flex-col gap-4 p-5 md:flex-row md:items-center">
      <div className="num grid size-14 shrink-0 place-items-center rounded-xl bg-primary text-xl font-bold text-white">{rank}</div>
      <div className="min-w-0 flex-1 space-y-3">
        <div className="flex flex-wrap items-center gap-2">
          <Link href={`/lokasi/${loc.id}`} className="font-semibold hover:text-primary">{loc.name}</Link>
          <Badge tone="green">Skor {score}</Badge>
          {slot && <Badge tone="blue">Saran slot: {slot.id} (Lt 1)</Badge>}
        </div>
        <p className="text-xs text-sub">Gerbang {loc.gate} · {loc.distance} m · {loc.tags.join(", ")}</p>
        <CapacityInfo loc={loc} />
      </div>
      <Button href={`/lokasi/${loc.id}/denah`} variant="outline">Lihat denah</Button>
    </Card>
  );
}
