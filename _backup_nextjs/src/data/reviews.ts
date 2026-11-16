import type { Review } from "@/types";
export const seedReviews: Review[] = [
  { id: "r1", locationId: "gedung-bersama", user: "Dimas A.", rating: 5, comment: "Luas, ada lift, dan slot kosong gampang dicari lewat denah.", date: "2026-11-02" },
  { id: "r2", locationId: "gedung-bersama", user: "Nabila R.", rating: 4, comment: "Pagi jam 7 sudah mulai ramai di lantai 1–2, naik ke lantai 3 lebih lega.", date: "2026-10-28" },
  { id: "r3", locationId: "filkom-vokasi", user: "Fajar S.", rating: 4, comment: "Dekat gedung G, tapi kapasitas kecil.", date: "2026-11-05" },
  { id: "r4", locationId: "samantha-krida", user: "Intan K.", rating: 3, comment: "Penuh kalau ada acara, siapkan alternatif.", date: "2026-10-20" },
];
