@extends('front')
@section('content')

<div class="px-16 2xl:px-28  py-2 h-[400vh] relative">

    <div class="flex flex-col font-Mukta ">
        {{-- banner --}}
       @include('front.banner')
       @include('front.subbanner')
        @include('front.hero')
    </div>
</div>

@endsection
