<div class="w-full bg-grau-100 px-3 py-4 rounded-md">
    <div class="flex flex-col">
        <h3 class="text-md font-semibold pb-3 border-b">Order Summary</h3>

        <div class="flex flex-col space-y-7 mt-4 pb-3 border-b">

            @forelse ($orders->orderitem as $order)
                <div class="flex justify-between items-center">
                    <div class="flex    ">
                        <div class="w-20">
                            @if (is_null($order->product->featuredImage))
                                <a href="{{ route('front.product.show', $order->product->id) }}">
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="h-16 w-full rounded-lg object-cover" alt="">
                                </a>
                            @else
                                <a href="{{ route('front.product.show', $order->product->id) }}">
                                    <img src="{{ asset('storage/product' . '/' . $order->product->folder . '/featured/' . $order->product->featuredImage) }}"
                                        class="h-16 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                        alt="">
                                </a>
                            @endif
                        </div>
                        <div class="flex items-center ml-3">
                            <p class="text-xs text-gray-700 font-semibold">{{ $order->product->title }}</p>
                            <span class="text-xs text-black font-bold ml-3">X {{ $order->quantity }}</span>
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

        <div class="flex flex-col pb-4 border-b">
            <div class="flex justify-between items-center font-semibold mt-3">
                <p class="text-gray-700 text-sm ">Subtotal</p>
                <span class="text-gray-700 text-sm ">${{ $total }}</span>
            </div>
            @php
                $deli = 8.90
            @endphp
            <div class="flex justify-between items-center font-semibold mt-3">
                <p class="text-gray-700 text-sm ">Shipping</p>
                <span class="text-gray-700 text-sm ">${{ $deli }}</span>
            </div>
        </div>

        <div class="flex justify-between items-center font-semibold mt-3">
            <p class="text-gray-700 text-sm ">Total (USD)</p>
            @php
                $cost = $total + $deli
            @endphp
            <span class="text-gray-900 text-md ">${{ $cost }}</span>
            <input hidden class="hidden" form="check" name = "total" value = {{ $cost }} >
        </div>
    </div>



</div>

<div class="mt-8">
    <form action="{{ route('order.update',$orders->id) }}" id ="check" method="POST">
        @csrf
        @method('put')
        <button class="w-full flex items-center justify-center text-white  hover:bg-green-300  bg-greu rounded-lg py-2">
            Place Order
        </button>
    </form>
</div>
