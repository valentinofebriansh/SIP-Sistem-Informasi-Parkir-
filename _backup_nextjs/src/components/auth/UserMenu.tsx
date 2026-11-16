"use client";
import { useApp } from "@/context/AppContext";
import { Button } from "@/components/ui/ui";
export default function UserMenu() {
  const { user, logout, ready } = useApp();
  if (!ready) return <div className="h-9 w-24" />;
  if (!user) return <div className="flex gap-2"><Button href="/login" variant="secondary" className="px-3 py-2">Masuk</Button><Button href="/daftar" className="hidden px-3 py-2 sm:inline-flex">Daftar</Button></div>;
  return (
    <div className="flex items-center gap-2">
      <div className="flex items-center gap-2" title="Reservasi saya">
        <span className="grid size-8 place-items-center rounded-full bg-primary text-xs font-bold text-white">{user.name[0]}</span>
        <span className="hidden leading-tight sm:block"><span className="block text-xs font-semibold">{user.name}</span><span className="block text-[10px] capitalize text-secondary">Civitas Aktif · {user.role}</span></span>
      </div>
      <button onClick={logout} className="rounded-lg px-2 py-1.5 text-xs text-sub hover:bg-well">Keluar</button>
    </div>
  );
}
