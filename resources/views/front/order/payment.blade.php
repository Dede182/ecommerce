<div class="mt-5">

<div id="accordion-collapse" data-accordion="collapse" class="flex flex-col   w-full">
    <div class="mb-6">
        <label id="accordion-collapse-heading-1" for="cod">
            <button type="button" class="flex items-center justify-between w-full p-5 bg-white rounded-lg"
             data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">

              <span class="flex items-center space-x-4">
                <input type="radio" id="cod" checked name="Payment" form="check" value = "COD"  class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
              focus:ring-2 "><p>Cash on Delivery</p></span>
              <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </label>
          <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1 ">
            <div class=" px-5 pb-3 font-semibold text-sm bg-white">
              <p class="mb-2 text-gray-500 dark:text-gray-400">Pay digitally with SMS Pay Link. Cash may not be accepted in COVID restricted areas. Know more.</p>

            </div>
          </div>
    </div>
    <div class="mb-6">
        <h2 id="accordion-collapse-heading-2">
            <button  type="button" class="flex items-center justify-between w-full p-5 bg-white rounded-lg"
             data-accordion-target="#accordion-collapse-body-2" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span class="flex items-center space-x-4">
                  <p>My wallet</p></span>
                  <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>


            </button>
          </h2>
          <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2 ">
            <div class="px-5 pb-3 font-semibold text-sm bg-white">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Selcet your payment</p>
                <div class="flex w-full" >
                    <div class="flex  w-full items-center space-x-3 font-normal">
                        <input type="radio" name="Payment" value="Amazon Pay" form="check"  class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
                        focus:ring-2 " id = "payment1" >
                        <label for="payment1">Amazon pay</label>
                    </div>
                    <div class="flex w-full  items-center space-x-3 font-normal">
                        <input type="radio" name="Payment" value="Paypal" form="check" class="w-4 h-4 mt-1 text-green-500 bg-gray-100 border-gray-300 focus:ring-green-700
                        focus:ring-2 " id = "payment2" >
                        <label for="payment2">Paypal</label>
                    </div>
                </div>
            </div>
          </div>
    </div>


  </div>

</div>
