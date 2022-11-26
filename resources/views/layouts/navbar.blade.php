<nav class="px-16 2xl:px-28  py-2 sticky top-0 z-30  bg-white w-full shadow-sm ">
    <div class="flex">
        <div class="flex w-40 items-center font-bold font-Mukta text-2xl">
            <p class="text-green-700">Fast</p><span>Kart</span><span class="text-green-700">.</span>
        </div>
        <div class=" flex items-center w-full justify-end">
            <div class="">
                <form action="#" class="flex text-sm space-x-0">
                    <input class="px-3 py-2 w-80 rounded-l-md text-sm placeholder:text-gray-500" type="text"
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
                <ul class="flex ">
                    <li class="px-3">
                        <img src="{{ asset('icon/telephone-call.png') }}" class="w-5 h-5 " alt="">
                    </li>
                    <li class="px-3 border-l-[1.5px] border-black">
                        <img src="{{ asset('icon/heart.png') }}" class="w-5 h-5 " alt="">
                    </li>
                    <li class="px-3 border-l-[1.5px] border-black">
                        <img src="{{ asset('icon/shopping-cart.png') }}" class="w-5 h-5 " alt="">
                    </li>
                    @include('layouts.navbarsub.user')
                </ul>
            </div>
        </div>
    </div>
        <div class="py-2 flex items-center justify-between  ">
        <div class="">
            @include('layouts.navbarsub.categories')
        </div>
        <div class="">
            <ul class="flex items-center">
                @include('layouts.navbarsub.megaMenu')
            </ul>
        </div>
        <div class="">
          @include('layouts.randomBuzz')
        </div>
    </div>
</nav>
