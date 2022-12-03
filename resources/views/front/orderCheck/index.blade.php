@extends('front')
@section('content')
    <div class="px-16 2xl:px-28  py-8   relative">
        <div class="">
            <div class="flex space-x-10">
                <div class="w-[20%]">
                    <div class="relative">
                        <img src="{{ asset('banner/11.jpg') }}" class=" rounded-lg" alt="">
                        <div class="absolute top-16 pl-5">
                            <div class="flex flex-col">
                                <p class="text-yellow-300 text-lg tracking-wider">Organic</p>
                                <div class="text-greu text-2xl font-extrabold font-Sono">FRESH</div>
                                <div class="text-2xl uppercase">Vegetables</div>
                                <p class="text-gray-600 text-xs">Super offer to 50% OFF</p>

                                <button
                                    class="text-white w-24 text-xs py-2 mt-4 bg-red-500 rounded-lg hover:bg-red-800 transition ">
                                    Shop Now <i class="fa-solid fa-arrow-right ml-1 pt-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-[80%]  ">
                    <div class="flex flex-col">
                        <div class="flex justify-between items-center">
                            <h2 class="text-gray-900 font-semibold">My Orders</h2>
                            <form action="{{ route('order.history') }}" method="POST" class="hidden" id = "orderHistory">
                                @csrf
                            </form>

                            <select id="selectSort" name="history" form="orderHistory"
                                class="border border-gray-300 text-gray-900 w-20 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 bg-gray-100 ">
                                <option {{ request('history') == 5 ? 'selected' : "" }} selected name="history" value="5">5 days</option>
                                <option {{ request('history') == 30 ? 'selected' : "" }} name="history" value="30">30days</option>
                                <option {{ request('history') == 4000 ? 'selected' : "" }} name="history" value="4000">All time</option>
                            </select>
                        </div>

                        <div class="flex flex-col space-y-5 mt-8">
                            @forelse ($orders as $order)
                                <div class="w-full flex flex-col bg-grau-100 py-2 px-3 divide-y-2 rounded-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-col text-xs">
                                            <p>Order <a class="underline text-blue-500">#{{ $order->code }}</a></p>
                                            <p class="text-[14px] text-gray-600">Placed on {{ $order->created_at }}</a></p>
                                        </div>

                                        <div class="text-sm ">
                                            <a href="#" class="text-greu hover:text-green-800">
                                                Manage
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex space-x-10 py-4">
                                        {{-- img --}}
                                        <div class="">
                                            @if (is_null($order->orderitem[0]->product->featuredImage))
                                                <a
                                                    href="{{ route('front.product.show', $order->orderitem[0]->product->id) }}">
                                                    <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                                        class="h-20 w-full rounded-lg object-cover" alt="">
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('front.product.show', $order->orderitem[0]->product->id) }}">
                                                    <img src="{{ asset('storage/product' . '/' . $order->orderitem[0]->product->folder . '/featured/' . $order->orderitem[0]->product->featuredImage) }}"
                                                        class="h-20 w-full rounded-lg object-cover hover:scale-110 transition cursor-pointer"
                                                        alt="">
                                                </a>
                                            @endif

                                        </div>
                                        {{-- img end --}}

                                        <div class="flex flex-col text-sm space-y-2">
                                            <div
                                                class="text-xs w-20 h-6 flex items-center justify-center font-semibold rounded-lg
                                                @if ($order->status === 'Delivered')
                                                bg-greu
                                                @elseif ($order->status === "Cancelled")
                                                bg-red-600
                                                @else
                                                bg-yellow-400 @endif text-white">
                                                <p>{{ $order->status }}</p>
                                            </div>
                                            <p class="text-gray-800">Total : <span class="text-xs font-semibold">${{ $order->total }}</span></p>
                                            <p class="text-gray-800">Items : <span class="text-xs font-semibold">{{ count($order->orderitem) }}</span></p>
                                        </div>
                                    </div>


                                </div>
                            @empty
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@push('script')
    <script>
        const selectSort = document.getElementById('selectSort');
        const orderHistory = document.getElementById('orderHistory');
        selectSort.addEventListener('change',()=>{
            orderHistory.submit();
        })
    </script>

@endpush
@endsection
