import ProductCard from "@/Components/ProductCard";
import { useEffect, useState } from "react";

export default function Index() {
  const [products, setProducts] = useState([])

  useEffect(() => {
    fetch("http://localhost:8000/products")
      .then(response => response.json())
      .then(response => setProducts(response.data))
      .catch(error => console.log(error))
  }, [])

  return (
    <div className="container mx-auto py-8">
      <header className="flex flex-row mb-4 gap-2 justify-start items-center">
        <img
          src='https://static-00.iconduck.com/assets.00/laravel-icon-1990x2048-xawylrh0.png'
          alt='Laravel icon'
          className="max-w-16 h-16 object-contain" />
        <h1 className="text-3xl font-bold">Super Store</h1>
      </header>
      <section className="flex flex-wrap gap-4">
        {products.map(product => (
          <ProductCard key={product.id} product={product} />
        ))}
      </section>
    </div>
  );
}
