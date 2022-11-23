@extends('front')
@section('content')
<div class="flex justify-between items-center px-16 2xl:px-28 py-8 bg-gray-100 font-Mukta">
    <div class="font-Inter font-bold cap">
        Shop List
    </div>
    <div class="flex items-center capitalize">
        <x-breadcrumb :first="true" firstRoute="{{ route('front') }}" firstCrumb="Shop" />
    </div>
</div>
<div class="px-16 2xl:px-28 h-fit pb-20 relative">
    {{--  --}}
    <div class="flex flex-col font-Mukta ">
        <div class="">
            @include('front.products.carousel')
        </div>
        <div class="flex w-full mt-16 space-x-6">
            <div class="w-[30%] lg:w-[20%]">
                @include('front.products.side')
            </div>
            <div class="w-[70%]  lg:w-[80%]">
                @include('front.products.itemList')
            </div>
        </div>
    </div>
</div>

@endsection
