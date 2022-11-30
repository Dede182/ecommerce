@extends('front')
@section('content')

<div class="px-16 2xl:px-28  py-2   relative">

    <div class="flex flex-col font-Mukta ">
        {{-- banner --}}
       @include('front.banner')
       @include('front.subbanner')
        @include('front.hero')


    </div>
</div>


@push('script')
<script>
    const some = "htet shine htwe";
</script>

@endpush
@endsection
