<div x-show="random" @click.away="random = false" @keydown.escape.window="random=false"
    class="fixed   left-1/2 transform -translate-x-1/2 translate-y-1/3 z-40">
    <div class="bg-white w-[30vw] h-[60vh] rounded-lg shadow-sm  relative">
        <div class="flex flex-col px-6 py-7 space-y-7">
            <div class="flex flex-col">
                <p class="text-xl text-gray-800 font-semibold">Deal Today</p>
                <p class="text-gray-700 text-sm">Recommend deals for you</p>
            </div>
            @foreach ($randomProducts as $key=>$product  )
            <form id="randomBuzz{{ $key }}" action="{{ route('front.product.show',$product->id ) }}" class="hidden">

            </form>

            @endforeach
            <div class="h-[430px] flex flex-col overflow-hidden hover:overflow-y-scroll scrollbar-hide space-y-6 text-black">
                {{-- random products are from app service provider --}}

                @foreach ($randomProducts as $key=>$product)


                        <button form="randomBuzz{{ $key }}" class="flex space-x-5 px-5   py-3 rounded-lg random w-full h-full" >
                            <div class="">
                                @if (is_null($product->featuredImage))
                                    <a href="{{ route('front.product.show', $product->id) }}">
                                        <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                            class="w-16 h-16 rounded-lg object-cover" alt="">
                                    </a>
                                @else
                                    <a href="{{ route('front.product.show', $product->id) }}">
                                        <img src="{{ asset('storage/product' . '/' . $product->folder . '/featured/' . $product->featuredImage) }}"
                                            class="w-16 h-16 rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                            alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center">
                                <p>{{ $product->title }}</p>
                                <div class="flex items-center space-x-3">
                                    <p class="text-gray-700 text-sm">
                                        ${{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}
                                    </p>
                                    <p class="text-red-500 line-through text-xs">{{ $product->price }}</p>
                                </div>
                            </div>
                        </button>


                @endforeach
            </div>

            <button
            @click="random = false"
                class="absolute -top-10 -right-3 flex items-center justify-center w-7 h-7 bg-greu text-white rounded-md">
                <i class="fa-solid fa-xmark p-0 m-0   cursor-pointer"></i>
            </button>
        </div>

    </div>
</div>
