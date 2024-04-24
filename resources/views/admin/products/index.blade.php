<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-primary-button>Add Product</x-primary-button>
            <x-table class="mt-6">
                <x-slot:heading>
                    <x-table.heading>Image</x-table.heading>
                    <x-table.heading>Title</x-table.heading>
                    <x-table.heading>Description</x-table.heading>
                    <x-table.heading>Price</x-table.heading>
                    <x-table.heading>Stock</x-table.heading>
                </x-slot:heading>

                @forelse ($products as $product )
                    <x-table.row>
                        <x-table.column>
                            <img src="{{ $product->image }}">
                        </x-table.column>
                        <x-table.column>
                            {{ $product->title }}
                        </x-table.column>
                        <x-table.column>
                            {{ $product->description }}
                        </x-table.column>
                        <x-table.column>
                            {{ $product->price }}
                        </x-table.column>
                        <x-table.column>
                            {{ $product->stock }}
                        </x-table.column>
                    </x-table.row>
                @empty
                    <h1 class="dark:text-gray-200">tidak ada data</h1>
                @endforelse

                
            </x-table>
        </div>
    </div>
</x-admin-layout>
