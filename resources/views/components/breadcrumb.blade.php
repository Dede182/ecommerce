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
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a class="  text-xs">{{ $secondCrumb }}</a>
        @endif

    </div>
</div>
