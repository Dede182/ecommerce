<x-app-layout>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('product.update',$product->id) }}" id = "editForm" class="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            </form>
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
                                    <input form="editForm" type="text" name="title" id="first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                                @error('title')
                                                    border-red-700
                                                @enderror
                                                "
                                        value="{{ $product->title }}" placeholder="Product Name" required>
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
                                    <select name="category_id" id="cateogries"  form="editForm"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 w-full p-2.5
                                        @error('category_id')
                                            border-red-700
                                        @enderror
                                        ">
                                        @foreach ($categories as $category)
                                            <option form="editForm" @if ($category->id === $product->category->id) selected @endif
                                                value="{{ $category->id }}">{{ $category->title }}</option>
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
                                    <div class="relative">
                                        <div class="">
                                            @if (count($product->productImages) < 1)
                                                <img src="{{ asset('skin-and-hair-care-beauty-produc.jpg') }}"
                                                    class="h-40 w-40 rounded-lg object-cover" alt="">
                                            @else
                                                <img id="editFeaturedImage"
                                                    src="{{ asset('storage/' . Auth::user()->name . '/' . $product->folder . '/featured/' . $product->featuredImage) }}"
                                                    class="h-40 w-40 rounded-lg object-cover" alt="">
                                            @endif

                                        </div>

                                        {{-- input --}}
                                        <div class="absolute bottom-0 right-0">
                                            <img src="{{ asset('icon/pngwing.com.png') }}" alt=""
                                                id="featuredimage"
                                                class="w-8 h-6 object-cover px-2 py-1 outline-gray-200 outline-dashed
                                         bg-gray-100 opacity-75 cursor-pointer
                                          @error('featured_image')
                                            border-red-700
                                            @enderror
                                         " />

                                            @error('featured_image')
                                                <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                            @enderror
                                            <input form="editForm" type="file" id="featuredImageInput" name="featured_image"
                                                class="hidden" />
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="flex items-center mt-8 ">
                                <label for="productImage"
                                    class="  text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                    Images</label>

                                <div class="  space-x-7  grid grid-cols-5 items-center place-items-center w-full flex-wrap space-y-5 ">

                                    @if (count($product->productImages) > 0)
                                        @foreach ($product->productImages as $key => $pro)
                                            <div class="relative">
                                                <img id={{ $key }}
                                                    onclick="mainImage.setAttribute('src','{{ asset('storage/' . Auth::user()->name . '/' . $product->title . '/main/' . $product->productImages[$key]->productImage) }}')"
                                                    src="{{ asset('storage/' . Auth::user()->name . '/' . $product->folder . '/main/' . $pro->productImage) }}"
                                                    class="w-20 h-20 object-cover rounded-md cursor-pointer slideImage"
                                                    alt="">



                                                <div class="absolute bottom-0  right-0 ">
                                                    <form id="imageDelete" action="{{ route('productImage.destroy') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('delete')
                                                        <input name="id" hidden value="{{ $pro->id }}">
                                                        <button form="imageDelete" class="bg-red-700 rounded-sm p-1 py-[7px] ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                                                            class="w-3 h-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                        </button>

                                                    </form>



                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        {{-- if no images  --}}

                                    @endif



                                    <img src="{{ asset('icon/pngwing.com (1).png') }}" alt=""
                                        id="showProductImages"
                                        class="w-16 h-14 object-cover px-4 py-1 outline-gray-200 outline-dashed
                                     bg-gray-100 opacity-75 cursor-pointer" />
                                    <input form="editForm" type="file" multiple id="productImage" name="productImages[]"
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
                                <input form="editForm" type="number" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('price')
                                        border-red-700
                                    @enderror
                                        "
                                    value="{{ $product->price }}" placeholder="Add only price " required>
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
                                <textarea form="editForm"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('description')
                                        border-red-700
                                        @enderror
                                        "
                                    name="description" value="{{ $product->description }}" id="description" cols="70" rows="3">{{ $product->description }}</textarea>
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
                                <input form="editForm" type="number" name="stock" id="stock"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('stock')
                                        border-red-700
                                          @enderror
                                        "
                                    value="{{ $product->stock}}" placeholder="Avaiable amounts " required>
                                @error('stock')
                                    <div class="text-sm text-red-600">&bull; {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center mt-4">
                            <label for="discount"
                                class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">
                            Discount %
                            </label>
                            <div class="flex flex-col w-full">
                                <input form="editForm" type="number" max="100" name="discount" id="discount"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5
                                        @error('stock')
                                        border-red-700
                                          @enderror
                                        "
                                    value="{{ $product->discount }}" placeholder="Enter the amount of the dropping price of your item" required>
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

                    <button form="editForm" class="text-white bg-green-700 px-3 py-2 rounded-lg">
                       Update
                    </button>
                </div>

        </div>
    </div>

    @push('script')
        <script>
            const featuredImageInput = document.getElementById('featuredImageInput');
            const featuredImage = document.getElementById('featuredimage');

            const showProductImages = document.getElementById('showProductImages');
            const productImage = document.getElementById('productImage');
            const editFeaturedImage = document.getElementById('editFeaturedImage');
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
                                `<img src=${e.target.result} class="w-20 h-20 object-cover"/>`
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
                        editFeaturedImage.src = e.target.result;

                        console.log(featuredImage)

                    })
                    reader.readAsDataURL(readFile)
                    // featuredImage.removeAttribute('class');
                    // featuredImage.setAttribute('class', 'w-16 h-16 object-cover')
                })
            })
        </script>
    @endpush

</x-app-layout>
