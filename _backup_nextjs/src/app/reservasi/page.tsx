"use client";
import Breadcrumb from "@/components/layout/Breadcrumb";
import { Button, Card, Container } from "@/components/ui/ui";
import { useApp } from "@/context/AppContext";
import { fmtDate } from "@/lib/utils";

export default function Page() {
  const { user, ready, reservations, cancel } = useApp();
  return (
    <Container>
      <Breadcrumb items={[{ label: "Reservasi Saya" }]} />
      <h1 className="mb-5 text-3xl font-bold tracking-tight">Reservasi saya</h1>
      {!ready ? null : !user ? (
        <Card className="p-8 text-center"><p className="font-semibold">Masuk untuk melihat reservasi</p><p className="mt-1 text-sm text-sub">Reservasi tersimpan di akun civitasmu.</p><Button href="/login" className="mt-4">Masuk</Button></Card>
      ) : reservations.length === 0 ? (
        <Card className="p-8 text-center"><p className="font-semibold">Belum ada reservasi</p><p className="mt-1 text-sm text-sub">Pilih slot hijau di denah lalu tekan Pesan Slot.</p><Button href="/cari" className="mt-4">Cari parkir</Button></Card>
      ) : (
        <ul className="space-y-3">
          {reservations.map((r) => (
            <Card key={r.id} className="flex flex-wrap items-center justify-between gap-3 p-4">
              <div className="flex items-center gap-4">
                <span className="num grid h-12 min-w-14 place-items-center rounded-lg bg-primary px-2 font-bold text-white">{r.slotId}</span>
                <div><p className="font-semibold">{r.locationName}</p><p className="num text-xs text-sub">Lantai {r.floor} · {fmtDate(r.createdAt)} · {r.id}</p></div>
              </div>
              <Button variant="secondary" onClick={() => cancel(r.id)} className="py-2">Batalkan</Button>
            </Card>
          ))}
        </ul>
      )}
    </Container>
  );
}
