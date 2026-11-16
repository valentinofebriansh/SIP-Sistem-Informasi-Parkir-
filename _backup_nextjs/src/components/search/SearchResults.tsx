import ParkingCard from "@/components/parking/ParkingCard";
import { Button } from "@/components/ui/ui";
import type { ParkingLocation } from "@/types";
export default function SearchResults({ results }: { results: ParkingLocation[] }) {
  if (!results.length)
    return (
      <div className="rounded-2xl border border-dashed border-line bg-white p-10 text-center">
        <p className="font-semibold">Tidak ada lokasi yang cocok</p>
        <p className="mt-1 text-sm text-sub">Ubah kata kunci, jenis kendaraan, atau gerbang, lalu cek lagi.</p>
        <Button href="/cari" variant="secondary" className="mt-4">Reset filter</Button>
      </div>
    );
  return <div className="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">{results.map((l) => <ParkingCard key={l.id} loc={l} />)}</div>;
}
