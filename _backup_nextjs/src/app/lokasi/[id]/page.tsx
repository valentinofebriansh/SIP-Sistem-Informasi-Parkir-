"use client";
import { useParams, notFound } from "next/navigation";
import { Camera, DoorOpen, Footprints, Clock } from "lucide-react";
import Breadcrumb from "@/components/layout/Breadcrumb";
import CapacityInfo from "@/components/parking/CapacityInfo";
import ReviewList from "@/components/reviews/ReviewList";
import { Badge, Button, Card, Container, OccupancyBadge } from "@/components/ui/ui";
import { getLocation } from "@/data/locations";
import { locStatus, pctUsed } from "@/lib/status";

export default function Page() {
  const { id } = useParams<{ id: string }>();
  const loc = getLocation(id);
  if (!loc) notFound();
  const st = locStatus(loc);
  return (
    <Container>
      <Breadcrumb items={[{ label: "Lokasi", href: "/lokasi" }, { label: loc.name }]} />
      <div className="grid gap-6 lg:grid-cols-[1.6fr_1fr]">
        <div className="space-y-6">
          <Card className="overflow-hidden">
            <div className={`bg-linear-to-br ${loc.hue} p-6 text-white`}>
              <OccupancyBadge tone={st === "open" ? "green" : st === "almost" ? "amber" : "red"}>{st === "full" ? "Penuh" : `${loc.free} slot tersedia`}</OccupancyBadge>
              <h1 className="mt-3 text-3xl font-bold tracking-tight">{loc.name}</h1>
              <p className="text-sm text-white/80">{loc.zone}</p>
            </div>
            <div className="space-y-5 p-6">
              <p className="text-sm text-mid">{loc.desc}</p>
              <CapacityInfo loc={loc} />
              <div className="num grid grid-cols-2 gap-3 text-xs sm:grid-cols-4">
                <Info icon={<DoorOpen size={14} />} k="Gerbang" v={loc.gate} />
                <Info icon={<Footprints size={14} />} k="Jarak" v={`${loc.distance} m`} />
                <Info icon={<Clock size={14} />} k="Jam buka" v={loc.hours} />
                <Info k="Terisi" v={`${pctUsed(loc)}%`} />
              </div>
              <div className="flex flex-wrap gap-2">{loc.tags.map((t) => <Badge key={t} tone="blue">{t}</Badge>)}</div>
              <Button href={`/lokasi/${loc.id}/denah`} disabled={st === "full"}>Lihat denah blok</Button>
            </div>
          </Card>
          <Card className="p-6"><ReviewList locationId={loc.id} /></Card>
        </div>
        <aside className="space-y-4">
          <Card className="p-5">
            <div className="flex items-center gap-2 font-semibold"><Camera size={16} className="text-sub" />Kamera parkiran</div>
            <p className="mt-2 text-sm text-sub">Akses kamera real-time belum tersedia. Gunakan denah slot untuk melihat kondisi terbaru.</p>
            <Badge tone="gray" className="mt-3">Segera hadir</Badge>
          </Card>
        </aside>
      </div>
    </Container>
  );
}
function Info({ icon, k, v }: { icon?: React.ReactNode; k: string; v: string }) {
  return <div className="rounded-lg border border-line bg-canvas p-3"><p className="flex items-center gap-1 text-[10px] text-sub">{icon}{k}</p><p className="mt-1 font-semibold text-ink">{v}</p></div>;
}
