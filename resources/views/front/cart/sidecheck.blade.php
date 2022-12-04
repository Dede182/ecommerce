<div class="w-full bg-grau-100 rounded-lg">
    <div class="flex flex-col py-4">
        <div class="pb-2 border-b w-full px-4">
            <p class="font-semibold text-lg text-gray-800">Cart Total</p>
        </div>

        <div class="flex flex-col space-y-4  px-4 text-sm text-gray-700 font-semibold py-4 border-b">
            <div class="flex w-full justify-between">
                <p class="capitalize">Subtotal</p>
                <p class="flex">$ <span class="total">{{ $total }}</span></p>
            </div>

            <div class="flex w-full justify-between">
                <p class="capitalize">Shipping</p>
                @php
                    $shipping = 6.90;
                @endphp
                <p>$<span>6.90</span></p>
            </div>

        </div>
        <div class="pb-2 flex flex-col w-full px-4 pt-3">
            <div class="flex justify-between items-center font-semibold">
                <p>Total(USD)</p>
                <p class="text-greu check">${{ $total }}</p>
            </div>
            <form action="{{ route('order.store') }}" id = "checkout" method="POST">
                @csrf
                <button class="text-white bg-red-500 hover:bg-red-400 w-full py-2 rounded-md mt-4">
                    Process To CheckOut
                   </button>
            </form>


           <a href="{{ route('front.products') }}" class=" flex items-center justify-center bg-gray-300 hover:bg-gray-400 w-full py-2 rounded-md mt-4">
            <i class="fa-solid fa-arrow-left text-xs"></i> Return To Shopping
           </a>
        </div>

    </div>
</div>
