import type { ParkingLocation } from "@/types";
export const pctUsed = (l: Pick<ParkingLocation, "free" | "total">) => Math.round((1 - l.free / l.total) * 100);
export const locStatus = (l: ParkingLocation): "open" | "almost" | "full" => (l.free === 0 ? "full" : pctUsed(l) >= 80 ? "almost" : "open");
/** <80% hijau, 80–94% kuning, 95%+ merah */
export const gaugeColor = (pct: number) => (pct < 80 ? "bg-secondary" : pct < 95 ? "bg-amber-500" : "bg-red-500");
