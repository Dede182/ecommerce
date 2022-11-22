@extends('front')

@section('content')
    <div class="flex justify-between items-center px-16 2xl:px-28 py-8 bg-gray-100 font-Mukta">
        <div class="font-Inter font-bold cap">
            {{ $product->title }}
        </div>
        <div class="flex items-center capitalize">
            <x-breadcrumb :first="true" firstRoute="{{ route('product.index') }}" firstCrumb="product" :second="true"
                :secondCrumb="$product->title" />
        </div>
    </div>

    <div class="flex">
        <div class="flex flex-col pl-16 2xl:pl-28 pr-16 py-8 space-y-6 w-[75%]">
            {{-- imgsection start --}}
            <div class="flex space-x-6">
                <div class="w-[55%]">
                    <div class="flex  space-x-6">
                        <div
                            class="flex flex-col space-y-10 px-3 hover:overflow-y-scroll overflow-hidden scrollbar-hide pb-3 h-[400px]">
                            @if (count($product->productImages) > 0)
                                @foreach ($product->productImages as $key => $pro)
                                    <img id={{ $key }}
                                        onclick="mainImage.setAttribute('src','{{ asset('storage/product' . '/' . $product->folder . '/main/' . $product->productImages[$key]->productImage) }}')"
                                        src="{{ asset('storage/product' . '/' . $product->folder . '/main/' . $pro->productImage) }}"
                                        class="w-16 h-16 object-cover border border-gray-200  rounded-md cursor-pointer slideImage"
                                        alt="">
                                @endforeach
                            @else
                                {{-- if no images  --}}
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="">
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="">
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="">
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="">
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="">
                            @endif


                        </div>

                        <div class="flex ">
                            @if (count($product->productImages) > 0)
                                <img id="mainImage"
                                    src="{{ asset('storage/product' . '/' . $product->folder . '/main/' . $product->productImages[0]->productImage) }}"
                                    class="w-80 h-80 object-cover rounded-md mainImage" alt="">
                            @else
                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-80 h-80 object-cover rounded-md mainImage" alt="">
                            @endif
                        </div>
                    </div>
                </div>

                {{-- img section end --}}

                <div class="w-[65%] flex space-x-5 ">
                    <div class="w-[100%] ">
                        <div class="flex flex-col">

                            <div class="flex flex-col pb-3 border-b ">
                                @if (isset($product->discount))
                                    <div
                                        class="bg-red-200 bg-opacity-70 px-5 text-xs py-2 w-fit rounded-lg font-semibold text-red-400 mb-5">
                                        <p>{{ $product->discount }}% OFF</p>
                                    </div>
                                @endif
                                <div class="">
                                    <h3 class="text-3xl font-bold capitalize">
                                        {{ $product->title }}
                                        {{ $product->title }}
                                    </h3>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center mt-4">
                                        <p class="text-greu text-md font-bold">
                                            ${{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}
                                        </p>
                                        <span
                                            class="line-through ml-2 text-gray-600 text-sm font-semibold">${{ $product->price }}</span>
                                        @if (isset($product->discount))
                                            <span class="text-greu ml-2 font-bold text-xs">({{ $product->discount }}%
                                                Off)</span>
                                        @endif
                                    </div>

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

                                <div class="whitespace-pre-line">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolorem
                                        exercitationem aperiam tempore odio? Voluptatum fugit sapiente nesciunt, modi
                                        tempora vel suscipit?</p>
                                </div>
                            </div>

                            <div class="flex flex-col mt-4 pb-3 border-b">
                                <div class="flex">
                                    <div class="w-40">

                                    </div>
                                    <button class="bg-gray-900 text-white w-full rounded-lg py-2">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="flex mt-3">
                                    <button class="flex space-x-1 text-gray-700 items-center text-xs">
                                        <i class="fa-regular fa-heart"></i>
                                        <p>Add To WishList</p>
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div class="flx flex-col mt-4 border-b pb-2">
                            <p class="text-sm text-gray-600 font-semibold">Guaranteed Safe Checkout</p>
                            <div class="flex space-x-3">
                                <img src="{{ asset('icon/001-visa.png') }}" class="w-8 h-8 " alt="">
                                <img src="{{ asset('icon/003-paypal.png') }}" class="w-8 h-8 " alt="">
                                <img src="{{ asset('icon/002-credit-card.png') }}" class="w-8 h-8 " alt="">
                                <img src="{{ asset('icon/004-symbol.png') }}" class="w-8 h-8 " alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full">
                <div class="mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap items-center text-sm  text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="w-32 py-2 bg-gray-200 font-bold focus:text-black  rounded-md"
                                id="description-tab" data-tabs-target="#description" type="button" role="tab"
                                aria-controls="description" aria-selected="false">Description</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="w-32 py-2 bg-gray-200 font-bold focus:text-black  rounded-md"
                                id="Detail-tab" data-tabs-target="#Detail" type="button" role="tab"
                                aria-controls="Detail" aria-selected="false">Another Details</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="w-32 py-2 bg-gray-200 font-bold focus:text-black  rounded-md"
                                id="review-tab" data-tabs-target="#review" type="button" role="tab"
                                aria-controls="review" aria-selected="false">Review</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">
                    {{-- description --}}
                    <div class="hidden p-4 bg-gray-50 rounded-lg font-Mukta dark:bg-gray-800  "
                        id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="flex flex-col space-y-4">
                           {{ $product->description }}
                        </div>
                    </div>
                    {{-- detail --}}
                    <div class="hidden p-4 bg-gray-50 rounded-lg font-Mukta dark:bg-gray-800  "
                        id="Detail" role="tabpanel" aria-labelledby="Detail-tab">
                        <div class="flex flex-col space-y-4">
                            <div
                                class="flex bg-gray-200 px-3 rounded-lg hover:brightness-105 transition">
                                <p class="w-[40%] border-r-2 py-2 border-gray-100">Item stocks</p>
                                <span class="px-4 py-2 text-gray-700"> {{ $product->stock }}</span>
                            </div>

                            <div
                                class="flex bg-gray-200 px-3 rounded-lg hover:brightness-105 transition">
                                <p class="w-[40%] border-r-2 py-2 border-gray-100">Order received</p>
                                <span class="px-4 py-2 text-gray-700"> 4 </span>
                            </div>

                            <div
                                class="flex bg-gray-200 px-3 rounded-lg hover:brightness-105 transition">
                                <p class="w-[40%] border-r-2 py-2 border-gray-100">Discount</p>
                                @if (isset($product->discount))
                                    <span class="px-4 py-2 text-green-700"> {{ $product->discount }} %
                                    </span>
                                @else
                                    <p class="px-4 py-2 text-gray-700">Coming Soon</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- review section --}}


                        @include('productReview')

                </div>
            </div>

        </div>
        <div class="w-[20%] py-8">
            <div class="flex flex-col">
                <div class="w-full py-3 px-3 bg-gray-100 rounded-lg flex flex-col">
                    <div class="mb-4">
                        <h3 class=" Category relative w-fit">Latest Products</h3>
                    </div>


                    @foreach ($latestProduct as $pro)
                        <a href="{{ route('front.product.show', $pro->id) }}" class="flex space-x-4 mb-4">
                            <div class="w-[40%]">
                                @if (is_null($pro->featuredImage))
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="h-16 w-full
                            hover:scale-110 transition
                            rounded-lg object-cover"
                                        alt="">
                                @else
                                    <img src="{{ asset('storage/product' . '/' . $pro->folder . '/featured/' . $pro->featuredImage) }}"
                                        class="h-16 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                        alt="">
                                @endif
                            </div>
                            <div class="font-bold text-sm flex flex-col w-full  pb-3 border-b">
                                <p class="text-xs whitespace-pre-line">{{ $pro->title }}</p>
                                <p class="text-greu text-md font-bold">
                                    ${{ App\Helpers\MbCalculate::discount($pro->discount, $pro->price) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
