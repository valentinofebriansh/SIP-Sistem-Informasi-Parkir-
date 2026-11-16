"use client";
import { useMemo, useState } from "react";
import Breadcrumb from "@/components/layout/Breadcrumb";
import PreferenceForm from "@/components/recommendation/PreferenceForm";
import RecommendedSlotCard from "@/components/recommendation/RecommendedSlotCard";
import { Container } from "@/components/ui/ui";
import { locations } from "@/data/locations";
import { defaultPrefs, recommend } from "@/lib/recommend";

export default function Page() {
  const [prefs, setPrefs] = useState(defaultPrefs);
  const ranked = useMemo(() => recommend(locations, prefs), [prefs]);
  return (
    <Container>
      <Breadcrumb items={[{ label: "Rekomendasi Area" }]} />
      <h1 className="text-3xl font-bold tracking-tight">Rekomendasi area parkir</h1>
      <p className="mt-1 mb-5 text-sm text-sub">Atur preferensimu, urutan lokasi menyesuaikan otomatis.</p>
      <PreferenceForm value={prefs} onChange={setPrefs} />
      <div className="mt-6 space-y-3">
        {ranked.length === 0 && <p className="rounded-xl border border-dashed border-line bg-white p-8 text-center text-sm text-sub">Tidak ada lokasi dengan slot kosong untuk preferensi ini. Coba ganti jenis kendaraan.</p>}
        {ranked.map((r, i) => <RecommendedSlotCard key={r.loc.id} loc={r.loc} score={r.score} rank={i + 1} />)}
      </div>
    </Container>
  );
}
