<div class="flex justify-between ">
    <div class="flex items-center font-semibold">

        <a href="{{ route('dashboard') }}">
            <i class="fa-solid fa-house pr-2"></i>
        </a>

        @if ($first)
        <i class="fa-solid fa-chevron-right pr-2"></i>

       <a href="{{ $firstRoute }}" class="  text-xs">{{ $firstCrumb }}</a>

        @endif

        @if ($second)
        <i class="fa-solid fa-chevron-right px-2"></i>

            <a class="  text-xs">{{ $secondCrumb }}</a>
        @endif

    </div>
</div>
