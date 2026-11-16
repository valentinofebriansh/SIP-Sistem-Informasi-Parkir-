import type { Slot, SlotStatus } from "@/types";

function hash(s: string) { let h = 2166136261; for (const c of s) { h ^= c.charCodeAt(0); h = Math.imul(h, 16777619); } return h >>> 0; }
function rng(seed: number) { return () => { seed = (Math.imul(seed, 1664525) + 1013904223) >>> 0; return seed / 4294967296; }; }

/** Slot acak tapi tetap (seeded) per lokasi + lantai. Baris A/B = 9 slot reguler, baris C = 6 slot EV. */
export function genSlots(locId: string, floor: number, full = false): Slot[] {
  const r = rng(hash(locId + floor));
  const out: Slot[] = [];
  (["A", "B", "C"] as const).forEach((row) => {
    const n = row === "C" ? 6 : 9;
    for (let i = 1; i <= n; i++) {
      const x = r();
      const ev = row === "C";
      let status: SlotStatus = ev ? (x < 0.5 ? "available" : x < 0.7 ? "charging" : "occupied") : (x < 0.4 ? "available" : "occupied");
      out.push({ id: `${row}-${String(i).padStart(2, "0")}`, row, floor, type: ev ? "ev" : "regular", status });
    }
  });
  return out;
}
