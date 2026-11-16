import { Chip } from "@/components/ui/ui";
const filters = [
  { label: "Semua Area", href: "/cari" },
  { label: "Motor Mahasiswa", href: "/cari?vehicle=motor" },
  { label: "Mobil Dosen/Civitas", href: "/cari?vehicle=mobil" },
  { label: "Dekat Gedung Kuliah", href: "/cari?tag=Dekat+Gedung+Kuliah" },
  { label: "Lapangan Parkir Terbuka", href: "/cari?tag=Lapangan+Terbuka" },
];
export default function FilterPanel({ activeHref }: { activeHref?: string }) {
  return (
    <div className="mt-3 flex flex-wrap items-center gap-2">
      <span className="text-xs text-sub">Filter cepat:</span>
      {filters.map((f) => <Chip key={f.label} href={f.href} active={f.href === activeHref}>{f.label}</Chip>)}
    </div>
  );
}
