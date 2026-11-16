import Breadcrumb from "@/components/layout/Breadcrumb";
import Hero from "@/components/home/Hero";
import SensorBanner from "@/components/home/SensorBanner";
import RecommendationCarousel from "@/components/home/RecommendationCarousel";
import HomeArea from "@/components/home/HomeArea";
import { Container } from "@/components/ui/ui";

export default function Home() {
  return (
    <Container>
      <Breadcrumb items={[{ label: "Smart Mobility Space" }]} />
      <SensorBanner />
      <div className="mt-6"><Hero /></div>
      <RecommendationCarousel />
      <HomeArea />
    </Container>
  );
}