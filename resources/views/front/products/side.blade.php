<div class="flex flex-col space-y-8">

    <div class="">
        <div id="accordion-collapse" data-accordion="collapse" class="w-full">
            <h2 id="accordion-collapse-heading-1" class=" !flex !items-center  !justify-between w-full">
                <div class="flex items-center space-x-3">
                    <h3 class=" Category relative w-fit">Categories</h3>
                </div>


                <button type="button" class="!bg-gray-100 !rounded-full"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1">

                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class=" mt-3 w-full transition"
                aria-labelledby="accordion-collapse-heading-1">
                <div class="flex flex-col pt-5">
                    <div class="flex flex-col space-y-2 h-[200px]    overflow-y-scroll">
                        @foreach ($categories as $cata)
                            <form action="{{ route('front.products') }}" id="category{{ $cata->id }}">

                            </form>
                            <input form="category{{ $cata->id }}" hidden value="{{ $cata->title }}"
                                name="category">
                            <button form="category{{ $cata->id }}" href="#"
                                class="flex capitalize justify-between space-y-2 text-gray-600">
                                <p>
                                    {{ $cata->title }}
                                </p>
                                <span class="pr-2">({{ count($cata->products) }})</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Price --}}
    {{-- <div class="">
        <div id="accordion-collapse" data-accordion="collapse" class="w-full">
            <h2 id="accordion-collapse-heading-2" class=" !flex !items-center  !justify-between w-full">
                <div class="flex items-center space-x-3">
                    <h3 class=" Category relative w-fit">Price</h3>
                </div>


                <button type="button" class="!bg-gray-100 !rounded-full"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">

                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class=" mt-3 w-full transition"
                aria-labelledby="accordion-collapse-heading-1">

                <div class="w-full text-gray-500 text-sm">
                    <p>Price between $0 & $<span id="maxPrice">10</span></p>
                    <input type="range" list="tickmarks" id="range" value="50" min="0" max="3000"
                        class="w-full !text-greu">

                </div>


            </div>

        </div>


    </div> --}}
    {{--  Pricing --}}
    <div class="">
        <div id="accordion-collapse" data-accordion="collapse" class="w-full">
            <h2 id="accordion-collapse-heading-3" class=" !flex !items-center  !justify-between w-full">
                <div class="flex items-center space-x-3">
                    <h3 class=" Category relative w-fit">Pricing</h3>
                </div>


                <button type="button" class="!bg-gray-100 !rounded-full"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">

                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class=" mt-3 w-full transition"
                aria-labelledby="accordion-collapse-heading-1">

                <div class="w-full text-gray-800 text-sm flex flex-col space-y-4 pt-3">

                    @php
                        $prices = ["$500", "$500 & $1000", "$1000 & $2000", "$2000"];
                        if(request('pricing')){
                            $re = request('pricing');
                        }
                    @endphp
                    @foreach (range(1, 4) as $i)
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-3">
                                <input type="radio" name="pricing" form="filter" value="{{ $prices[$i - 1] }}"
                                    class="w-4 h-4 text-green-700 bg-gray-100 border-gray-300 focus:ring-green-700
                                 focus:ring-2  "
                                 @if(request('pricing'))

                                    @if($re === $prices[$i-1])
                                        checked
                                    @endif
                                 @endif
                                 >
                                @if ($loop->first)
                                    <p>Under {{ $prices[$i - 1] }}</p>
                                @elseif ($loop->last)
                                    <p>Above {{ $prices[$i - 1] }}</p>
                                @else
                                    <p>Between {{ $prices[$i - 1] }}</p>
                                @endif

                            </div>


                        </div>
                    @endforeach

                </div>


            </div>

        </div>


    </div>
    {{-- Discount --}}
    <div class="">
        <div id="accordion-collapse" data-accordion="collapse" class="w-full">
            <h2 id="accordion-collapse-heading-4" class=" !flex !items-center  !justify-between w-full">
                <div class="flex items-center space-x-3">
                    <h3 class=" Category relative w-fit">Discount</h3>
                </div>


                <button type="button" class="!bg-gray-100 !rounded-full"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">

                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>

            <div id="accordion-collapse-body-4" class=" mt-3 w-full transition"
                aria-labelledby="accordion-collapse-heading-1">

                <div class="w-full text-gray-800 text-sm flex flex-col space-y-4 pt-3">

                    @php
                        $discount = ['5%', '10%', '20%', '30%', '40%'];
                        if (request('discount')) {
                            $re = request('discount');
                        }

                    @endphp

                    @foreach (range(1, 5) as $i)
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-3">
                                <input type="radio"
                                    @if (request('discount')) @if ($re === $discount[$i - 1])
                                    checked @endif
                                    @endif



                                name="discount" form="filter" value="{{ $discount[$i - 1] }}"
                                class="w-4 h-4 text-green-700 bg-gray-100 border-gray-300 focus:ring-green-700
                                 focus:ring-2  "
                                id="">
                                <p>above {{ $discount[$i - 1] }}</p>
                            </div>
                            <div class="text-xs text-gray-500 font-semibold">
                                ({{ $Discount[$i - 1] }})
                            </div>

                        </div>
                    @endforeach

                </div>


            </div>

        </div>


    </div>
    <div class="flex justify-between">
        <div class="">
            @if (request('category'))
                <input hidden value={{ request('category') }} name="category" form="filter">
            @endif
            <form action="{{ route('front.products') }}" id="filter">

            </form>
        </div>
        <button form="filter" class="px-5 py-1 text-sm text-white bg-greu hover:bg-green-700 rounded-sm">
            Filter
        </button>
    </div>
</div>
@push('script')
    <script>
        const tickmarks = document.getElementById('tickmarks');
        const range = document.getElementById('range');
        const maxPrice = document.getElementById('maxPrice');

        range.addEventListener('change', (e) => {
            console.log(range.value)
            maxPrice.innerText = range.value;
        })
    </script>
@endpush
