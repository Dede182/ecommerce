<div class="flex flex-col space-y-8 ">
    <div class="flex justify-between items-center w-full">
        <div class="flex flex-col">
            <div class="capitalize font-bold text-xl">
                Top Save Today
            </div>
            <div class="flex items-center space-x-2 mb-4">
                <div class="content  bg-greu leaf" ></div>
                <i class="fa-solid fa-seedling text-greu "></i>
                <div class="content  bg-greu  leaf" ></div>

            </div>
            <p class="text-gray-600 text-xs">Don't miss this opportunity at a special discount just for this week.</p>
        </div>

        <div class="">
            <button class="text-white w-36 text-xs py-2 mt-4 bg-red-500 hover:bg-red-800 transition rounded-lg">
               Show All Products <i class="fa-solid fa-arrow-right ml-1 pt-1"></i>
            </button>
        </div>
    </div>

    <div class="w-full">
        <div class="grid grid-cols-4 w-full">
            {{-- single item --}}
            @foreach ($products as $product)
            <div class="border border-gray-300 product">
                <div class="flex flex-col py-6">
                    <div
                    x-data="{ open{{ $product->id }} : false}"
                    class="flex justify-center mb-2 px-6 relative">
                        @if(is_null($product->featuredImage))

                        <img
                        @mouseover="open{{ $product->id }} =true"
                        @mouseout="open{{ $product->id }} =false"
                        src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}" class="h-36 w-full rounded-lg object-cover" alt="">
                        @else
                        <img
                        @mouseover="open{{ $product->id }} =true"
                        @mouseout="open{{ $product->id }} =false"
                        src="{{ asset('storage/product'.'/'.$product->folder.'/featured/'.$product->featuredImage) }}"
                        class="h-36 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer" alt="">

                        @endif

                        <div
                        x-show="open{{ $product->id }}"

                        x-transition.duration.500ms

                        x-transition.origin.bottom
                        @mouseover="open{{ $product->id }} =true"
                        @mouseout="open{{ $product->id }} =false"
                        class="absolute bg-white w-24 bottom-5 rounded-lg   py-1">
                            <div class="flex  justify-center px-2">
                                <a href="{{ route('front.product.show',$product->id) }}"  class="border-r border-black px-1">
                                    <i class="fa-regular fa-eye"></i>

                                </a>
                                <a href="#"  class="border-r border-black px-1">
                                    <i class="fa-regular fa-heart"></i>

                                </a>
                                <a href="#"  class="px-1">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- product detail start --}}
                    <div class="flex flex-col px-6 text-xs space-y-2 text-black">
                        <p>{{ $product->title }}</p>
                        <div class="flex items-center">
                            <p class="text-greu text-sm font-bold">${{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}</p>
                            <span class="line-through ml-2 text-gray-600 text-[14px]">{{ $product->price }}</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                @if (count($product->reviews) >0)
                                    @php
                                        $rating = App\Helpers\MbCalculate::review($product->id);
                                    @endphp

                                    @foreach (range(1, 5) as $i)
                                        @if ($rating > 0)
                                            @if ($rating > 0.5)
                                                <i class="fa fa-star text-yellow-400"></i>
                                            @else
                                                <i class="fa fa-star-half-stroke text-yellow-400"></i>
                                            @endif
                                        @else
                                            <i class="fa  fa-star text-gray-300"></i>
                                        @endif
                                        <?php $rating--; ?>
                                    @endforeach
                                @else
                                @foreach (range(1, 5) as $i)
                                <i class="fa fa-star text-yellow-400"></i>
                                @endforeach
                                @endif

                            </div>

                            <div class="text-greu text-xs font-semibold ml-3 mt-1">In Stock</div>
                        </div>

                        <button class="w-full py-[10px] text-center rounded-2xl bg-gray-200 hover:bg-gray-300 hover:text-gray-900 hover:font-bold
                         transition">
                            <p>Add to Cart</p>
                        </button>
                    </div>
                    {{-- product detail end --}}
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
