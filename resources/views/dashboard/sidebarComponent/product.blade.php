<a href="#" class="flex items-center   transition hover:bg-[#30b69b84] px-4 py-2 mt-4 rounded-xl">

    <div id="accordion-collapse" data-accordion="collapse" class="w-full">
        <h2 id="accordion-collapse-heading-1" class=" !flex !items-center  !justify-between w-full">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                  </svg>

                <p>Products</p>

            </div>


          <button type="button" class="!text-white bg-transparent" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">

            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden mt-3 w-full transition" aria-labelledby="accordion-collapse-heading-1">
            <div class="flex flex-col">
                <div class="pl-8 flex flex-col space-y-2">
                    <form action="{{ route('product.index') }}" class="text-sm font-semibold">
                        <button>- Product List</button>
                    </form>
                    <form action="{{ route('product.create') }}" class="text-sm font-semibold">
                        <button>- Add new Product</button>
                    </form>
                </div>
            </div>
        </div>

      </div>



</a>
