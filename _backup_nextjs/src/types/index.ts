export type SlotStatus = "available" | "occupied" | "selected" | "charging";
export type Vehicle = "motor" | "mobil";
export type Row = "A" | "B" | "C";

export interface Slot { id: string; row: Row; floor: number; status: SlotStatus; type: "regular" | "ev" }

export interface ParkingLocation {
  id: string; name: string; zone: string; gate: string; distance: number;
  vehicles: Vehicle[]; total: number; free: number; floors: number;
  tags: string[]; hue: string; desc: string; hours: string;
}
export interface Review { id: string; locationId: string; user: string; rating: number; comment: string; date: string }
export interface User { id: string; name: string; role: "mahasiswa" | "dosen" | "staf"; email: string }
export type MockUser = User & { password: string };
export interface Selection { locationId: string; floor: number; slotId: string }

