<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  font-Mukta">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-breadcrumb :first="true" firstCrumb="Category" firstRoute="{{ route('category.index') }}" :second="true" :secondCrumb="$category->title"/>
                   <div class="flex flex-col justify-center">
                        <h1>Category Information</h1>
                        <form action="{{ route('category.update',$category->id) }}" class=""  method="POST">
                            @csrf
                            @method('put')
                            <div class="flex items-center mt-4">
                                <label for="first_name" class=" mb-2 text-sm font-medium w-[30%] text-gray-900 dark:text-white">First name</label>
                                <input
                                type="text" name = "title"
                                value ="{{  $category->title }}"
                                id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Category Name" required>
                            </div>
                            <div class="flex justify-between mt-4">
                                <div class=""></div>

                                    <button class="text-white bg-green-700 px-3 py-2 rounded-lg">
                                        Update
                                    </button>

                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
