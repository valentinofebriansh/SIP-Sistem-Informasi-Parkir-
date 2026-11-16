"use client";
import Link from "next/link";
import type { ButtonHTMLAttributes, InputHTMLAttributes, ReactNode, SelectHTMLAttributes } from "react";
import { cn } from "@/lib/utils";
import { gaugeColor } from "@/lib/status";

export const Container = ({ children, className }: { children: ReactNode; className?: string }) => (
  <div className={cn("mx-auto w-full max-w-[1440px] px-4 md:px-8 lg:px-12", className)}>{children}</div>
);

type BtnProps = { variant?: "primary" | "secondary" | "success" | "outline"; href?: string } & ButtonHTMLAttributes<HTMLButtonElement>;
export function Button({ variant = "primary", href, className, children, ...rest }: BtnProps) {
  const c = cn(
    "inline-flex items-center justify-center gap-2 rounded-lg px-5 py-2.5 text-sm font-semibold transition active:scale-[.99] disabled:pointer-events-none disabled:opacity-50",
    variant === "primary" && "bg-primary text-white hover:bg-primary/90",
    variant === "secondary" && "border-[1.5px] border-line bg-white text-ink hover:border-slate-300 hover:bg-canvas",
    variant === "success" && "bg-secondary text-white hover:shadow-[0_0_0_3px_rgba(5,150,105,.25)]",
    variant === "outline" && "border border-primary text-primary hover:bg-primary/5",
    className
  );
  return href ? <Link href={href} className={c}>{children}</Link> : <button className={c} {...rest}>{children}</button>;
}

export function Chip({ active, children, href, onClick }: { active?: boolean; children: ReactNode; href?: string; onClick?: () => void }) {
  const c = cn("num inline-flex items-center gap-1.5 rounded-full border px-3 py-1.5 text-xs font-medium transition",
    active ? "border-primary bg-primary text-white" : "border-line bg-canvas text-mid hover:border-slate-300");
  return href ? <Link href={href} className={c}>{children}</Link> : <button type="button" onClick={onClick} className={c}>{children}</button>;
}

const tones = {
  green: "bg-emerald-50 text-emerald-800", amber: "bg-amber-50 text-amber-800", red: "bg-red-50 text-red-700",
  blue: "bg-blue-50 text-primary", gray: "bg-well text-sub", white: "bg-white/90 text-ink",
};
export const Badge = ({ tone = "gray", children, className }: { tone?: keyof typeof tones; children: ReactNode; className?: string }) => (
  <span className={cn("num inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[11px] font-medium", tones[tone], className)}>{children}</span>
);
export const OccupancyBadge = ({ tone = "green", children }: { tone?: "green" | "amber" | "red"; children: ReactNode }) => (
  <Badge tone={tone} className="font-semibold">
    <span className={cn("size-1.5 rounded-full", tone === "green" ? "dot-pulse bg-secondary" : tone === "amber" ? "bg-amber-500" : "bg-red-500")} />
    {children}
  </Badge>
);

export const Card = ({ children, className }: { children: ReactNode; className?: string }) => (
  <div className={cn("rounded-2xl border border-line bg-white shadow-card", className)}>{children}</div>
);

export function ProgressBar({ pct, label }: { pct: number; label?: string }) {
  return (
    <div role="progressbar" aria-valuenow={pct} aria-valuemin={0} aria-valuemax={100} aria-label={label ?? "Tingkat keterisian"} className="h-1.5 w-full overflow-hidden rounded-full bg-line">
      <div className={cn("h-full rounded-full transition-all", gaugeColor(pct))} style={{ width: `${pct}%` }} />
    </div>
  );
}

const field = "h-11 w-full rounded-lg border border-slate-300 bg-white px-3 text-sm text-ink placeholder:text-sub focus:border-primary focus:outline-none focus:ring-[3px] focus:ring-primary/15";
export function Input({ label, className, ...p }: { label?: string } & InputHTMLAttributes<HTMLInputElement>) {
  return <label className="block">{label && <span className="num mb-1 block text-[11px] font-medium text-sub">{label}</span>}<input className={cn(field, className)} {...p} /></label>;
}
export function Select({ label, className, children, ...p }: { label?: string } & SelectHTMLAttributes<HTMLSelectElement>) {
  return <label className="block">{label && <span className="num mb-1 block text-[11px] font-medium text-sub">{label}</span>}<select className={cn(field, "pr-8", className)} {...p}>{children}</select></label>;
}

export function Tabs<T extends string | number>({ items, value, onChange }: { items: { value: T; label: string }[]; value: T; onChange: (v: T) => void }) {
  return (
    <div role="tablist" className="inline-flex rounded-lg bg-well p-1">
      {items.map((i) => (
        <button key={String(i.value)} role="tab" aria-selected={i.value === value} onClick={() => onChange(i.value)}
          className={cn("num rounded-md px-3 py-1.5 text-xs font-semibold transition", i.value === value ? "bg-primary text-white" : "text-mid hover:bg-white")}>
          {i.label}
        </button>
      ))}
    </div>
  );
}
