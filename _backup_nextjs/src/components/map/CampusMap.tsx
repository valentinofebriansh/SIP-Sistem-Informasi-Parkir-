import { MapPin } from "lucide-react";
import { locations } from "@/data/locations";
/** Placeholder peta kampus: posisi pin hanya ilustrasi. */
const pos = [[22, 30], [60, 22], [72, 62], [38, 68], [50, 45], [20, 60]];
export default function CampusMap() {
  return (
    <div className="relative h-44 overflow-hidden rounded-xl border border-line bg-[linear-gradient(#e2e8f0_1px,transparent_1px),linear-gradient(90deg,#e2e8f0_1px,transparent_1px)] bg-[size:24px_24px] bg-well" role="img" aria-label="Peta ilustrasi kampus UB">
      {locations.map((l, i) => (
        <span key={l.id} title={l.name} className="absolute -translate-x-1/2 -translate-y-1/2" style={{ left: `${pos[i][0]}%`, top: `${pos[i][1]}%` }}>
          <MapPin size={20} className={l.free === 0 ? "text-red-500" : "text-primary"} fill="white" />
        </span>
      ))}
      <span className="num absolute bottom-2 right-2 rounded bg-white/90 px-2 py-1 text-[10px] text-sub">Peta ilustrasi</span>
    </div>
  );
}
