@extends('front')
@section('content')
    <div class="flex justify-between items-center px-16 2xl:px-28 py-8 bg-grau-100 font-Mukta">
        <div class="font-Inter font-bold cap">
            Checkout
        </div>
        <div class="flex items-center capitalize">
            <x-breadcrumb :first="true" firstRoute="{{ route('cart.index') }}" firstCrumb="Checkout" />
        </div>

    </div>

    <div class="px-16 2xl:px-28 py-8">
        <div class="flex">
            <div class="w-[70%] flex flex-col space-y-5 relative">

                <div class="flex space-x-4">
                    <span class="w-10  h-10 flex items-center justify-center bg-grau-100 rounded-full cicon ">
                        <i class="fa-solid fa-cart-shopping text-greu"></i>
                    </span>
                    <div class="flex flex-col bg-grau-100 w-full rounded-lg px-5 py-5 relative">
                        <p class="font-semibold">Delivery Address</p>

                        <div class="flex space-x-2 items-start bg-white w-fit px-4 py-6 mt-5 rounded-lg shadow-md">
                            <input type="radio" checked
                                class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
                            focus:ring-2 ">
                            <div class="flex flex-col space-y-2">
                                <p class="font-semibold ">{{ $user->name }}</p>

                                <p class="text-gray-700 text-sm">Address : {{ $user->address }}</p>
                                <p class="text-gray-700 text-sm">Pin code : +380</p>
                                <p class="text-gray-700 text-sm">Phone : {{ $user->phone }}</p>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="flex space-x-4 relative">
                    <span class="w-10  h-10 flex items-center justify-center bg-grau-100 rounded-full  cicon " >
                        <i class="fa-solid fa-location-dot text-greu"></i>
                    </span>
                    <div class="flex flex-col bg-grau-100 w-full rounded-lg px-5 py-2 ">
                        <p class="font-semibold">Delivery Option</p>

                        <div class="flex space-x-5 w-full">
                            <div class="w-full flex space-x-2 items-start bg-white  px-4 py-4 mt-5 rounded-lg shadow-md">
                                <input type="radio" id="sdo" checked name="delivery"
                                    class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
                                focus:ring-2 ">
                                <label for="sdo" class="flex flex-col space-y-2">
                                    <p class="text-gray-700 text-sm font-semibold">Standard Delivery Option</p>
                                </label>
                            </div>
                            <div class="w-full flex space-x-2 items-start bg-white  px-4 py-4 mt-5 rounded-lg shadow-md">
                                <input type="radio" id="fdo" checked name="delivery"
                                    class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
                                focus:ring-2 ">
                                <label for="sdo" class="flex flex-col space-y-2">
                                    <p class="text-gray-700 text-sm font-semibold">Future Delivery Option</p>
                                </label>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="flex space-x-4 relative">
                    <span class="w-10  h-10 flex items-center justify-center bg-grau-100 rounded-full  cicon ">
                        <i class="fa-solid fa-wallet text-greu"></i>
                    </span>
                    <div class="flex flex-col bg-grau-100 w-full rounded-lg px-5 py-2 pb-8">
                        <p class="font-semibold">Payment</p>

                        @include('front.order.payment')

                    </div>
                </div>

            </div>
        </div>
        <div class="w-[30%]">

        </div>
    </div>
    </div>
@endsection
