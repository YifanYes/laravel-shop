const ProductCard = ({ product }) => (
  <div className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-80 hover:shadow-2xl">
    <img
      src={product.image_url}
      alt={product.name}
      className="h-64 object-cover mb-3" />
    <div className="text-center">
      <h2 className="text-gray-800 text-xl font-semibold mb-2">{product.name}</h2>
      <p className="text-gray-600">{product.price} {product.currency}</p>
      <p className="text-gray-400 overflow-hidden text-ellipsis whitespace-nowrap mb-8">{product.description}</p>
      <a
        href={product.cta_url}
        className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 cursor-pointer">Buy Now</a>
    </div>
  </div>
)

export default ProductCard
