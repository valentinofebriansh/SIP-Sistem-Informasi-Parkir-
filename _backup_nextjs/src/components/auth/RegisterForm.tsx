"use client";
import { useState, type FormEvent } from "react";
import { useRouter } from "next/navigation";
import { useApp } from "@/context/AppContext";
import { Button, Card, Input, Select } from "@/components/ui/ui";
import type { User } from "@/types";
export default function RegisterForm() {
  const { register } = useApp(); const router = useRouter();
  const [f, setF] = useState({ name: "", email: "", pw: "", role: "mahasiswa" as User["role"] }); const [err, setErr] = useState("");
  const submit = (e: FormEvent) => {
    e.preventDefault();
    if (f.pw.length < 6) return setErr("Kata sandi minimal 6 karakter.");
    const r = register(f.name, f.email, f.pw, f.role); if (r) setErr(r); else router.push("/beranda");
  };
  return (
    <Card className="mx-auto w-full max-w-md p-6">
      <h1 className="text-2xl font-bold tracking-tight">Daftar akun civitas</h1>
      <form onSubmit={submit} className="mt-5 space-y-4">
        <Input label="NAMA" required value={f.name} onChange={(e) => setF({ ...f, name: e.target.value })} />
        <Input label="EMAIL" type="email" required value={f.email} onChange={(e) => setF({ ...f, email: e.target.value })} placeholder="nama@ub.ac.id" />
        <Select label="PERAN" value={f.role} onChange={(e) => setF({ ...f, role: e.target.value as User["role"] })}>
          <option value="mahasiswa">Mahasiswa</option><option value="dosen">Dosen</option><option value="staf">Staf</option>
        </Select>
        <Input label="KATA SANDI" type="password" required value={f.pw} onChange={(e) => setF({ ...f, pw: e.target.value })} />
        {err && <p role="alert" className="text-sm text-red-600">{err}</p>}
        <Button type="submit" className="w-full">Buat akun</Button>
      </form>
      <p className="mt-4 text-sm text-sub">Sudah punya akun? <a className="font-semibold text-primary" href="/login">Masuk</a></p>
    </Card>
  );
}
