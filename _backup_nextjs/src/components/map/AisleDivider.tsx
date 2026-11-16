import { ArrowLeftRight } from "lucide-react";
export default function AisleDivider({ text, extra }: { text: string; extra?: string }) {
  return <div className="num my-4 flex items-center justify-between gap-2 rounded-md border border-dashed border-slate-300 bg-white px-3 py-2 text-[10px] text-mid"><span className="flex items-center gap-2"><ArrowLeftRight size={12} />{text}</span>{extra && <span className="hidden text-sub sm:inline">{extra}</span>}</div>;
}
