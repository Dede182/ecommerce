<x-app-layout>


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white w-full rounded-lg px-3 pt-3 pb-10">
                {{-- breadcrumb --}}

                <x-breadcrumb :first="true" firstRoute="{{ route('product.index') }}" firstCrumb="product"
                    :second="true" :secondCrumb="$product->title" />

                <div class="flex pt-8">
                    <div class="w-[40%]">
                        <div class="flex flex-col space-y-6">
                            <div class="flex px-6">
                                @if (count($product->productImages) > 0)
                                    <img id="mainImage"
                                        src="{{ asset('storage/' . Auth::user()->name . '/' . $product->folder . '/main/' . $product->productImages[0]->productImage) }}"
                                        class="w-80 h-80 object-cover rounded-md mainImage" alt="">
                                @else
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-80 h-80 object-cover rounded-md mainImage" alt="">
                                @endif
                            </div>

                            <div class="flex space-x-10 px-3 hover:overflow-x-scroll overflow-hidden pb-3 w-[90%]">
                                @if (count($product->productImages) > 0)
                                    @foreach ($product->productImages as $key => $pro)
                                        <img id={{ $key }}
                                            onclick="mainImage.setAttribute('src','{{ asset('storage/' . Auth::user()->name . '/' . $product->folder . '/main/' . $product->productImages[$key]->productImage) }}')"
                                            src="{{ asset('storage/' . Auth::user()->name . '/' . $product->folder . '/main/' . $pro->productImage) }}"
                                            class="w-14 h-14 object-cover rounded-md cursor-pointer slideImage"
                                            alt="">
                                    @endforeach
                                @else
                                    {{-- if no images  --}}
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-14 h-14 object-cover rounded-md" alt="">
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-14 h-14 object-cover rounded-md" alt="">
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-14 h-14 object-cover rounded-md" alt="">
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-14 h-14 object-cover rounded-md" alt="">
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                        class="w-14 h-14 object-cover rounded-md" alt="">
                                @endif


                            </div>
                        </div>
                    </div>
                    {{-- product information --}}
                    <div class="w-[60%] pr-5">
                        <div class="flex flex-col space-y-5 font-semibold font-Inter ">
                            <div class="flex justify-between items-center">
                                <h3 class="text-2xl  font-medium">{{ $product->title }}</h3>
                                <div class="">
                                    <a class="ml-3 flex items-center" href="{{ route('product.edit', $product->id) }}">
                                        <button
                                            class="flex font-medium font-Mukta items-center text-blue-800 hover:text-blue-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="blue" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                            <p>Edit</p>
                                        </button>
                                    </a>
                                </div>
                            </div>

                            <div class="flex justify-between ">
                                <div class="flex">
                                    @if (isset($product->discount))
                                        <div class="flex text-green-600 items-center text-2xl">
                                            <span class="font-Mukta">$</span>
                                            <p>{{ App\Helpers\MbCalculate::discount($product->discount, $product->price) }}
                                            </p>
                                            <p class="text-xs ml-3 text-gray-600 line-through">
                                                <span class="font-Mukta">$</span>
                                                {{ $product->price }}
                                            </p>
                                            <div class="flex items-center text-xs ml-3">
                                                <p>({{ $product->discount }}% off)</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex text-green-600">
                                            <span class="font-Mukta">$</span>
                                            <p>{{ $product->price }}</p>
                                        </div>
                                    @endif


                                </div>

                                <div class="flex space-x-4 items-center">

                                    {{-- star --}}
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

                                        @endif

                                    </div>

                                    <p class="text-sm font-Mukta text-gray-500">{{ count($product->reviews) }}
                                        Customer Review</p>
                                </div>
                            </div>

                            <div class="text-gray-700">
                                <p class="none whitespace-pre-wrap">{{ $product->description }}
                                </p>
                            </div>

                            <div class="">

                                <div class="mb-4 border-b pb-1 border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap items-center text-sm  text-center" id="myTab"
                                        data-tabs-toggle="#myTabContent" role="tablist">
                                        <li class="mr-2" role="presentation">
                                            <button class="w-32 py-2 bg-gray-200 focus:text-black  rounded-md"
                                                id="Detail-tab" data-tabs-target="#Detail" type="button" role="tab"
                                                aria-controls="Detail" aria-selected="false">Another Details</button>
                                        </li>
                                        <li class="mr-2" role="presentation">
                                            <button class="w-32 py-2 bg-gray-200 focus:text-black  rounded-md"
                                                id="review-tab" data-tabs-target="#review" type="button" role="tab"
                                                aria-controls="review" aria-selected="false">Review</button>
                                        </li>

                                    </ul>
                                </div>

                                <div id="myTabContent">
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
                                    @include('product.review')
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            const slideImage = document.querySelectorAll('.slideImage')
            const mainImage = document.getElementById('mainImage')

            slideImage.forEach(slide => {
                slide.addEventListener('click', (e) => {
                    const index = e.target.id;
                    console.log(slide.id);

                })
            })
        </script>
    @endpush
</x-app-layout>
