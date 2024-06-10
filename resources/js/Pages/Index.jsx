import ProductCard from '@/Components/ProductCard';
import ProductModal from '@/Components/ProductModal';
import { useEffect, useState } from 'react';

const API_URL = 'http://localhost:8000/products'

export default function Index() {
  const [isProductModalOpen, setProductModalOpen] = useState(false)
  const [products, setProducts] = useState([])

  useEffect(() => {
    fetch(API_URL)
      .then(response => response.json())
      .then(response => setProducts(response.data))
      .catch(error => console.log(error))
  }, [])
  const handleOpenProductModal = () => {
    setProductModalOpen(true)
  }

  const handleCloseProductModal = () => {
    setProductModalOpen(false)
  };

  const onSubmit = async (event, formParams) => {
    event.preventDefault()
    event.stopPropagation()

    // Adding fields manually for testing purposes
    formParams.description = 'Apple iPad Air de 11 Pulgadas (M2): Pantalla Liquid Retina, 128 GB, cámara Frontal de 12 Mpx en Horizontal y cámara Trasera de 12 Mpx, Wi-Fi 6E, Touch ID, autonomía de Sol a Sol - Gris Espacial'
    formParams.currency = 'EUR'
    formParams.image_url = 'https://res.cloudinary.com/grover/image/upload/e_trim/b_white,c_pad,dpr_2.0,h_500,w_520/f_auto,q_auto/v1649410392/sonbcigbw5dqw8axlecv.png'

    try {
      const response = await fetch(API_URL, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formParams),
      })
      const data = await response.json()
      setProducts([...products, data.data])
      handleCloseProductModal()
    } catch (error) {
      console.error(error)
    }
  }


  return (
    <div className='container mx-auto py-8'>
      <header className='flex flex-row mb-4 justify-between items-center'>
        <div className='flex flex-row gap-2 justify-center items-center'>
          <img
            src='https://static-00.iconduck.com/assets.00/laravel-icon-1990x2048-xawylrh0.png'
            alt='Laravel icon'
            className='max-w-16 h-16 object-contain' />
          <h1 className='text-3xl font-bold'>Super Store</h1>
        </div>
        <button
          type='button'
          onClick={handleOpenProductModal}
          className='bg-blue-400 rounded-full hover:bg-blue-600 cursor-pointer py-2 px-4 text-white'
        >+ Add Product</button>
        <ProductModal
          isOpen={isProductModalOpen}
          onClose={handleCloseProductModal}
          onSubmit={onSubmit} />
      </header>
      <section className='flex flex-wrap gap-4'>
        {products.map(product => (
          <ProductCard key={product.id} product={product} />
        ))}
      </section>
    </div>
  );
}
