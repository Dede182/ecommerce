<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex w-full justify-between">
                        <h3 class="font-semibold font-Inter">Order List</h3>

                        <div class="relative">
                            <form action="{{ route('orderList.index') }}"  class="flex text-sm space-x-0">
                                <input name = "search" class="px-3 py-2 w-60 rounded-l-md text-xs placeholder:text-gray-500" type="text"
                                    placeholder="Searched By Code" value="{{ request('search') }}">
                                <button class="border rounded-r-md px-3 border-greu bg-greu">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="#fff" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </button>
                            </form>
                            @if (request('search'))
                            <form action="{{ route('orderList.index') }}">
                                <button>
                                    <i class="fa-solid fa-xmark absolute right-14 top-2"></i>
                                </button>
                            </form>
                            @endif

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
