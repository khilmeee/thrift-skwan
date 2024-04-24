<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <div class="bg-gray-900 py-16">
                        <div class="container mx-auto px-4">
                            <h2 class="text-3xl font-bold text-white mb-8">Introducing Our Latest Product</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                                @forelse ($products as $product)
                                    <x-product.card>
                                        <x-slot:image>{{$product->image}}</x-slot>
                                        <x-slot:name>{{$product->title}}</x-slot>
                                        <x-slot:description>{!! $product->description !!}</x-slot>
                                        <x-slot:price>{{ "Rp " . number_format($product->price,2,',','.') }}</x-slot>
                                        <x-slot:id>{{$product->id}}</x-slot>
                                    </x-product.card>
                                @empty
                                    <h1>tidak ada produk</h1>
                                @endforelse
                                
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
