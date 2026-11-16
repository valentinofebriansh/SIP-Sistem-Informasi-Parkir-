import Breadcrumb from "@/components/layout/Breadcrumb";
import { Card, Container } from "@/components/ui/ui";
import { faq } from "@/data/faq";
export default function Page() {
  return (
    <Container>
      <Breadcrumb items={[{ label: "Bantuan" }]} />
      <h1 className="mb-5 text-3xl font-bold tracking-tight">Pusat bantuan</h1>
      <Card className="max-w-3xl divide-y divide-line">
        {faq.map((f) => (
          <details key={f.q} className="group p-5">
            <summary className="cursor-pointer list-none font-semibold marker:hidden">{f.q}</summary>
            <p className="mt-2 text-sm text-mid">{f.a}</p>
          </details>
        ))}
      </Card>
    </Container>
  );
}
