@extends('front')
@section('content')
    <div class="flex justify-between items-center px-16 2xl:px-28 py-8 bg-grau-100 font-Mukta">
        <div class="font-Inter font-bold cap">
            Cart
        </div>
        <div class="flex items-center capitalize">
            <x-breadcrumb :first="true" firstRoute="{{ route('cart.index') }}" firstCrumb="Cart" />
        </div>

    </div>

    <div class=" px-16 2xl:px-28 py-8 flex space-x-5">
        <div class="w-[80%]">
            <div class="w-full bg-grau-100  flex-col px-5">

                @foreach ($carts as $cart)

                <div class="flex w-full  py-6  justify-evenly">
                    <div class=" w-full">
                        <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                            class="w-20 h-20 object-cover rounded-lg" alt="">
                    </div>
                    <div class=" flex flex-col  w-full ">
                        <p class="text-xs font-semibold pt-1">{{ $cart->product->title }}</p>
                    </div>
                    <div class="flex flex-col space-y-1 text-xs  w-full">
                        <p class="text-gray-600 font-semibold">Price</p>
                        <div class="flex items-center space-x-3">
                            <p class="font-semibold">$ {{ App\Helpers\MbCalculate::discount($cart->product->discount, $cart->product->price) }}</p>
                            <p class="font-semibold text-gray-500 line-through text-[12px]">${{ $cart->product->price }}</p>
                        </div>
                        @php
                            $discount = App\Helpers\MbCalculate::discount($cart->product->discount, $cart->product->price);

                            $price =$cart->product->price;
                            $result =  $price - (int)$discount;
                            $saved = number_format($result,0,'.') ;
                        @endphp
                        <p class="text-greu font-semibold  ">You saved
                            ${{$saved }}
                            </p>
                    </div>
                    <div class="flex flex-col space-y-2 w-full text-xs">
                        <h1 class="text-gray-800 text-sm font-semibold">Qty</h1>

                        <div class="flex space-x-1 items-center">
                            <button data-action="decrement"
                                class="bg-gray-300 rounded-full px-3 text-xs py-2 quanitity-decrease">
                                <i class="fa-solid fa-minus "></i>
                            </button>

                            <input type="number" min="0"
                                class="quantity outline-none focus:outline-none text-center bg-gray-100  border-grau-100 w-12 !border-none !m-0 !p-0"
                                value="0" name="custom-input-number">

                            <button data-action="increment"
                                class="bg-gray-300 rounded-full px-3 text-xs py-2 quanitity-increase">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>


                    </div>

                    <div class="flex flex- flex-col space-y-1  w-full items-center">
                        <p class="text-md font-bold">Action</p>
                        <a class="text-red-800 underline ">Remove </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
            <div class="w-[20%]">
               @include('front.cart.sidecheck')
            </div>
        </div>
        @push('script')
            <script>
                function decrement(e) {
                    const btn = e.target.parentNode.parentElement.querySelector(
                        'button[data-action="decrement"]'
                    );
                    const target = btn.nextElementSibling;
                    let value = Number(target.value);
                    value--;
                    if(value<0){
                        value=0
                    }
                    target.value = value;
                }

                function increment(e) {
                    const btn = e.target.parentNode.parentElement.querySelector(
                        'button[data-action="decrement"]'
                    );
                    const target = btn.nextElementSibling;
                    let value = Number(target.value);
                    value++;
                    target.value = value;
                }

                const decrementButtons = document.querySelectorAll(
                    `button[data-action="decrement"]`
                );

                const incrementButtons = document.querySelectorAll(
                    `button[data-action="increment"]`
                );

                decrementButtons.forEach(btn => {
                    btn.addEventListener("click", decrement);
                });

                incrementButtons.forEach(btn => {
                    btn.addEventListener("click", increment);
                });

            </script>
        @endpush
    @endsection
