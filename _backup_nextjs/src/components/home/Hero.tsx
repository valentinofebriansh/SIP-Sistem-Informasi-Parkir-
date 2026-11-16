import SearchBar from "@/components/search/SearchBar";
import FilterPanel from "@/components/search/FilterPanel";
import { OccupancyBadge } from "@/components/ui/ui";
export default function Hero() {
  return (
    <section className="rounded-3xl border border-line bg-linear-to-br from-white to-emerald-50/50 p-6 shadow-card md:p-10">
      <OccupancyBadge>Sistem pemantauan parkir real-time kampus</OccupancyBadge>
      <h1 className="mt-5 max-w-2xl text-4xl font-bold leading-[1.1] tracking-[-0.03em] md:text-5xl">Pantau ketersediaan parkir kampus UB sebelum tiba.</h1>
      <p className="mt-4 max-w-xl text-mid">Cek ketersediaan slot parkir motor dan mobil di seluruh fakultas Universitas Brawijaya Malang.</p>
      <div className="mt-8"><SearchBar /><FilterPanel activeHref="/cari" /></div>
    </section>
  );
}
