<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-primary-button onclick="location.href='{{ route('admin.product.create') }}'">Add Product</x-primary-button>
            <x-table class="mt-6">
                <x-slot:heading>
                    <x-table.heading>Image</x-table.heading>
                    <x-table.heading>Title</x-table.heading>
                    <x-table.heading>Price</x-table.heading>
                    <x-table.heading>Stock</x-table.heading>
                    <x-table.heading>Action</x-table.heading>
                </x-slot:heading>

                @forelse ($products as $product )
                    <x-table.row>
                        <x-table.column>
                            <img src="{{ $product->image }}" class="rounded" style="width: 150px">
                        </x-table.column>
                        <x-table.column>
                            {{ $product->title }}
                        </x-table.column>
                        <x-table.column>
                            {{ "Rp " . number_format($product->price,2,',','.') }}
                        </x-table.column>
                        <x-table.column>
                            {{ $product->stock }}
                        </x-table.column>
                        <x-table.column>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                <x-secondary-button onclick="location.href='{{ route('admin.product.show', $product->id) }}'">
                                    Show
                                </x-secondary-button>
                                <x-secondary-button onclick="location.href='{{ route('admin.product.edit', $product->id) }}'">
                                    Edit
                                </x-secondary-button>
                                @csrf
                                @method('DELETE')
                                <x-danger-button>HAPUS</x-danger-button>
                            </form>
                        </x-table.column>
                    </x-table.row>
                @empty
                    <div class="text-rose-700">
                        Data Products belum Tersedia.
                    </div>
                @endforelse

                
            </x-table>
            {{ $products->links() }}
        </div>
    </div>
</x-admin-layout>
