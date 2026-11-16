import Link from "next/link";
import { Container } from "@/components/ui/ui";
export default function Footer() {
  return (
    <footer className="mt-16 border-t border-line bg-white py-8">
      <Container className="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
          <p className="font-bold">UBParkir</p>
          <p className="mt-1 max-w-md text-xs text-sub">Prototype sistem pemantauan parkir universitas Brawijaya Malang. Data pada situs ini adalah simulasi.</p>
        </div>
        <nav className="flex flex-wrap gap-5 text-xs text-mid">
          <Link href="/cari">Cari Parkir</Link><Link href="/lokasi">Semua Lokasi</Link><Link href="/bantuan">Pusat Bantuan</Link>
        </nav>
      </Container>
      <Container><p className="mt-6 text-xs text-sub">© 2026 Universitas Brawijaya. Prototype untuk keperluan demo.</p></Container>
    </footer>
  );
}
