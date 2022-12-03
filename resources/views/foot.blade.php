<div class="w-full bg-[#808080] px-16 2xl:px-28  pt-12 pb-5 mt-10 bg-opacity-10  ">
    <div class="flex flex-col w-full tracking-tight">
        <div class="flex space-x-5 items-center justify-between pb-12 border-b border-dotted border-gray-400 border-opacity-70">
            <div class="flex items-center space-x-3 text-gray-600  border-r pr-9 border-dashed border-black">
                <i class="fa-solid fa-wheat-awn-circle-exclamation w-7 h-7"></i>
                <p class="tracking-tight text-gray-800">Every Fresh Products</p>
            </div>

            <div class="flex items-center space-x-3 text-gray-600  border-r pr-9 border-dashed border-black">
                <i class="fa-solid fa-truck w-7 h-7"></i>
                <p class="tracking-tight text-gray-800">Free Delivery For Order Over $50</p>
            </div>

            <div class="flex items-center space-x-3 text-gray-600  border-r pr-9 border-dashed border-black">
                <i class="fa-solid fa-percent w-7 h-7"></i>
                <p class="tracking-tight text-gray-800">Daily Mega Discounts</p>
            </div>
            <div class="flex items-center space-x-3 text-gray-600   pr-9 ">
                <i class="fa-solid fa-hand-holding-dollar w-7 h-7"></i>
                <p class="tracking-tight text-gray-800">Best Prices on the market</p>
            </div>

        </div>

        <div class="flex mt-10 h-[40vh] 2xl:h-[30vh] justify-between border-b border-dotted border-gray-400 border-opacity-70 pb-10">
            <div class="flex flex-col h-full justify-between">
                <div class="flex w-40 items-center font-bold font-Mukta text-2xl">
                    <p class="text-green-700">Fast</p><span>kart</span>
                </div>
                <div class="w-60 mt-2 text-gray-600">
                    <p>We are a friendly bar serving a variety of cocktails, wines and beers. Our bar is a perfect place for a couple.</p>
                </div>
                <div class="flex items-center w-60 text-gray-600 mt-5">

                    <p class="text-xs font-semibold"><i class="fa-solid fa-house w-4 h-4"></i> 1418 Riverwood Drive, CA 96052, US</p>
                </div>

                <div class="flex items-center w-60 text-gray-600 mt-5">
                    <p class="text-xs font-semibold"><i class="fa-regular fa-envelope w-4 h-4 mr-1"></i>support@fastcart.com</p>
                </div>
            </div>


            <div class="flex flex-col h-full ">
                <h3 class="text-gray-800 font-semibold pb-4">Categories</h3>
                <div class="flex flex-col h-full justify-between">
                    @foreach ($categories as $cata)
                   <p class="text-gray-500 text-xs capitalize font-semibold">{{ $cata->title }}</p>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col h-full">
                <h3 class="text-gray-800 font-semibold pb-4">Useful Links</h3>
                <div class="flex flex-col h-full justify-between">

                   <p class="text-gray-500 text-xs capitalize font-semibold">Home</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Shop</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">About us</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Blog</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Contact us</p>

                </div>
            </div>

            <div class="flex flex-col h-full">
                <h3 class="text-gray-800 font-semibold pb-4">Help Center</h3>
                <div class="flex flex-col h-full justify-between">

                   <p class="text-gray-500 text-xs capitalize font-semibold">Your order</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Your account</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Your wishlist</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">Your cart</p>
                   <p class="text-gray-500 text-xs capitalize font-semibold">FAQ</p>

                </div>
            </div>

            <div class="flex flex-col h-full w-60">
                <h3 class="text-gray-800 font-semibold ">Contact us</h3>
                <div class="flex flex-col border-b border-dashed border-gray-500 pb-6">
                    <div class="flex items-center w-60 text-gray-600 mt-3">
                        <p class="text-xs font-semibold"><i class="fa-solid fa-phone w-4 h-4 mr-3"></i>Hotline 24/7</p>
                    </div>
                    <p class="text-xs font-semibold ml-5 text-gray-600 ">+959976106294</p>
                </div>

                <div class="flex flex-col border-b border-dashed border-gray-500 pb-4">
                    <div class="flex items-center w-60 text-gray-600 mt-3">
                        <p class="text-xs font-semibold"><i class="fa-regular fa-envelope w-4 h-4 mr-3"></i>Email address</p>
                    </div>
                    <p class="text-xs font-semibold ml-7 text-gray-600 ">FastKart@gmail.com</p>
                </div>

            </div>
        </div>

        <div class="flex justify-between pt-4 items-center">
            <p class="text-gray-600 text-xs ">©2022 Fastkart All rights reserved</p>

            <div class="flex items-center space-x-3">
                <img src="{{ asset('icon/001-visa.png') }}" class="w-8 h-8 grayscale " alt="">
                <img src="{{ asset('icon/003-paypal.png') }}" class="w-8 h-8 grayscale " alt="">
                <img src="{{ asset('icon/002-credit-card.png') }}" class="w-8 h-8 grayscale " alt="">
                <img src="{{ asset('icon/004-symbol.png') }}" class="w-8 h-8 grayscale " alt="">
            </div>

            <div class="flex items-center  text-gray-600">
                <p class=" text-xs text-gray-700">Stay connected : </p>
                <i class="fa-brands fa-facebook-f w-3 h-3 ml-2"></i>
                <i class="fa-brands fa-twitter w-3 h-3 ml-2"></i>
                <i class="fa-brands fa-instagram w-3 h-3 ml-2"></i>
                <i class="fa-brands fa-pinterest-p w-3 h-3 ml-2"></i>
            </div>
        </div>
    </div>
</div>
