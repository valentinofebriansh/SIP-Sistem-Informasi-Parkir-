import { Radio } from "lucide-react";
import Link from "next/link";
export default function SensorBanner() {
  return (
    <div className="flex flex-wrap items-center justify-between gap-2 rounded-xl border border-line bg-white px-4 py-2.5 text-xs shadow-card">
      <span className="flex items-center gap-2 text-mid"><Radio size={14} className="text-secondary" /><b className="text-ink">Sensor Grid UB Live:</b><span className="num">1.420 slot aktif terpantau di 12 area parkir fakultas & terpadu UB.</span></span>
      <Link href="/bantuan" className="num rounded-full border border-line px-3 py-1 text-primary hover:bg-well">Pusat Bantuan Civitas</Link>
    </div>
  );
}
