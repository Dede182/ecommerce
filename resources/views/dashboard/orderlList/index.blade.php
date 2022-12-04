<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex w-full justify-between">
                        <h3 class="font-semibold font-Inter">Order List</h3>

                        <div class="">
                            {{-- <a href="{{ route('product.create') }}" class="text-white bg-green-700 px-4 py-2 rounded-xl">
                                <button>
                                    Add Product
                                </button>
                            </a> --}}
                        </div>
                    </div>

                    <div class="overflow-x-auto relative mt-10 sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6  text-center">
                                        Order Image
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center ">
                                        Order Code
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Date
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Payment Method
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Delivery Status
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Amount
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="font-Inter">

                                @forelse ($orders as $order)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <td class="py-4 px-6 flex justify-center">
                                            @if (is_null($order->orderitem[0]->product->featuredImage))
                                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                                    class="h-12 w-12 rounded-lg object-cover" alt="">
                                            @else
                                                <img src="{{ asset('storage/product' . '/' . $$order->orderitem[0]->product->folder . '/featured/' . $$order->orderitem[0]->product->featuredImage) }}"
                                                    class="h-12 w-12 rounded-lg object-cover" alt="">
                                            @endif
                                        </td>
                                        <td
                                            class="py-4 px-6 font-medium text-gray-500 text-center text-xs whitespace-nowrap dark:text-white">
                                            #{{ $order->code }}
                                        </td>
                                        <td
                                            class="py-4 px-6 font-medium text-gray-500 text-center text-xs whitespace-nowrap dark:text-white">
                                            {{ $order->created_at->format('M d Y') }}
                                        </td>
                                        <td
                                            class="py-4 px-6 font-medium text-gray-500 text-center text-xs whitespace-nowrap dark:text-white">
                                            {{ $order->payment }}
                                        </td>
                                        <td
                                            class="py-4 px-6 font-medium  text-xs whitespace-nowrap dark:text-white">
                                            <div class="w-20 h-6 mx-auto  flex items-center justify-center bg-opacity-80 rounded-sm text-white
                                            {{ App\Helpers\MbCalculate::status($order->status) }}
                                            ">
                                               <p> {{ $order->status }}</p>
                                            </div>
                                        </td>
                                        <td
                                        class="py-4 px-6 font-medium text-gray-500 text-center text-xs whitespace-nowrap dark:text-white">
                                        ${{ $order->total }}
                                    </td>

                                    <td
                                    class="py-4 px-6 font-medium    text-center text-xs whitespace-nowrap  ">
                                        <a href = "{{ route('orderList.show',$order->id) }}" class="mx-auto   flex items-center justify-center   transition rounded-md text-greu">
                                            Manage
                                        </a>
                                    </td>
                                    </tr>
                                @empty
                                @endforelse



                            </tbody>
                        </table>
                        <div class="flex w-full items-center justify-end mt-7">
                            <div class="">
                                {{ $orders->onEachSide(1)->links() }}

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
