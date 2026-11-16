import { DoorOpen, Footprints } from "lucide-react";
import { Button, Card } from "@/components/ui/ui";
import CapacityInfo from "./CapacityInfo";
import { cn } from "@/lib/utils";
import type { ParkingLocation } from "@/types";


export default function ParkingListItem({ loc, active, onSelect }: { loc: ParkingLocation; active?: boolean; onSelect: () => void }) {
  return (
    <Card className={cn("p-4", active && "border-primary shadow-hover")}>
      <div className="flex items-start justify-between gap-2">
        <div>
          {active && <p className="num mb-1 flex items-center gap-1.5 text-[11px] text-primary"><span className="size-1.5 rounded-full bg-primary" />Denah aktif di samping</p>}
          <h3 className="font-semibold">{loc.name}</h3>
          <p className="text-xs text-sub">{loc.zone}</p>
        </div>
      </div>
      <div className="my-3 flex flex-wrap gap-2 text-[11px] text-mid">
        <span className="flex items-center gap-1 rounded-md border border-line px-2 py-1"><DoorOpen size={12} />Gerbang {loc.gate}</span>
        <span className="flex items-center gap-1 rounded-md border border-line px-2 py-1"><Footprints size={12} />{Math.round(loc.distance / 60)} mnt ke kuliah</span>
      </div>
      <CapacityInfo loc={loc} />
      <div className="mt-3 flex justify-end">
        <Button variant={active ? "primary" : "secondary"} className="px-3 py-1.5 text-xs" onClick={onSelect}>{active ? "Denah ditampilkan" : "Lihat Denah Blok"}</Button>
      </div>
    </Card>
  );
}
