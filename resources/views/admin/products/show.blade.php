<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <img src="{{ $product->image }}" class="rounded" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <h3>{{ $product->title }}</h3>
                                        <hr/>
                                        <p>{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                                        <code>
                                            <p>{!! $product->description !!}</p>
                                        </code>
                                        <hr/>
                                        <p>Stock : {{ $product->stock }}</p>
                                    </div>
                                    <x-secondary-button onclick="location.href='javascript:history.back()'">Back</x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
