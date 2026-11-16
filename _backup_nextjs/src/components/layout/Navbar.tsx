"use client";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { MapPin } from "lucide-react";
import { cn } from "@/lib/utils";
import { Container } from "@/components/ui/ui";
import UserMenu from "@/components/auth/UserMenu";

const links = [
  { href: "/cari", label: "Cari Parkir" },
  { href: "/rekomendasi", label: "Rekomendasi Area" },
  { href: "/bantuan", label: "Bantuan" },
];

export default function Navbar() {
  const path = usePathname();
  return (
    <header className="sticky top-0 z-40 border-b border-line bg-white/94 backdrop-blur-md">
      <Container className="flex h-16 items-center gap-4">
        <Link href="/" className="flex items-center gap-2">
          <span className="grid size-8 place-items-center rounded-lg bg-primary font-bold text-white">P</span>
          <span className="leading-tight"><span className="block text-sm font-bold">UBParkir</span><span className="block text-[10px] text-sub">Sistem Kampus UB</span></span>
        </Link>
        <span className="num hidden items-center gap-1.5 rounded-full border border-line bg-emerald-50/50 px-3 py-1 text-[11px] text-mid lg:inline-flex">
          <MapPin size={12} className="text-secondary" /> Kampus Utama Universitas Brawijaya Malang
        </span>
        <nav className="ml-auto hidden items-center gap-1 md:flex" aria-label="Navigasi utama">
          {links.map((l) => (
            <Link key={l.href} href={l.href} className={cn("rounded-lg px-3 py-2 text-sm font-medium transition", path.startsWith(l.href) ? "bg-primary text-white" : "text-mid hover:bg-well")}>{l.label}</Link>
          ))}
        </nav>
        <div className="ml-auto md:ml-2"><UserMenu /></div>
      </Container>
      <nav className="flex gap-1 overflow-x-auto border-t border-line px-4 py-2 md:hidden" aria-label="Navigasi seluler">
        {links.map((l) => (
          <Link key={l.href} href={l.href} className={cn("shrink-0 rounded-lg px-3 py-1.5 text-xs font-medium", path.startsWith(l.href) ? "bg-primary text-white" : "bg-well text-mid")}>{l.label}</Link>
        ))}
      </nav>
    </header>
  );
}
