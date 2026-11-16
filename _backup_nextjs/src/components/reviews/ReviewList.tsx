"use client";
import { useApp } from "@/context/AppContext";
import { fmtDate } from "@/lib/utils";
import StarRating from "./StarRating";
import ReviewForm from "./ReviewForm";
export default function ReviewList({ locationId }: { locationId: string }) {
  const { reviews } = useApp();
  const list = reviews.filter((r) => r.locationId === locationId);
  const avg = list.length ? (list.reduce((a, r) => a + r.rating, 0) / list.length).toFixed(1) : "–";
  return (
    <div>
      <div className="mb-4 flex items-center gap-3"><h2 className="text-xl font-bold tracking-tight">Ulasan</h2><span className="num text-sm text-sub">{avg} / 5 · {list.length} ulasan</span></div>
      <ReviewForm locationId={locationId} />
      <ul className="mt-5 divide-y divide-line">
        {list.length === 0 && <li className="py-4 text-sm text-sub">Belum ada ulasan. Jadilah yang pertama.</li>}
        {list.map((r) => (
          <li key={r.id} className="py-4">
            <div className="flex items-center justify-between"><span className="text-sm font-semibold">{r.user}</span><span className="num text-[11px] text-sub">{fmtDate(r.date)}</span></div>
            <StarRating value={r.rating} /><p className="mt-1 text-sm text-mid">{r.comment}</p>
          </li>
        ))}
      </ul>
    </div>
  );
}
