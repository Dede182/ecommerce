<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex w-full justify-between">
                        <h3 class="font-semibold font-Inter">Products List</h3>

                        <div class="">
                            <a href = "{{ route('category.create') }}" class="text-white bg-green-700 px-4 py-2 rounded-xl">
                                <button>
                                    Add Category
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto relative mt-9">
                        <table class="w-full text-sm text-left text-gray-500 font-Mukta dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Category name
                                    </th>
                                    <th scope="col" class="py-3 px-6 ">
                                        Products total
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-center">
                                        Optional
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $category)
                                <tr class="bg-white border-b dark:bg-gray-800 table-row dark:border-gray-700">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      {{ Str::ucfirst($category->title)  }}
                                    </th>
                                    <td class="py-4 px-6 indent-6">
                                       {{ count($category->products) }}
                                    </td>

                                    <td class="py-4 px-6">
                                        <div class="flex justify-center">
                                                <a class="ml-3" href="{{ route('category.show',$category->id) }}">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9510e8" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                          </svg>

                                                    </button>
                                                </a>
                                                <a class="ml-3" href="{{ route('category.edit',$category->id) }}">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                          </svg>


                                                    </button>
                                                </a>
                                                <form class="ml-3" action="{{ route('category.destroy',$category->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8c062a" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                          </svg>



                                                    </button>
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
