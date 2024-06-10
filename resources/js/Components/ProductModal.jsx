import { useEffect, useRef, useState } from 'react';


export default function ProductModal({ isOpen, onClose, onSubmit }) {
  const modalRef = useRef(null)
  const [formState, setFormState] = useState({
    name: '',
    price: '',
  })

  useEffect(() => {
    const modal = modalRef.current;
    if (isOpen) {
      if (modal && !modal.open) {
        modal.showModal()
      }
    } else {
      if (modal && modal.open) {
        modal.close()
      }
    }
  }, [isOpen])

  return (
    <dialog
      className='rounded-lg border-2 border-slate-700'
      ref={modalRef}>
      <div className='bg-white  px-6 pt-6 bg-opacity-50 w-fit'>
        <h2 className='text-2xl font-bold text-center mb-4'>Add product</h2>

        <form
          onSubmit={(e) => onSubmit(e, formState)}
          className='mb-4'>
          <div className='flex flex-col mb-4'>
            <label className='font-medium'>Name</label>
            <input
              type='text'
              name='name'
              className='rounded border-2 border-slate-700'
              onChange={(e) => setFormState({ ...formState, name: e.target.value })}
            />
          </div>

          <div className='flex flex-col mb-4'>
            <label className='font-medium'>Price</label>
            <input
              type='number'
              min={0}
              step={1}
              pattern='[0-9]*'
              name='price'
              className='rounded border-2 border-slate-700'
              onChange={(e) => setFormState({ ...formState, price: e.target.value })}
            />
          </div>

          <div className='flex flex-row justify-end gap-2 mt-4'>
            <button
              type='button'
              className='bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded'
              onClick={onClose}>
              Close
            </button>
            <button
              type='submit'
              className='bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded'>
              Create
            </button>
          </div>
        </form>
      </div>
    </dialog>
  )
}
