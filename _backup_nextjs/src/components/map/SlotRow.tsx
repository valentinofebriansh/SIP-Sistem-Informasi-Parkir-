import SlotTile from "./SlotTile";
import { cn } from "@/lib/utils";
import type { Slot } from "@/types";
export default function SlotRow({ title, hint, slots, onSelect }: { title: string; hint?: string; slots: Slot[]; onSelect: (s: Slot) => void }) {
  return (
    <section>
      <div className="mb-2 flex items-center justify-between"><h4 className="num text-[11px] font-semibold text-primary">{title}</h4>{hint && <span className="num text-[10px] text-sub">{hint}</span>}</div>
      <div className={cn("grid gap-2", slots.length === 6 ? "grid-cols-3 sm:grid-cols-6" : "grid-cols-5 sm:grid-cols-9")}>
        {slots.map((s) => <SlotTile key={s.id} slot={s} onSelect={() => onSelect(s)} />)}
      </div>
    </section>
  );
}
