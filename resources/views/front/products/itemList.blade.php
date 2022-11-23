<div x-data="{ grid: true }" class="flex flex-col">
    <div class="flex items-center justify-between py-4">
        <div class="flex items-center space-x-4">
            <div class="flex items-center ">
                <p class="whitespace-nowrap text-gray-700 text-sm">Sort By &nbsp;:&nbsp; </p>
                <select id="countries"
                    class="border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-100 ">
                    <option selected>Popularity</option>
                    <option value="US">Low - High Price</option>
                    <option value="CA">High - Low Price</option>
                    <option value="FR">Average Rating</option>
                    <option value="DE">Germany</option>
                </select>
            </div>

            <div class="flex space-x-4 ">
                @if (request('category') || request('discount'))
                    <p class="flex whitespace-nowrap">Filters : </p>
                    @if (request('category'))
                        <div
                            class="px-3 py-1 rounded-lg bg-gray-100 text-sm flex items-center justify-center space-x-4">
                            <p> {{ request('category') }}</p>
                            <a href="{{ route('front.products') }}">
                                <i class="fa-solid fa-xmark text-gray-700 text-xs cursor-pointer"></i>
                            </a>
                        </div>
                    @endif


                    @if (request('discount'))

                            <div
                                class="px-3 py-1 rounded-lg bg-gray-100 text-sm flex items-center justify-center space-x-4">
                                <p class="flex items-center text-sm whitespace-nowrap"> {{ request('discount') }} OFF</p>
                                <a href="{{ route('front.products') }}">
                                    <i class="fa-solid fa-xmark text-gray-700 text-xs cursor-pointer"></i>
                                </a>
                            </div>

                    @endif


                @endif

            </div>
        </div>
        <div class="flex space-x-4">
            <button x-on:click="grid = true"
                :class="grid ?
                    'bg-greu px-3 py-1 rounded-md hover:bg-greu transition cursor-pointer active:bg-greu active:text-white ' :
                    '    px-3 py-1 rounded-md bg-gray-100 hover:bg-greu transition cursor-pointer active:bg-greu active:text-white'">
                <i class="fa-solid fa-grip-vertical"></i>
            </button>
            <button x-on:click="grid = false"
                :class="grid ?
                    'px-3 py-1 rounded-md bg-gray-100 hover:bg-greu transition cursor-pointer active:bg-greu active:text-white' :
                    'bg-greu px-3 py-1 rounded-md hover:bg-greu transition cursor-pointer active:bg-greu active:text-white '">
                <i class="fa-solid fa-grip-lines"></i>
            </button>
        </div>
    </div>

    <div x-show="grid" x-transition.duration.500ms x-transition.origin.center class="grid grid-cols-3 gap-4 relative">


        @foreach ($products as $product)
            <div class="flex flex-col w-68 bg-gray-100 py-5 rounded-lg">


                <div x-data="{ open{{ $product->id }}: false }" class="flex justify-center mb-2 px-6 relative">
                    @if (is_null($product->featuredImage))
                        <a href="{{ route('front.product.show', $product->id) }}">
                            <img @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                                src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                class="h-36 w-full rounded-lg object-cover" alt="">
                        </a>
                    @else
                        <a href="{{ route('front.product.show', $product->id) }}">
                            <img @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                                src="{{ asset('storage/product' . '/' . $product->folder . '/featured/' . $product->featuredImage) }}"
                                class="h-36 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                alt="">
                        </a>
                    @endif

                    <div x-show="open{{ $product->id }}" x-transition.duration.500ms x-transition.origin.bottom
                        @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                        class="absolute bg-white w-24 bottom-5 rounded-lg   py-1">
                        <div class="flex  justify-center px-2">
                            <a href="{{ route('front.product.show', $product->id) }}"
                                class="border-r border-black px-1">
                                <i class="fa-regular fa-eye"></i>

                            </a>
                            <a href="#" class="border-r border-black px-1">
                                <i class="fa-regular fa-heart"></i>

                            </a>
                            <a href="#" class="px-1">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="flex flex-col space-y-2 px-5 mt-5">
                    <p class="text-gray-600 text-xs capitalize font-bold">{{ $product->category->title }}</p>
                    <p class="text-sm">{{ $product->title }}</p>
                    <div class="flex items-center">
                        <div class="flex items-center pt-2">
                            @if (count($product->reviews) > 0)
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
                    </div>
                    <div class="flex items-center mt-4">
                        <p class="text-greu text-sm font-bold">
                            ${{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}
                        </p>
                        <span
                            class="line-through ml-2 text-gray-600 text-xs font-semibold">${{ $product->price }}</span>
                    </div>
                </div>
                <div class="px-4 mt-4">
                    <button
                        class="w-full rounded-md bg-greu hover:bg-green-300   flex items-center justify-center py-2 font-bold text-sm">
                        Add to Cart
                    </button>
                </div>

            </div>
        @endforeach

        <div class="flex w-full mt-7">
            <div class="">
                {{ $products->onEachSide(0)->links() }}

            </div>

        </div>
    </div>


    {{-- Show by Column --}}
    <div x-show="!grid" x-transition.duration.500ms x-transition.origin.center class="grid grid-cols-1 gap-4 relative">


        @foreach ($products as $product)
            <div class="flex w-68 bg-gray-100 py-5 rounded-lg gap-x-4">


                <div x-data="{ open{{ $product->id }}: false }" class="flex justify-center w-[40%] mb-2 px-6 relative">
                    @if (is_null($product->featuredImage))
                        <a href="{{ route('front.product.show', $product->id) }}">
                            <img @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                                src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                class="h-36 w-full rounded-lg object-cover" alt="">
                        </a>
                    @else
                        <a href="{{ route('front.product.show', $product->id) }}">
                            <img @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                                src="{{ asset('storage/product' . '/' . $product->folder . '/featured/' . $product->featuredImage) }}"
                                class="h-36 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                alt="">
                        </a>
                    @endif

                    <div x-show="open{{ $product->id }}" x-transition.duration.500ms x-transition.origin.bottom
                        @mouseover="open{{ $product->id }} =true" @mouseout="open{{ $product->id }} =false"
                        class="absolute bg-white w-24 bottom-20 rounded-lg   py-1">
                        <div class="flex  justify-center px-2">
                            <a href="{{ route('front.product.show', $product->id) }}"
                                class="border-r border-black px-1">
                                <i class="fa-regular fa-eye"></i>

                            </a>
                            <a href="#" class="border-r border-black px-1">
                                <i class="fa-regular fa-heart"></i>

                            </a>
                            <a href="#" class="px-1">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="flex flex-col space-y-2 px-3 w-full">
                    <p class="text-gray-600 text-xs capitalize font-bold">{{ $product->category->title }}</p>
                    <p class="text-sm">{{ $product->title }}</p>
                    <p class="text-sm"> {{ Str::words($product->description, 30, '...') }}</p>
                    <div class="flex items-center">
                        <div class="flex items-center pt-2">
                            @if (count($product->reviews) > 0)
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
                    </div>
                    <div class="flex items-center mt-4">
                        <p class="text-greu text-sm font-bold">
                            ${{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}
                        </p>
                        <span
                            class="line-through ml-2 text-gray-600 text-xs font-semibold">${{ $product->price }}</span>
                    </div>
                    <div class="mt-3 w-40 ">
                        <button
                            class="w-full rounded-md bg-greu hover:bg-green-300   flex items-center justify-center py-2 font-bold text-sm">
                            Add to Cart
                        </button>
                    </div>
                </div>

            </div>
        @endforeach

        <div class="flex w-full mt-7 pag">
            <div class="pag">
                {{ $products->onEachSide(1)->links() }}

            </div>

        </div>
    </div>
</div>
