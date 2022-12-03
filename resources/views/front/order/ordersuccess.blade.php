@extends('front')
@section('content')
    <div class="flex justify-center items-center px-16 2xl:px-28 py-8 bg-grau-100 font-Mukta">
            <div class="flex flex-col items-center">
               <lottie-player
                autoplay

                mode="normal"
                src="{{ asset('95029-success.json') }}"
                style="width: 220px"
              >
              </lottie-player>

              <p class="text-greu text-xl font-semibold">Order Success</p>
              <p class="text-gray-600 text-xs mt-3">Payment Is Successfully And Your Order Is On The Way</p>
              <p class="text-gray-600 text-xs ">Transaction ID: {{ $order->code }}</p>

            </div>
    </div>

@endsection
