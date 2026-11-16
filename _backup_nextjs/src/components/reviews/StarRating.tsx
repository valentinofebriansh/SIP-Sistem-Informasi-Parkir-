import { Star } from "lucide-react";
export function StarRating({ value, onChange }: { value: number; onChange?: (v: number) => void }) {
  return (
    <span className="inline-flex gap-0.5" role={onChange ? "radiogroup" : "img"} aria-label={`${value} dari 5 bintang`}>
      {[1, 2, 3, 4, 5].map((n) => (
        <button key={n} type="button" disabled={!onChange} onClick={() => onChange?.(n)} aria-label={`${n} bintang`} className={onChange ? "cursor-pointer" : "cursor-default"}>
          <Star size={16} className={n <= value ? "fill-amber-400 text-amber-400" : "text-slate-300"} />
        </button>
      ))}
    </span>
  );
}
export default StarRating;
