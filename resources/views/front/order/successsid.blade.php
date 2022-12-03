<div class="w-full bg-grau-100 px-3 py-4 rounded-md">
    <div class="flex flex-col">
        <div class="flex justify-between">
            <h3 class="text-md font-semibold pb-3 border-b">Price Detail</h3>

            <span class="text-sm text-greu  font-semibold">( {{ count($orders->orderitem) }} items )</span>
        </div>

        <div class="flex flex-col  space-y-7 mt-4 pb-3 border-b">

            @forelse ($orders->orderitem as $key=>$order)
                <div class="flex justify-between items-center">
                    <div class="flex    ">

                        <div class="flex items-center ">
                            <p class="text-xs text-gray-700 font-semibold">{{ $order->product->title }}</p>

                        </div>
                    </div>
                    <p class="text-xs text-gray-700 font-semibold">$
                        @if (isset($order->product->discount))
                        {{ App\Helpers\MbCalculate::discount($order->product->discount, $order->product->price) }}</span>
                           @else
                           {{ $order->product->price }}
                        @endif
                    </p>
                </div>
            @empty
            @endforelse

        </div>

        <div class="flex justify-between items-center font-semibold mt-3">
            <p class="text-gray-700 text-sm ">Total (USD)</p>

            <span class="text-gray-900 text-md ">${{ $orders->total }}</span>
            <input hidden class="hidden" form="check" name = "total" value = 33 >
        </div>


    </div>



</div>
<div class="flex flex-col bg-grau-100 w-full rounded-lg px-5 py-5 relative mt-6">
    <p class="font-semibold pb-2 border-b">Shipping Address</p>
        <div class="flex flex-col space-y-4 mt-4">


            <p class="text-gray-700 text-sm">Address : {{ $user->address }}</p>
            <p class="text-gray-700 text-sm">Pin code : +380</p>
            <p class="text-gray-700 text-sm">Phone : {{ $user->phone }}</p>
        </div>



</div>

<div class="flex flex-col bg-grau-100 w-full rounded-lg px-5 py-5 relative mt-6">
    <p class="font-semibold pb-2 border-b">Payment Method</p>
        <div class="flex mt-4">


            <p class="text-gray-700 text-sm">Pay on Delivery (Cash/Card). Cash on delivery (COD) available. Card/Net banking acceptance subject to device availability.</p>

        </div>



</div>


