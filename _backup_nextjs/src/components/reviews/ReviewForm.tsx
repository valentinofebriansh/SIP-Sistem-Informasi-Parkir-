"use client";
import { useState, type FormEvent } from "react";
import { useApp } from "@/context/AppContext";
import { Button } from "@/components/ui/ui";
import StarRating from "./StarRating";
export default function ReviewForm({ locationId }: { locationId: string }) {
  const { user, addReview } = useApp();
  const [rating, setRating] = useState(5); const [comment, setComment] = useState("");
  if (!user) return <p className="rounded-lg bg-well p-3 text-sm text-sub"><a href="/login" className="font-semibold text-primary">Masuk</a> untuk menulis ulasan.</p>;
  const submit = (e: FormEvent) => { e.preventDefault(); if (!comment.trim()) return; addReview({ locationId, user: user.name, rating, comment: comment.trim() }); setComment(""); };
  return (
    <form onSubmit={submit} className="space-y-3">
      <StarRating value={rating} onChange={setRating} />
      <textarea value={comment} onChange={(e) => setComment(e.target.value)} rows={3} placeholder="Ceritakan pengalaman parkir kamu" className="w-full rounded-lg border border-slate-300 p-3 text-sm focus:border-primary focus:outline-none focus:ring-[3px] focus:ring-primary/15" />
      <Button type="submit" className="py-2">Kirim ulasan</Button>
    </form>
  );
}
