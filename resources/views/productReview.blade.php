<div class="hidden dark:bg-gray-800" id="review" role="tabpanel" aria-labelledby="review-tab">
    {{-- Review form start --}}

    <div class="flex items-start">
        <div class="flex w-full flex-col justify-center">
            <h3>Customer Reviews</h3>
            <div class="flex items-center mt-3">
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
                <div class="flex items-center ml-4 pt-1 text-xs">
                    <p>{{ App\Helpers\MbCalculate::review($product->id) }} </p> <span> Out of 5</span>
                </div>
            </div>

            <div class="w-full">

                @foreach (range(1,5) as  $i)
                <div class="flex items-center mt-4">
                    <span class="flex items-center whitespace-nowrap text-sm font-semibold">{{ $i }} star</span>
                    <div class="w-72 h-4 mx-4 bg-gray-200 rounded dark:bg-gray-700 ">
                        <div class="h-4 bg-greu rounded relative" style="width:   {{  App\Helpers\MbCalculate::ratePerStar($product->id,$i) }}%">
                            <span class="text-xs font-medium text-white pl-4 absolute w-full flex justify-center">
                                {{  App\Helpers\MbCalculate::ratePerStar($product->id,$i) }}%</span>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="form ">
            <form action="{{ route('review.store') }}" method="POST" class="flex flex-col space-y-7">
                @csrf
                <div class="flex space-x-4">
                    <input type="text" placeholder="name" name="name" class="border-gray-400 rounded-lg">
                    <input type="email" placeholder="email" name="email" class="border-gray-400 rounded-lg">
                </div>
                <div class="flex space-x-4">
                    <input type="number" placeholder="Rating" name="rating" class="border-gray-400 rounded-lg">
                    <input type="text" placeholder="some" name ="some"class="border-gray-400 rounded-lg">
                </div>
                <div class="flex space-x-4 w-full">
                    <textarea type="text" name="description" placeholder="Review description" rows="5" class="border-gray-400 w-full rounded-lg"></textarea>
                </div>
                <div class="flex">
                    <button>Add review</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Review form send --}}

    {{-- review header start --}}
    <div class="font-Mukta py-3 w-full ">
        <p class="flex items-center">Reviews ({{ count($product->reviews) }})
            <svg aria-hidden="true" class="w-5 h-5 ml-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <title>First star</title>
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            @if (count($product->reviews) > 0)
                ( {{ App\Helpers\MbCalculate::review($product->id) }})
            @endif
        </p>
    </div>
    {{-- review header end --}}

    {{-- review body start --}}
    <div class="cmt-section py-0 pb-6 px-6 bg-gray-100 rounded-lg  max-h-[800px] overflow-y-scroll scrollbar-hide">
        <div class="comments-container relative pt-3  ">
            @forelse ($product->reviews as $review)
                <div class="comment-container  shadow-md  bg-white rounded-xl flex mt-4">

                    <div class="flex px-5 py-6 w-full items-start">
                        <a href="#" class="flex-none">
                            <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1"
                                class="w-14 h-14 rounded-xl object-cover" alt="">

                        </a>

                        <div class="mx-4  w-full">
                            <div class="">
                                <div class="text-gray-600  line-clamp-3 text-sm w-full">{{ $review->description }}
                                </div>
                                <div class="flex items-center w-full  justify-between mt-6">
                                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                        <div class="font-bold text-gray-900">
                                            {{ App\Models\User::find($review->user_id)->name }}
                                        </div>
                                        <div>&bull;</div>
                                        <div>{{ $review->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="flex items-center">
                                        @php
                                            $rating = $review->reviewStar;
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

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>



            @empty
                <p>There is no reviews with this product</p>
            @endforelse
        </div>
    </div>

    {{-- review body end --}}
</div>
