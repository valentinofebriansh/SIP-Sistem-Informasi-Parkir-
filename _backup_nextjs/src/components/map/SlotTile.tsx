import { Car, Zap, Check } from "lucide-react";
import { cn } from "@/lib/utils";
import type { Slot } from "@/types";
const label: Record<Slot["status"], string> = { available: "BUKA", occupied: "TERISI", selected: "DIPILIH", charging: "MENGISI DAYA" };
export default function SlotTile({ slot, onSelect }: { slot: Slot; onSelect: () => void }) {
  const { status, type } = slot;
  const clickable = status === "available" || status === "selected";
  const Icon = status === "selected" ? Check : type === "ev" ? Zap : Car;
  const text = type === "ev" && status === "available" ? "TERSEDIA" : label[status];
  return (
    <button type="button" disabled={!clickable} onClick={onSelect} aria-label={`Slot ${slot.id}, ${text}`}
      className={cn("num flex h-16 flex-col items-center justify-center gap-0.5 rounded-md border text-center transition",
        status === "available" && "border-[1.5px] border-secondary bg-white text-ink hover:shadow-hover",
        status === "occupied" && "border-slate-300 bg-well text-slate-400",
        status === "selected" && "border-primary bg-primary text-white shadow-hover",
        status === "charging" && "border-slate-300 bg-well text-sub")}>
      <Icon size={14} className={cn(status === "available" && "text-secondary")} />
      <span className="text-[11px] font-semibold">{slot.id}</span>
      <span className={cn("text-[8px] font-bold", status === "available" && "text-emerald-600")}>{text}</span>
    </button>
  );
}
