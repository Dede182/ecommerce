<div class="w-full h-fit py-3 bg-gray-100 rounded-md">
    <div class="flex flex-col space-y-5 px-4">
        <h3 class=" Category relative w-fit">Category</h3>

        <div class="flex flex-col  space-y-4">
            @foreach ($categories as $cata)
            <div class="">
                <p></p>
                <a href="#" class="link link-underline link-underline-black text-gray-700 text-sm capitalize">{{ $cata->title }}</a>
            </div>
            @endforeach
        </div>
    </div>

</div>

<div class="mt-8 relative">
    <img src="{{ asset('banner/11.jpg') }}" class=" rounded-lg" alt="">
    <div class="absolute top-16 pl-5">
        <div class="flex flex-col">
            <p class="text-yellow-300 text-lg tracking-wider">Organic</p>
            <div class="text-greu text-2xl font-extrabold font-Sono">FRESH</div>
            <div class="text-2xl uppercase">Vegetables</div>
            <p class="text-gray-600 text-xs">Super offer to 50% OFF</p>

            <button class="text-white w-24 text-xs py-2 mt-4 bg-red-500 rounded-lg">
                Shop Now <i class="fa-solid fa-arrow-right ml-1 pt-1"></i>
            </button>
        </div>
    </div>
</div>
