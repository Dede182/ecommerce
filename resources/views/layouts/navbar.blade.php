<nav class="px-16 2xl:px-28  pt-4 py-2 sticky top-0 z-30  bg-white w-full shadow-md ">
    <div class="flex ">
        <div class="flex  items-center font-bold font-Mukta text-2xl mt-1">
            <a href="{{ route('front') }}" class="text-green-700 pb-1">Fast</a><a class="pb-1" href="{{ route('front') }}">Kart</a>

            <div class="">
                @include('layouts.navbarsub.categories')
            </div>


            <div class="flex space-x-4 items-center">
                <a href = "{{ route('front.products') }}" class="text-[13px] text-gray-600 hover:text-gray-900 transition flex flex-nowrap whitespace-nowrap">All Products</a>
            </div>
        </div>
        <div class=" flex items-center w-full justify-end">
            <div class="">
                <form action="#" class="flex text-sm space-x-0">
                    <input class="px-3 py-2 w-80 rounded-l-md text-xs placeholder:text-gray-500" type="text"
                        placeholder="I am searching for..">
                    <button class="border rounded-r-md px-3 border-green-700 bg-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#fff" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="ml-4">
                <ul class="flex items-center">
                    <a href="#" class="px-3  border-black">
                        <i class="fa-solid fa-phone text-lg hover:text-red-700 transition cursor-pointer w-4 h-4 "></i>
                    </a>
                    <a href="{{ route('wishlist.index') }}" class="px-3 border-l-[1.5px] border-black">
                        <i class="fa-regular fa-heart   hover:text-red-700 transition cursor-pointer w-4 h-4 "></i>
                    </a>
                    <a href="{{ route('cart.index') }}" class="px-3 border-l-[1.5px] border-black relative">
                        @auth
                        @if (isset($carts->cartproducts))
                        @if(count($carts->cartproducts)>0)
                        <span class="absolute -bottom-2 right-[3px] w-4 h-4 text-white text-xs flex items-center justify-center bg-red-500
                        rounded-full">
                            {{ count($carts->cartproducts) }}
                        </span>
                         @endif
                        @endif

                        @endauth
                        <i class="fa-solid fa-cart-shopping w-4 h-4   hover:text-greu transition cursor-pointer"></i>

                    </a>
                    @include('layouts.navbarsub.user')
                    <div class="">
                        @include('layouts.randomBuzz')
                      </div>
                </ul>
            </div>
        </div>
    </div>
        <div class="py-2 flex items-center justify-between  ">



    </div>
</nav>
