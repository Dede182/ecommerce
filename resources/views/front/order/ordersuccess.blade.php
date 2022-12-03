@extends('front')
@section('content')
    <div class="flex justify-center items-center px-16 2xl:px-28 py-8 bg-grau-100 font-Mukta">
        <div class="flex flex-col items-center">
            <lottie-player autoplay mode="normal" src="{{ asset('95029-success.json') }}" style="width: 170px">
            </lottie-player>

            <p class="text-greu text-xl font-semibold">Order Success</p>
            <p class="text-gray-600 text-xs mt-3">Payment Is Successfully And Your Order Is On The Way</p>
            <p class="text-gray-600 text-xs ">Transaction ID: {{ $orders->code }}</p>

        </div>

    </div>

    <div class=" px-16 2xl:px-28 py-8 flex space-x-5">




        <div class="w-[80%]">

            <div class="w-full bg-grau-100  flex-col-reverse flex px-5">

                @forelse ($orders->orderitem as $key=>$order)
                    <input type="text" class="hidden" form="checkout" name="product[]" value="{{ $order->product->id }}">
                    <div class="flex w-full  py-6  justify-evenly">
                        <div class=" w-full flex space-x-3">
                            @if (is_null($order->product->featuredImage))
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="h-16 w-16 rounded-lg object-cover" alt="">
                            @else
                                <img src="{{ asset('storage/product' . '/' . $order->product->folder . '/featured/' . $order->product->featuredImage) }}"
                                    class="h-16 w-16 rounded-lg object-cover" alt="">
                            @endif

                            <p class="text-xs font-semibold pt-1">{{ $order->product->title }}</p>
                        </div>

                        <div class="flex flex-col space-y-1 text-xs  w-full items-center">
                            <p class="text-gray-600 font-semibold">Price</p>
                            <div class="flex items-center space-x-3">
                                <p class="font-semibold text-greu">$ <span class="price">
                                        {{ App\Helpers\MbCalculate::discount($order->product->discount, $order->product->price) }}</span>
                                </p>
                                <p class="font-semibold text-gray-500 line-through text-[12px]">
                                    ${{ $order->product->price }}
                                </p>
                            </div>

                        </div>

                        <div class="flex flex-col space-y-1 text-xs w-full items-center">
                            <p class="text-gray-800 text-sm font-semibold">Qty</p>
                            <p class="text-gray-600 font-semibold">{{ $order->quantity }}</p>

                        </div>

                        <div class="flex flex-col space-y-1 text-xs w-full items-center">
                            <p class="text-gray-800 text-sm font-semibold">Total</p>
                            @php
                                $discountPrice = App\Helpers\MbCalculate::discount($order->product->discount, $order->product->price)
                            @endphp
                            <p class="text-gray-600 font-semibold">  ${{ $discountPrice * $order->quantity }}</p>

                        </div>

                    </div>
                @empty
                    <div class="w-full  py-4 flex items-center justify-center">
                        <p>There is no products in cart! <a class="text-blue-700 text-sm underline"
                                href="{{ route('front.products') }}">Go to shopping </a> </p>
                    </div>
                @endforelse


            </div>
        </div>
        <div class="w-[20%]">
            @include('front.order.successsid')
        </div>
    </div>
@endsection
