import type { ParkingLocation, Vehicle } from "@/types";
export interface Prefs { vehicle: Vehicle | "all"; priority: "dekat" | "kosong" | "kuliah"; gate: string }
export const defaultPrefs: Prefs = { vehicle: "all", priority: "kosong", gate: "Semua Gerbang" };

/** Skor sederhana: rasio slot kosong + kedekatan + bonus sesuai prioritas & gerbang. */
export function recommend(list: ParkingLocation[], p: Prefs) {
  return list
    .filter((l) => l.free > 0 && (p.vehicle === "all" || l.vehicles.includes(p.vehicle)))
    .map((loc) => {
      const ratio = loc.free / loc.total;
      const near = 1 - Math.min(loc.distance, 600) / 600;
      let s = ratio * 40 + near * 40;
      if (p.priority === "dekat") s += near * 30;
      if (p.priority === "kosong") s += ratio * 30;
      if (p.priority === "kuliah" && loc.tags.includes("Dekat Gedung Kuliah")) s += 30;
      if (p.gate !== "Semua Gerbang" && loc.gate === p.gate) s += 15;
      return { loc, score: Math.min(100, Math.round(s)) };
    })
    .sort((a, b) => b.score - a.score);
}
