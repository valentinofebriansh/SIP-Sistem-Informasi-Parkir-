import { Button, Container } from "@/components/ui/ui";
export default function NotFound() {
  return <Container className="py-24 text-center"><h1 className="text-3xl font-bold">Halaman tidak ditemukan</h1><p className="mt-2 text-sub">Alamat yang kamu buka tidak ada atau lokasinya sudah dipindah.</p><Button href="/" className="mt-6">Kembali ke beranda</Button></Container>;
}
