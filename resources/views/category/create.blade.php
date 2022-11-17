<x-app-layout>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="flex flex-col justify-center">
                        <h1>Category Information</h1>
                        <form action="{{ route('category.store') }}" class="" method="POST">
                            @csrf
                            <div class="flex items-center mt-4">
                                <label for="first_name" class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">Category Title</label>
                                <input type="text" name = "title" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Category Name" required>
                            </div>
                            <div class="flex justify-between mt-4">
                                <div class=""></div>

                                    <button class="text-white bg-green-700 px-3 py-2 rounded-lg">
                                        Add Category
                                    </button>

                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
