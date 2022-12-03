<div class="w-full h-full sticky left-0 sidebg bg-green-600">
    <div class="py-4 px-1">

        {{-- header --}}
        <div class="px-3">
            <div class="mb-6 font-Inter">
                <div class="flex ml-2 w-40 items-center font-bold font-Mukta text-2xl">
                    <p class="text-white">Fast</p><span class="text-white">Kart</span>
                </div>
            </div>
        </div>
        {{-- header end --}}

        {{-- siderbar list --}}

        <div class="flex flex-col justify-center text-white font-bold font-Mukta ">
            @include('dashboard.sidebarComponent.Dashborad')
            @include('dashboard.sidebarComponent.product')
            @include('dashboard.sidebarComponent.category')
            @include('dashboard.sidebarComponent.orderlist')
        </div>

        {{-- sidebar list end --}}
    </div>
</div>
