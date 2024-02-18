<x-app-layout>

    <div class="m-5 p-1">
        <form action="{{ url('category/create') }}">
            <button class="bg-black text-white p-2 w-20 rounded-md" type="submit">
                ADD
            </button>
        </form>
    </div>
    <div class="m-5 flex flex-col h-full text-gray-700 bg-white overflow-auto shadow-md rounded-xl bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Product Name
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Price/s
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                    </th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody>
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->product}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->price}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <img class="max-w-full h-24" src="{{ asset('storage/product_images/'. $product->image)}}" alt="">
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="{{url('category/edit', $product->id)}}" class="ml-2 bg-black text-white p-2 rounded-md font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>

                        <form class="mt-2" action="{{url('category/delete', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="ml-2 bg-red-500 text-white p-2 rounded-md font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900" type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</x-app-layout>