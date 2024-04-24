<div class="bg-white rounded-lg shadow-lg p-8">
    <div class="relative overflow-hidden">
        <img class="object-cover w-full h-full"
            src="{{ asset('/storage/products/'.$image) }}"
            alt="Product">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <button
                class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300"
                onclick="location.href='{{ route('product.show', $id) }}'">View
                Product</button>
        </div>
    </div>
    <h3 class="text-xl font-bold text-gray-900 mt-4">{{$name}}</h3>
    <p class="text-gray-500 text-sm mt-2">{{ Str::limit($description, 100) }}</p>
    <div class="flex items-center justify-between mt-4">
        <span class="text-gray-900 font-bold text-lg overflow-ellipsis">{{ $price }}</span>
    </div>
</div>