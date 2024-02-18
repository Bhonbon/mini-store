<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ url('category/edit', $products->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product">
                                Type
                            </label>
                            <input name="type" class="border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type" type="text" value="{{$products->type}}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product">
                                Product
                            </label>
                            <input name="product" class="border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product" type="text" value="{{$products->product}}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                                Price
                            </label>
                            <div class="flex items-center">
                                <p class="font-bold border border-black py-1.5 px-1.5">&#8369;</p>
                                <input name="price" class="border-l-0 border rounded-r w-1/6 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="1-99999" value="{{$products->price}}">
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="p-2 rounded-md cursor-pointer bg-black text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>