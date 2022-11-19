<x-app-layout>


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white w-full rounded-lg px-3 pt-3 pb-10">
                {{-- breadcrumb --}}
                <div class="flex justify-between px-3 py-3">
                    <div class="flex items-center font-semibold">

                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </a>


                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                        <a href="{{ route('product.index') }}" class="font-Merriweather text-xs">Products</a>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                        <a class="font-Merriweather text-xs">{{ $product->title }}</a>
                    </div>
                </div>

                <div class="flex pt-8">
                    <div class="w-[40%]">
                        <div class="flex flex-col space-y-6">
                            <div class="flex px-6">
                                @if (count($product->productImages) >0)
                                <img id="mainImage"
                                 src="{{ asset('storage/'.Auth::user()->name.'/'.$product->title.'/main/'.$product->productImages[0]->productImage) }}"
                                    class="w-80 h-80 object-cover rounded-md mainImage" alt="">

                                    @else
                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                    class="w-80 h-80 object-cover rounded-md mainImage" alt="">
                                @endif
                            </div>

                            <div class="flex space-x-10 px-3 hover:overflow-x-scroll overflow-hidden pb-3 w-[90%]">
                                @if (count($product->productImages) >0)
                                    @foreach ($product->productImages as $key=>$pro)
                                    <img id = {{ $key }}
                                    onclick="mainImage.setAttribute('src','{{ asset('storage/'.Auth::user()->name.'/'.$product->title.'/main/'.$product->productImages[$key]->productImage) }}')"

                                    src="{{ asset('storage/'.Auth::user()->name.'/'.$product->title.'/main/'.$pro->productImage) }}"
                                    class="w-14 h-14 object-cover rounded-md cursor-pointer slideImage" alt="">
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
                                    <a class="ml-3 flex items-center" href="#">
                                        <button class="flex font-medium font-Mukta items-center text-blue-800 hover:text-blue-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                              </svg>
                                              <p>Edit</p>
                                        </button>
                                    </a>
                                </div>
                            </div>

                            <div class="flex justify-between ">
                                <div class="flex">
                                    <p class="w-20">Price :</p>
                                    <div class="flex">
                                        <span class="font-Mukta">$</span>
                                        <p>{{ $product->price }}</p>
                                    </div>
                                </div>

                                <div class="flex space-x-4 items-center">

                                    {{-- star --}}
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>First star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Second star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Third star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fourth star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <title>Fifth star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    </div>

                                    <p class="text-sm font-Mukta text-gray-500">23 Customer Review</p>
                                </div>
                            </div>

                            <div class="text-gray-700">
                                <p>
                                    {{ $product->description }}
                                </p>
                            </div>

                            <div class="">

                                <div class="mb-4 border-b pb-1 border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap items-center text-sm  text-center" id="myTab"
                                        data-tabs-toggle="#myTabContent" role="tablist">
                                        <li class="mr-2" role="presentation">
                                            <button class="w-32 py-2 bg-gray-200 focus:text-black  rounded-md" id="Detail-tab"
                                                data-tabs-target="#Detail" type="button" role="tab"
                                                aria-controls="Detail" aria-selected="false">Another Details</button>
                                        </li>
                                        <li class="mr-2" role="presentation">
                                            <button
                                                class="w-32 py-2 bg-gray-200 focus:text-black  rounded-md"
                                                id="review-tab" data-tabs-target="#review" type="button"
                                                role="tab" aria-controls="review"
                                                aria-selected="false">Review</button>
                                        </li>

                                    </ul>
                                </div>

                                <div id="myTabContent">
                                    {{-- detail --}}
                                    <div class="hidden p-4 bg-gray-50 rounded-lg font-Mukta dark:bg-gray-800  " id="Detail"
                                        role="tabpanel" aria-labelledby="Detail-tab">
                                        <div class="flex flex-col space-y-4">
                                            <div class="flex bg-gray-200 px-3 rounded-lg hover:brightness-105 transition">
                                                <p class="w-[40%] border-r-2 py-2 border-gray-100">Item stocks</p>
                                                <span class="px-4 py-2 text-gray-700"> {{ $product->stock }}</span>
                                            </div>

                                            <div class="flex bg-gray-200 px-3 rounded-lg hover:brightness-105 transition">
                                                <p class="w-[40%] border-r-2 py-2 border-gray-100">Order received</p>
                                                <span class="px-4 py-2 text-gray-700"> 4 </span>
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
            slide.addEventListener('click',(e)=>{
                const index = e.target.id;
                console.log(slide.id);

            })
        })
    </script>

    @endpush
</x-app-layout>
