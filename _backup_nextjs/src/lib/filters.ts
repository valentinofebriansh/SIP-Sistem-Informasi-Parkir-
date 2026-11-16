import type { ParkingLocation, Vehicle } from "@/types";
export interface SearchParams { q: string; vehicle: Vehicle | "all"; gate: string; cond: "terbanyak" | "terdekat" | "semua"; tag: string }
export const defaultParams: SearchParams = { q: "", vehicle: "all", gate: "Semua Gerbang", cond: "terbanyak", tag: "" };

export function filterLocations(list: ParkingLocation[], p: SearchParams) {
  const q = p.q.trim().toLowerCase();
  const res = list.filter((l) =>
    (!q || `${l.name} ${l.zone} ${l.gate} ${l.tags.join(" ")}`.toLowerCase().includes(q)) &&
    (p.vehicle === "all" || l.vehicles.includes(p.vehicle)) &&
    (p.gate === "Semua Gerbang" || l.gate === p.gate) &&
    (!p.tag || l.tags.includes(p.tag))
  );
  if (p.cond === "terbanyak") res.sort((a, b) => b.free - a.free);
  if (p.cond === "terdekat") res.sort((a, b) => a.distance - b.distance);
  return res;
}
