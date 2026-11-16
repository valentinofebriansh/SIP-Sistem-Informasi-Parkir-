export default function StatusLegend() {
  const items = [
    ["bg-white border-secondary", "Tersedia"], ["bg-well border-slate-300", "Terisi"],
    ["bg-primary border-primary", "Dipilih"]
  ];
  return (
    <ul className="num flex flex-wrap gap-x-4 gap-y-1 text-[11px] text-mid" aria-label="Legenda status slot">
      {items.map(([c, l]) => <li key={l} className="flex items-center gap-1.5"><span className={`size-3 rounded-sm border-[1.5px] ${c}`} />{l}</li>)}
    </ul>
  );
}
