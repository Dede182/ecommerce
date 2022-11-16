<nav class="px-28  py-3">
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
                    <li class="px-3 border-l-[1.5px] border-black">
                        <img src="{{ asset('icon/user.png') }}" class="w-5 h-5 " alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>

        <div class="py-4 flex items-center justify-between">
        <div class="">
            <div class="bg-green-700 text-white flex items-center space-x-2 px-5 text-sm py-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                  </svg>

                <p>All Categories</p>
            </div>
        </div>
        <div class="">
            <ul class="flex items-center">
                @include('layouts.navbarsub.megaMenu')
            </ul>
        </div>
        <div class="">
            <div class="px-4 py-3 bg-green-100 text-green-800 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                  </svg>

            </div>
        </div>
    </div>
</nav>
