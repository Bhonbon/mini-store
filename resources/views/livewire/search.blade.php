<div>
    <div class="p-3">
        <input type="text" wire:model.live="search" class="form-control border-0 rounded w-full" placeholder="Search">
    </div>
    <div class="overflow-auto rounded-md">
        <table class="table-auto min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="text-green-500 px-6 py-3 bg-gray-50 text-left text-md leading-4 font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th class="text-green-500 px-6 py-3 bg-gray-50 text-left text-md leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="text-green-500 px-6 py-3 bg-gray-50 text-left text-md leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr wire:loading.class="opacity-75">
                    <td class="px-6 py-2 whitespace-no-wrap capitalize">{{$product->product}}</td>
                    <td class="px-6 py-2 whitespace-no-wrap">&#8369;{{$product->price}}</td>
                    <td class="px-6 py-2 whitespace-no-wrap capitalize">{{$product->type}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="mt-2">
        {{ $products->links() }}
    </div>
    <div wire:loading>
        Loading...
    </div>

</div>