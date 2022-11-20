<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex w-full justify-between">
                        <h3 class="font-semibold font-Inter">Products List</h3>

                        <div class="">
                            <a href="{{ route('product.create') }}"
                                class="text-white bg-green-700 px-4 py-2 rounded-xl">
                                <button>
                                    Add Product
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto relative mt-10 sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6  text-center">
                                        Product Image
                                    </th>
                                    <th scope="col" class="py-3 px-6  ">
                                        Product name
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Price
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Category
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Stock
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="font-Inter">
                                @forelse ($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6 flex justify-center">
                                       @if(is_null($product->featuredImage))

                                       <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}" class="h-12 w-12 rounded-lg object-cover" alt="">
                                       @else
                                       <img src="{{ asset('storage/'.Auth::user()->name.'/'.$product->folder.'/featured/'.$product->featuredImage) }}" class="h-12 w-12 rounded-lg object-cover" alt="">

                                       @endif
                                    </td>
                                    <td
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->title }}
                                    </td>
                                    <td class="py-4 px-6 font-Mukta font-bold text-center">
                                       <p class="m-0 inline">${{ $product->price }} </p>
                                       @if (isset($product->discount))
                                       <p class="ml-2 inline  text-green-600 text-xs">({{ $product->discount }}%)</p>

                                       @endif
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{ Str::ucfirst($product->category->title )}}
                                    </td>
                                    <td class="py-4 px-6 text-center font-bold
                                       @if ($product->stock > 10)
                                           text-green-900
                                           @else
                                           text-red-700
                                       @endif
                                    ">
                                        {{ $product->stock }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex justify-center">
                                                <a class="ml-3" href="{{ route('product.show',$product->id) }}">
                                                    <button>
                                                        <img src="{{ asset('icon/001-loupe.png') }}"  class="w-4 h-4 object-cover" alt="">
                                                    </button>
                                                </a>
                                                <a class="ml-3" href="{{ route('product.edit',$product->id) }}">
                                                    <button>
                                                        <img src="{{ asset('icon/003-edit.png') }}"  class="w-4 h-4 object-cover" alt="">
                                                    </button>
                                                </a>
                                                <form class="ml-3" action="{{ route('product.destroy',$product->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button>
                                                       <img src="{{ asset('icon/002-bin.png') }}" class="w-4 h-4 object-cover" alt="">

                                                    </button>
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty

                                @endforelse


                            </tbody>
                        </table>
                        <div class="flex w-full items-center justify-end mt-7">
                            <div class="">
                                {{ $products->onEachSide(1)->links() }}

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
