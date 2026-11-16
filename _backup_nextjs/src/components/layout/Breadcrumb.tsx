import Link from "next/link";
export default function Breadcrumb({ items }: { items: { label: string; href?: string }[] }) {
  return (
    <nav aria-label="Breadcrumb" className="py-4 text-xs text-sub">
      <Link href="/" className="hover:text-primary">Beranda</Link>
      {items.map((i) => (<span key={i.label}> / {i.href ? <Link href={i.href} className="hover:text-primary">{i.label}</Link> : <span className="text-mid">{i.label}</span>}</span>))}
    </nav>
  );
}
