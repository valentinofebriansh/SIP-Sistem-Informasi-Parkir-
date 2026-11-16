import Breadcrumb from "@/components/layout/Breadcrumb";
import ParkingCard from "@/components/parking/ParkingCard";
import { Container } from "@/components/ui/ui";
import { locations } from "@/data/locations";
export default function Page() {
  return (
    <Container>
      <Breadcrumb items={[{ label: "Semua Lokasi" }]} />
      <h1 className="mb-6 text-3xl font-bold tracking-tight">Semua lokasi parkir</h1>
      <div className="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">{locations.map((l) => <ParkingCard key={l.id} loc={l} />)}</div>
    </Container>
  );
}
