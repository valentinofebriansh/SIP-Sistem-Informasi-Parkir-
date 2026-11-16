"use client";
import { Suspense } from "react";
import { useSearchParams } from "next/navigation";
import Breadcrumb from "@/components/layout/Breadcrumb";
import SearchBar from "@/components/search/SearchBar";
import FilterPanel from "@/components/search/FilterPanel";
import SearchResults from "@/components/search/SearchResults";
import { Container } from "@/components/ui/ui";
import { locations } from "@/data/locations";
import { defaultParams, filterLocations, type SearchParams } from "@/lib/filters";

function Inner() {
  const sp = useSearchParams();
  const p: SearchParams = {
    q: sp.get("q") ?? "", vehicle: (sp.get("vehicle") as SearchParams["vehicle"]) ?? "all",
    gate: sp.get("gate") ?? defaultParams.gate, cond: (sp.get("cond") as SearchParams["cond"]) ?? "terbanyak", tag: sp.get("tag") ?? "",
  };
  const res = filterLocations(locations, p);
  const active = p.tag ? `/cari?tag=${p.tag.replace(/ /g, "+")}` : p.vehicle !== "all" ? `/cari?vehicle=${p.vehicle}` : "/cari";
  return (
    <>
      <SearchBar key={sp.toString()} initial={p} />
      <FilterPanel activeHref={active} />
      <p className="num mt-6 mb-3 text-xs text-sub">{res.length} lokasi ditemukan</p>
      <SearchResults results={res} />
    </>
  );
}
export default function Page() {
  return (
    <Container>
      <Breadcrumb items={[{ label: "Cari Parkir" }]} />
      <h1 className="mb-4 text-3xl font-bold tracking-tight">Cari lokasi parkir</h1>
      <Suspense fallback={<p className="text-sm text-sub">Memuat…</p>}><Inner /></Suspense>
    </Container>
  );
}
