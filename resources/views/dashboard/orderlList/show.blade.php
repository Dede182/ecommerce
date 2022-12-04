<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3 pb-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white    ">
                    <div class="flex flex-col w-full justify-between">
                        <div class="w-full pb-2 border-b flex justify-between items-center">
                            <h3 class="font-semibold font-Inter text-gray-600 border-gray-300">Order
                                #{{ $orders->code }}</h3>

                            <form action="">
                                <button class="w-28 bg-greu  text-white rounded-md h-6 flex items-center justify-center text-xs">Mark as Delivered</button>
                            </form>
                        </div>


                        <div class="text-gray-800 pb-3 border-b  w-full border-gray-300 text-sm mt-3 flex  space-x-4">
                            <p>{{ $orders->created_at->format('M d Y') }} at {{ $orders->created_at->format('g:i A') }}
                            </p>
                            <span class="">/</span>
                            <p>{{ count($orders->orderitem) }} items</p>
                            <span class="">/</span>
                            <p>Total $ {{ $orders->total }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full flex space-x-4  px-6 pb-3">
                    <div class="w-[65%] flex flex-col">
                        <div
                            class="w-full flex justify-between items-center text-white font-bold text-sm bg-greu px-3 py-3">
                            <p class="uppercase">Items</p>
                            <p></p>
                        </div>
                        <div class="flex flex-col space-y-1 px-3  border-b">
                            @forelse ($orders->orderitem as $key=>$order)
                                <input type="text" class="hidden" form="checkout" name="product[]"
                                    value="{{ $order->product->id }}">
                                <div class="flex w-full  py-6  justify-evenly">
                                    <div class=" w-full flex space-x-3">
                                        @if (is_null($order->product->featuredImage))
                                            <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                                class="h-16 w-16 rounded-lg object-cover" alt="">
                                        @else
                                            <img src="{{ asset('storage/product' . '/' . $order->product->folder . '/featured/' . $order->product->featuredImage) }}"
                                                class="h-16 w-16 rounded-lg object-cover" alt="">
                                        @endif


                                    </div>
                                    <div class="w-full flex flex-col space-y-1 justify-center">
                                        <p class="text-xs text-gray-500 ">Product Name</p>
                                        <p class="text-xs font-semibold  ">{{ $order->product->title }}</p>
                                    </div>


                                    <div class="flex flex-col space-y-1 text-xs w-full items-center  justify-center">
                                        <p class="text-gray-500 text-xs">Quantity</p>
                                        <p class="text-gray-600 font-semibold text-xs">{{ $order->quantity }}</p>

                                    </div>

                                    <div class="flex flex-col space-y-1 text-xs  w-full items-center  justify-center">
                                        <p class="text-gray-500 font-semibold text-xs">Price</p>
                                        <div class="flex items-center space-x-3">
                                            <p class="font-semibold text-greu text-xs">$ <span class="price">
                                                    {{ App\Helpers\MbCalculate::discount($order->product->discount, $order->product->price) }}</span>
                                            </p>

                                        </div>

                                    </div>


                                    {{--
                                <div class="flex flex-col space-y-1 text-xs w-full items-center">
                                    <p class="text-gray-800 text-sm font-semibold">Total</p>
                                    @php
                                        $discountPrice = App\Helpers\MbCalculate::discount($order->product->discount, $order->product->price)
                                    @endphp
                                    <p class="text-gray-600 font-semibold">  ${{ $discountPrice * $order->quantity }}</p>

                                </div> --}}

                                </div>
                            @empty
                                <div class="w-full  py-4 flex items-center justify-center">
                                    <p>There is no products in cart! <a class="text-blue-700 text-sm underline"
                                            href="{{ route('front.products') }}">Go to shopping </a> </p>
                                </div>
                            @endforelse
                        </div>
                        <div class="  space-y-1 px-3 border-b py-3   ">
                            <div class="flex flex-col w-[92%]">
                                <div class="flex  text-sm">
                                    <p class="w-[90%]">Subtotal : </p>
                                    <p class="font-bold text-gray-500 w-[10%] pl-2 whitespace-nowrap">$ {{ $orders->total }}</p>
                                </div>
                                <div class="flex  text-sm mt-5">
                                    <p class="w-[90%]">Shipping Fee : </p>
                                    <p class="font-bold text-gray-500 w-[10%] pl-2 whitespace-nowrap">$ 12.80</p>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col w-[92%] px-3
                        py-1">

                            <div class="flex  text-sm mt-2 text-greu">
                                <p class="w-[90%] text-lg font-bold">Total Price : </p>
                                <p class="font-bold w-[10%] pl-2 text-lg whitespace-nowrap">$
                                    {{ $orders->total - 12.8 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[35%]">
                        <div class="w-full bg-grau-100 px-3 py-4 rounded-md">
                            <div class="flex flex-col">
                                <div class="flex justify-between border-b">
                                    <h3 class="text-md font-semibold pb-3 ">Summery</h3>

                                    <span class="text-sm text-greu  font-semibold">( {{ count($orders->orderitem) }}
                                        items )</span>
                                </div>

                                <div class="flex flex-col  space-y-2 mt-4 pb-1">

                                   <p class="text-xs text-gray-500 py-1 font-bold">Order Id : {{ $orders->code }}</p>
                                   <p class="text-xs text-gray-500 py-1 font-bold">Order Date : {{ $orders->created_at->format("M d Y") }}</p>
                                   <p class="text-xs text-gray-500 py-1 font-bold">Order Total : $ {{ $orders->total }}</p>

                                </div>




                            </div>

                            <p class="font-semibold  mt-4">Shipping Address</p>
                            <div class="flex flex-col space-y-1 tracking-tight mt-1">


                                <p class="text-gray-700 text-sm">Address : {{ $user->address }}</p>
                                <p class="text-gray-700 text-sm">Pin code : +380</p>
                                <p class="text-gray-700 text-sm">Phone : {{ $user->phone }}</p>
                            </div>




                            <p class="font-semibold  mt-4">Payment Method</p>
                            <div class="flex mt-1">


                                <p class="text-gray-700 text-sm">Pay on Delivery (Cash/Card). Cash on delivery (COD)
                                    available. Card/Net banking acceptance subject to device availability.</p>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
