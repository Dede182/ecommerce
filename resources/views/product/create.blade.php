<x-app-layout>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('product.store') }}" class="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 font-Mukta">
                        <div class="flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Product Information</h1>
                            {{-- product title --}}

                                <div class="flex items-center mt-4">
                                    <label for="first_name"
                                        class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                        title</label>
                                        <div class="flex flex-col w-full">
                                            <input type="text" name="title" id="first_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                                @error('title')
                                                    border-red-700
                                                @enderror
                                                "
                                                value = "{{ old('title') }}"
                                                placeholder="Product Name" required>
                                                @error('title')
                                                    <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                                @enderror

                                        </div>
                                 </div>


                            {{-- category --}}
                            <div class="flex items-center mt-4">

                                <label for="countries"
                                    class="block mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Select
                                    an
                                    category</label>
                                    <div class="flex flex-col w-full">
                                        <select name="category_id" id="cateogries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 w-full p-2.5
                                        @error('category_id')
                                            border-red-700
                                        @enderror
                                        ">
                                        @foreach ($categories as $category)
                                            @if ($loop->first)
                                                <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                        @error('category_id')
                                        <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                    @enderror
                                    </div>


                            </div>

                            {{-- product image --}}
                            <div class="flex items-center mt-4">
                                <label for="featured image"
                                    class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Featured
                                    Image</label>

                                <div class="flex items-center justify-start w-full   ">
                                    <img src="{{ asset('icon/pngwing.com (1).png') }}" alt="" id="featuredimage"
                                        class="w-16 h-14 object-cover px-4 py-1 outline-gray-200 outline-dashed
                                     bg-gray-100 opacity-75 cursor-pointer
                                      @error('featured_image')
                                        border-red-700
                                        @enderror
                                     " />

                                     @error('featured_image')
                                     <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                 @enderror
                                    <input type="file" id="featuredImageInput" name="featured_image" class="hidden" />
                                </div>

                            </div>

                            <div class="flex items-center mt-4">
                                <label for="productImage"
                                    class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                    Images</label>

                                <div class="flex items-center justify-start w-full   ">
                                    <img src="{{ asset('icon/pngwing.com (1).png') }}" alt=""
                                        id="showProductImages"
                                        class="w-16 h-14 object-cover px-4 py-1 outline-gray-200 outline-dashed
                                     bg-gray-100 opacity-75 cursor-pointer" />
                                    <input type="file" multiple id="productImage" name="productImages[]"
                                        class="hidden" />
                                        @error('productImages.*')
                                     <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                 @enderror
                                    <div class="flex space-x-8 flex-wrap" id="mainImages">

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                {{-- product description --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 bg-white border-b border-gray-200 font-Mukta">
                        <h3 class="text-lg font-bold  mb-4">Price & Description</h3>

                        <div class="flex items-center mt-4">
                            <label for="price"
                                class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                Price</label>
                                <div class="flex flex-col w-full">
                                    <input

                                    type="number" name="price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('price')
                                        border-red-700
                                    @enderror
                                        "
                                        value = "{{ old('price') }}"
                                        placeholder="Add only price " required>
                                        @error('price')
                                        <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                        <div class="flex items-center mt-7">
                            <label for="description"
                                class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                Description</label>
                                <div class="flex flex-col w-full">
                                    <textarea
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('description')
                                        border-red-700
                                        @enderror
                                        "
                                        name="description"
                                        value = "{{ old('description') }}" id="description" cols="70" rows="3"></textarea>
                                        @error('description')
                                        <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                {{-- stock --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 bg-white border-b border-gray-200 font-Mukta">
                        <h3 class="text-lg font-bold  mb-4">Other Details</h3>

                        <div class="flex items-center mt-4">
                            <label for="price"
                                class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                Stocks</label>
                                <div class="flex flex-col w-full">
                                    <input

                                    type="number" name="stock" id="stock"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('stock')
                                        border-red-700
                                          @enderror
                                        "
                                        value = "{{ old('stock') }}"
                                        placeholder="Avaiable amounts " required>
                                        @error('stock')
                                        <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                    </div>
                </div>
                {{-- button --}}
                <div class="flex justify-between mt-4">
                    <div class=""></div>

                    <button class="text-white bg-green-700 px-3 py-2 rounded-lg">
                        Add Product

                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            const featuredImageInput = document.getElementById('featuredImageInput');
            const featuredImage = document.getElementById('featuredimage');

            const showProductImages = document.getElementById('showProductImages');
            const productImage = document.getElementById('productImage');
            const mainImages = document.getElementById('mainImages');

            showProductImages.addEventListener('click', () => {
                productImage.click();
                productImage.addEventListener('change', (e) => {
                    const files = e.target.files;
                    console.log(files);
                    for (let i = 0; i < files.length; i++) {
                        // const readFile = files[i];
                        var reader = new FileReader();
                        reader.addEventListener('load', (e) => {
                            mainImages.innerHTML +=
                                `<img src=${e.target.result} class="w-14 h-14 object-cover"/>`
                        })
                        reader.readAsDataURL(files[i]);

                    }
                    showProductImages.removeAttribute('class');
                    showProductImages.setAttribute('class', 'hidden');


                })
            })


            featuredImage.addEventListener('click', () => {
                featuredImageInput.click();
                featuredImageInput.addEventListener('change', (e) => {
                    const readFile = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', (e) => {
                        featuredImage.src = e.target.result;

                        console.log(featuredImage)

                    })
                    reader.readAsDataURL(readFile)
                    featuredImage.removeAttribute('class');
                    featuredImage.setAttribute('class', 'w-16 h-16 object-cover')
                })
            })
        </script>
    @endpush

</x-app-layout>
