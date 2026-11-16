"use client";
import { createContext, useContext, useState, type ReactNode } from "react";
import { useLocalStorage } from "@/hooks/useLocalStorage";
import { seedUsers } from "@/data/users";
import { seedReviews } from "@/data/reviews";
import type { MockUser, Review, Selection, User } from "@/types";

interface Ctx {
  user: User | null; ready: boolean;
  login: (email: string, password: string) => boolean;
  register: (name: string, email: string, password: string, role: User["role"]) => string | null;
  logout: () => void;
  selected: Selection | null; select: (s: Selection | null) => void;
  reviews: Review[]; addReview: (r: Omit<Review, "id" | "date">) => void;
}
const AppCtx = createContext<Ctx | null>(null);

export function AppProvider({ children }: { children: ReactNode }) {
  const [users, setUsers] = useLocalStorage<MockUser[]>("ub_users", seedUsers);
  const [user, setUser, ready] = useLocalStorage<User | null>("ub_user", null);
  const [reviews, setReviews] = useLocalStorage<Review[]>("ub_reviews", seedReviews);
  const [selected, select] = useState<Selection | null>(null);

  const strip = (u: MockUser): User => ({ id: u.id, name: u.name, role: u.role, email: u.email });
  const login: Ctx["login"] = (email, password) => {
    const u = users.find((x) => x.email.toLowerCase() === email.trim().toLowerCase() && x.password === password);
    if (!u) return false;
    setUser(strip(u)); return true;
  };
  const register: Ctx["register"] = (name, email, password, role) => {
    if (users.some((x) => x.email.toLowerCase() === email.trim().toLowerCase())) return "Email sudah terdaftar.";
    const u: MockUser = { id: `u${Date.now()}`, name, email: email.trim(), password, role };
    setUsers([...users, u]); setUser(strip(u)); return null;
  };
  const logout = () => { setUser(null); select(null); };
  const addReview: Ctx["addReview"] = (r) => setReviews((p) => [{ ...r, id: `r${Date.now()}`, date: new Date().toISOString().slice(0, 10) }, ...p]);

  return <AppCtx.Provider value={{ user, ready, login, register, logout, selected, select, reviews, addReview }}>{children}</AppCtx.Provider>;
}
export function useApp() { const c = useContext(AppCtx); if (!c) throw new Error("useApp harus di dalam AppProvider"); return c; }
