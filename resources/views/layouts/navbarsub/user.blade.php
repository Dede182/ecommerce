<li class="px-3 border-l-[1.5px] border-black">


    <div x-data="{ open: false }" class="font-semibold relative">

        <div x-on:click="open = ! open"
            class="flex items-center cursor-pointer hover:text-green-500 focus:text-green-500">
            <img src="{{ asset('default user.jpg') }}" class="w-6 h-6 rounded-full object-cover" alt="">
            @auth
                <div class="flex items-center justify-center">
                    <div class="avatar ">

                        <p class=" pl-2 text-sm pt-1 text-black font-Sono capitalize">{{ Auth::user()->name }}</p>
                    </div>
                </div>
            @endauth
        </div>
        <div x-show="open" x-transition.duration.500ms x-transition.origin.top
            id="userDrop"
            class="absolute top-10 -right-16 hidden bg-white shadow-2xl z-20 rounded-lg w-48">
            <div class="flex space-x-10   ">
                <div class="flex-col items-center  justify-center w-full">
                    @auth
                        <form method="POST"
                            class="flex w-full justify-start pl-4 items-center text-sm space-x-2 py-3 hover:bg-gray-200"
                            action="#">
                            @csrf
                            <i class="fa-solid fa-id-card"></i>
                            <a href="# " class=" "
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Profile') }}
                            </a>
                        </form>

                        <form method="POST"
                            class="flex w-full justify-start pl-4 items-center text-sm space-x-2 py-3 hover:bg-gray-200"
                            action="#">
                            @csrf
                            <i class="fa-solid fa-gear"></i>
                            <a href=" #" class=" "
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('setting') }}
                            </a>
                        </form>
                        @admin
                        <a href="{{ route('dashboard') }}"
                        class="flex w-full justify-start pl-6 items-center text-sm space-x-2 py-3 hover:bg-gray-200">

                        <i class="fa-solid fa-chart-simple"></i>
                        <p>Dashboard</p>
                         </a>
                        @endadmin


                        <form method="POST"
                            class="flex w-full justify-start pl-4 items-center text-sm space-x-2 py-3 hover:bg-gray-200"
                            action="{{ route('logout') }}">
                            @csrf
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="{{ route('logout') }}" class=" "
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>


                    @endauth


                    @guest
                        <a
                        class="flex w-full justify-start pl-4 items-center text-sm space-x-2 py-3 hover:bg-gray-200"
                        href="{{ route('login') }}">
                            {{ __('Log in') }}</a>

                            <a
                            class="flex w-full justify-start pl-4 items-center text-sm space-x-2 py-3 hover:bg-gray-200"
                            href="{{ route('register') }}">
                                {{ __('Register') }}</a>
                    @endguest
                </div>


            </div>
        </div>
    </div>
</li>
@push('script')
    <script>
         const userDrop = document.getElementById('userDrop');
    function buzz(){
        userDrop.classList.remove('hidden')
    }
    setTimeout(buzz,2000)
    </script>

@endpush
