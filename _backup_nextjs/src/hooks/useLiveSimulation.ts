"use client";
import { useEffect, type Dispatch, type SetStateAction } from "react";
import type { Slot } from "@/types";
/** Simulasi sensor: tiap 3 detik satu slot berganti kosong <-> terisi. */
export function useLiveSimulation(setSlots: Dispatch<SetStateAction<Slot[]>>, on = true) {
  useEffect(() => {
    if (!on) return;
    const t = setInterval(() => setSlots((prev) => {
      const idx = prev.map((_, i) => i).filter((i) => prev[i].status === "available" || prev[i].status === "occupied");
      if (!idx.length) return prev;
      const k = idx[Math.floor(Math.random() * idx.length)];
      return prev.map((s, i) => (i === k ? { ...s, status: s.status === "available" ? "occupied" : "available" } : s));
    }), 3000);
    return () => clearInterval(t);
  }, [setSlots, on]);
}
