import { pctUsed } from "@/lib/status";
import { ProgressBar } from "@/components/ui/ui";
import type { ParkingLocation } from "@/types";
export default function CapacityInfo({ loc }: { loc: ParkingLocation }) {
  return (
    <div>
      <div className="mb-1.5 flex items-baseline justify-between text-xs text-mid">
        <span>Kapasitas slot</span>
        <span className="num font-semibold text-ink">{loc.free} Kosong / {loc.total} Total</span>
      </div>
      <ProgressBar pct={pctUsed(loc)} />
    </div>
  );
}
