@extends('front')
@section('content')
<div class="px-28 py-2  h-[100vh]">
    {{-- main --}}
    <div class="flex flex-col font-Mukta ">
        {{-- banner --}}
       @include('front.banner')
       @include('front.subbanner')
    </div>
</div>

@endsection
