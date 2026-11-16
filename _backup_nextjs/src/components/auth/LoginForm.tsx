"use client";
import { useState, type FormEvent } from "react";
import { useRouter } from "next/navigation";
import { useApp } from "@/context/AppContext";
import { Button, Card, Input } from "@/components/ui/ui";
export default function LoginForm() {
  const { login } = useApp(); const router = useRouter();
  const [email, setEmail] = useState(""); const [pw, setPw] = useState(""); const [err, setErr] = useState("");
  const submit = (e: FormEvent) => { e.preventDefault(); if (login(email, pw)) router.push("/beranda"); else setErr("Email atau kata sandi salah. Coba akun demo di bawah."); };
  return (
    <Card className="mx-auto w-full max-w-md p-6">
      <h1 className="text-2xl font-bold tracking-tight">Masuk ke UBParkir</h1>
      <form onSubmit={submit} className="mt-5 space-y-4">
        <Input label="EMAIL" type="email" required value={email} onChange={(e) => setEmail(e.target.value)} placeholder="nama@ub.ac.id" />
        <Input label="KATA SANDI" type="password" required value={pw} onChange={(e) => setPw(e.target.value)} />
        {err && <p role="alert" className="text-sm text-red-600">{err}</p>}
        <Button type="submit" className="w-full">Masuk</Button>
      </form>
      <p className="num mt-4 rounded-lg bg-well p-3 text-[11px] text-mid">Akun demo: mahasiswa@ub.ac.id / 123456</p>
      <p className="mt-4 text-sm text-sub">Belum punya akun? <a className="font-semibold text-primary" href="/daftar">Daftar</a></p>
    </Card>
  );
}
