<x-app-layout>



    <div class=" flex justify-center items-center flex-col">

        <div class="grid grid-cols-2 w-[80%] ml-40">
            <div class="flex justify-end">
                <h1 class="text-white text-[48px] mb-4 font-bold">My Tasks</h1>
            </div>

            <div class="flex justify-end mr-36">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="p-4 text-[24px] mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold pt-0 pb-1 pl-4 pr-6 rounded-3xl "
                    type="button"><span class="text-white text-[28px] font-bold">+</span>
                    Add
                    Task</button>
            </div>
        </div>



        <div class="ml-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-[80%] justify-center">
            
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
            @include('components.task-card')
        </div>


        {{-- @include('components.task-card') --}}


    </div>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Add New Task
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                {{-- Modal --}}
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('add') }}">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                                Name</label>
                            <input type="name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="My Study" required />
                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <input type="text" name="description" id="description" placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>

                        <div class="mb-5">

                            <label for="categories"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                option</label>
                            <select id="categories"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Category</option>
                                <option value="shopping">Shopping</option>
                                <option value="study">Study</option>
                                <option value="freelanzing">Freelance</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="mb-5">

                            <label for="categories"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                option</label>
                            <select id="categories"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Priority</option>
                                <option value="shopping">High</option>
                                <option value="study">Medium</option>
                                <option value="freelanzing">Low</option>

                            </select>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                            Task</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>