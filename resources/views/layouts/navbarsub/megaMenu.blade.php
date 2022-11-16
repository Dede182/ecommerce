<li>
    <div
    x-data="{ open: false }"
    class="font-semibold relative">

        <div
        x-on:click="open = ! open"
        class="flex items-center cursor-pointer hover:text-green-500 focus:text-green-500">
            <p>MegaMenu</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
              </svg>
        </div>
        <div
        x-show="open"
        x-transition.duration.500ms
        x-transition.origin.top
        class="absolute top-10 -left-20 bg-white shadow-2xl rounded-lg  w-96 ">
            <div class="flex space-x-10 px-10 pb-6 pt-4">
                <div class="flex-col">
                    <h3 class="text-green-500">Daily vegetables</h3>
                    <ul>
                        <li>Beans & something</li>
                        <li>Chillies & Gries</li>
                        <li>Vegetables & Slabs</li>
                        <li>Lettuce & Legacy</li>
                        <li>Gournd & Cucumber</li>
                        <li>Broccoli & leans</li>
                    </ul>
                </div>

                <div class="flex-col">
                    <h3 class="text-green-500">Daily vegetables</h3>
                    <ul>
                        <li>Beans & something</li>
                        <li>Chillies & Gries</li>
                        <li>Vegetables & Slabs</li>
                        <li>Lettuce & Legacy</li>
                        <li>Gournd & Cucumber</li>
                        <li>Broccoli & leans</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>
