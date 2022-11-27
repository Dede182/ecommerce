<div class="bg-green-700   flex items-center space-x-2 px-5 py-3 rounded-lg">
    <div
    x-data="{ open: false }"


    class="font-semibold relative">
        <div
        @click="open = ! open"
        class="flex items-center cursor-pointer hover:text-green-500 focus:text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
          </svg>

        <p>All Categories</p>
        </div>
        <div
        x-show="open"
        x-transition.duration.500ms
        x-transition.origin.top
        @click.away="open =false"
        @keydown.escape.window="open=false"
        class="absolute top-10 -left-[75px] bg-white shadow-2xl z-20 rounded-lg w-60">
            <div class="flex space-x-10 px-10 pb-6 pt-4">
                <div class="flex-col">
                    <h3 class="text-green-500">All Categories</h3>
                    <ul>

                        @foreach ($categories as $cata)
                        <li>
                            <form  action = "{{ route('front.products') }}" id ="category{{ $cata->id }}">

                            </form>
                                <input form="category{{ $cata->id }}" hidden value ="{{ $cata->title }}" name="category">
                                <button form ="category{{ $cata->id }}"
                                    class="link link-underline link-underline-black text-gray-700 text-sm capitalize">
                                    <p>
                                        {{ $cata->title }}
                                    </p>

                                </button>
                        </li>

                        @endforeach


                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
