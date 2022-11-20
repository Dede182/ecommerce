<li class="px-3 border-l-[1.5px] border-black">


    <div
    x-data="{ open: false }"
    class="font-semibold relative">

        <div
        x-on:click="open = ! open"
        class="flex items-center cursor-pointer hover:text-green-500 focus:text-green-500">
        <img src="{{ asset('icon/user.png') }}" class="w-5 h-5 " alt="">
        </div>
        <div
        x-show="open"
        x-transition.duration.500ms
        x-transition.origin.top
        class="absolute top-10 -right-10  bg-white shadow-2xl z-20 rounded-lg w-60">
            <div class="flex space-x-10 px-10 pb-6 pt-4">
                <div class="flex-col">
                   @auth
                    logout
                   @endauth
                   @guest
                       login
                   @endguest
                </div>


            </div>
        </div>
    </div>
</li>
