<x-app-layout>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('category.store') }}" class="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 font-Mukta">
                        <div class="flex flex-col justify-center">
                            <h1>Product Information</h1>
                            {{-- product title --}}
                            <div class="flex items-center mt-4">
                                <label for="first_name"
                                    class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Product
                                    title</label>
                                <input type="text" name="title" id="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5 "
                                    placeholder="Category Name" required>
                            </div>

                            {{-- category --}}
                            <div class="flex items-center mt-4">

                                <label for="countries"
                                    class="block mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Select
                                    an
                                    category</label>
                                <select name="category" id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 w-full p-2.5  ">
                                    @foreach ($categories as $category)
                                        @if ($loop->first)
                                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>

                            {{-- product image --}}
                            <div class="flex items-center mt-4">
                                <label for="featured image"
                                    class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Featured
                                    Image</label>

                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX. 800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div>

                            </div>

                            {{-- button --}}
                            <div class="flex justify-between mt-4">
                                <div class=""></div>

                                <button class="text-white bg-green-700 px-3 py-2 rounded-lg">
                                    Add Category

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
