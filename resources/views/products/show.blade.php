<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- detail component --}}
                    <x-product.showDetail>
                        <x-slot:image>{{ $product->image}}</x-slot>
                        <x-slot:description>{{ $product->description}}</x-slot>
                        <x-slot:price>{{ $product->price}}</x-slot>
                        <x-slot:stock>{{ $product->stock}}</x-slot>
                        <x-slot:name>{{ $product->name}}</x-slot>
                    </x-product.showDetail>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
