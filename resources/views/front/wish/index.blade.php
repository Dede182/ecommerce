@extends('front')
@section('content')
    <div class="flex justify-between items-center px-16 2xl:px-28 py-8 bg-grau-100 font-Mukta">
        <div class="font-Inter font-bold cap">
            WishList
        </div>
        <div class="flex items-center capitalize">
            <x-breadcrumb :first="true" firstRoute="#" firstCrumb="WishList" />
        </div>
    </div>

    <div class="mt-4 px-16 2xl:px-28 py-8">
        <div class="flex flex-wrap space-x-6">
            @forelse ($wishes->favlist as $wish)
                <div class="flex flex-col  py-8 px-4 bg-grau-100 rounded-md  w-64 relative">

                    <div class="absolute top-0 right-0 rounded-full h-6 w-6 shadow-lg cursor-pointer  flex items-center justify-center bg-white">
                        <a class="">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <div class="flex items-center justify-center">
                        @if (is_null($wish->product->featuredImage))
                        <a href="{{ route('front.product.show', $wish->product->id) }}">
                            <img
                                src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                class="h-28 w-full rounded-lg object-cover" alt="">
                        </a>
                    @else
                        <a href="{{ route('front.product.show', $wish->product->id) }}">
                            <img
                                src="{{ asset('storage/product' . '/' . $wish->product->folder . '/featured/' . $wish->product->featuredImage) }}"
                                class="h-28 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                alt="">
                        </a>
                    @endif

                    </div>


                    <div class="flex flex-col mt-6">
                        <p class="text-xs capitalize font-semibold text-gray-600">{{ $wish->product->category->title }}</p>

                        <p class="text-gray-900 font-semibold text-sm mt-2">
                            {{ $wish->product->title }}
                        </p>

                        <p class="mt-2 text-xs text-gray-500 font-bold">
                        35g
                        </p>
                        <div class="flex items-center mt-4">
                            <p class="text-greu text-sm font-bold tracking-wide">
                                ${{ App\Helpers\MbCalculate::discount($wish->product->discount, $wish->product->price) }}
                            </p>
                            <span
                                class="line-through ml-2 text-gray-600 text-xs font-semibold">${{ $wish->product->price }}</span>
                        </div>
                    </div>

                    <div class="px-4 mt-4">
                        @auth
                        @cart($wish->product->id)
                        <button disabled href="{{ route('login') }}" class="w-full py-[10px] flex items-center justify-center text-center rounded-2xl bg-white hover:bg-gray-200 hover:text-gray-900 hover:font-semibold
                        transition">
                           <p>Added</p>
                       </button>
                       @else
                       <a href="{{ route('cart.add',$wish->product->id) }}" class="w-full py-[10px] flex items-center justify-center text-center rounded-2xl bg-white hover:bg-gray-200 hover:text-gray-900 hover:font-semibold
                       transition">
                          <p>Add to Cart</p>
                      </a>

                        @endcart
                        @endauth

                        @guest
                        <a href="{{ route('login') }}" class="w-full py-[10px] flex items-center justify-center text-center rounded-2xl bg-white hover:bg-gray-200 hover:text-gray-900 hover:font-semibold
                        transition">
                           <p>Add to Cart</p>
                       </a>
                        @endguest
                    </div>

                </div>
            @empty

            @endforelse
        </div>
    </div>

    @endsection
