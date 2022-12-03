<div class="   space-x-2 w-40  flex first-line: items-center   rounded-lg ml-4" >
    <div
    x-data="{ open: false }"


    class="font-semibold relative">
        <div
       @mouseover="open = true"
        class="flex items-center flex-row-reverse cursor-pointer duration-1000 hover:text-green-500 focus:text-green-500 w-full selection: text-xs">
        <i class="fa-solid fa-chevron-down ml-2"></i>

        <p class="text-xs flex flex-nowrap link link-underline link-underline-black pb-1">All Categories</p>
        </div>
        <div
        x-show="open"
        x-transition.duration.500ms
        x-transition.origin.top
        @click.away = "open=false"
        @keydown.escape.window="open=false"
        class="absolute top-10 -left-[75px] bg-white shadow-2xl z-20 rounded-lg w-60 hidden"
        id="categories">
            <div class="flex space-x-10 px-10 pb-6 pt-4">
                <div class="flex-col">
                    <h3 class="text-green-500 text-sm">All Categories</h3>
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
@push('script')
<script>
     const categories = document.getElementById('categories');
    function buzz(){
        categories.classList.remove('hidden')
    }
    setTimeout(buzz,2000)
</script>

@endpush
