"use client";
import { Card, Select } from "@/components/ui/ui";
import { GATES } from "@/data/locations";
import type { Prefs } from "@/lib/recommend";
export default function PreferenceForm({ value, onChange }: { value: Prefs; onChange: (p: Prefs) => void }) {
  return (
    <Card className="grid gap-4 p-4 sm:grid-cols-3">
      <Select label="KENDARAAN" value={value.vehicle} onChange={(e) => onChange({ ...value, vehicle: e.target.value as Prefs["vehicle"] })}>
        <option value="all">Semua</option><option value="motor">Motor</option><option value="mobil">Mobil</option>
      </Select>
      <Select label="PRIORITAS" value={value.priority} onChange={(e) => onChange({ ...value, priority: e.target.value as Prefs["priority"] })}>
        <option value="kosong">Slot paling lega</option><option value="dekat">Paling dekat</option><option value="kuliah">Dekat gedung kuliah</option>
      </Select>
      <Select label="GERBANG MASUK" value={value.gate} onChange={(e) => onChange({ ...value, gate: e.target.value })}>
        {GATES.map((g) => <option key={g}>{g}</option>)}
      </Select>
    </Card>
  );
}
