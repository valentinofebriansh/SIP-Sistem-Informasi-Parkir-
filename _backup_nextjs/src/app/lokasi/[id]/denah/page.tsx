"use client";
import { useParams } from "next/navigation";
import Breadcrumb from "@/components/layout/Breadcrumb";
import ParkingLayout from "@/components/map/ParkingLayout";
import { Container } from "@/components/ui/ui";
import { getLocation } from "@/data/locations";
import { notFound } from "next/navigation";

export default function Page() {
  const { id } = useParams<{ id: string }>();
  const loc = getLocation(id);
  if (!loc) notFound();
  return (
    <Container>
      <Breadcrumb items={[{ label: loc.name, href: `/lokasi/${loc.id}` }, { label: "Denah" }]} />
      <ParkingLayout locationId={loc.id} />
    </Container>
  );
}
