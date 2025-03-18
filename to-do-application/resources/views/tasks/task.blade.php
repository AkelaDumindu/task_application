<x-app-layout>

    <div class=" flex justify-center items-center flex-col">
        <div class="filter-button-outer">
            <div class="flex justify-end">
                <h1 class="text-white text-[32px] lg:text-[36px] font-bold">My Tasks</h1>
            </div>

            <div class="button-outer gap-2">

                <a class="add-button flex gap-1.5 justify-center items-center bg-[#9290C3] hover:bg-[#7F7DB0] text-white font-bold px-4 py-2 rounded-3xl"
                    href="{{ route('summary') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 @min-[478px]:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg> PDF
                </a>
            
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="add-button flex justify-center items-center bg-[#535C91] hover:bg-[#464D7B] text-white font-bold px-4 py-2 rounded-3xl"
                    type="button">
                    Add Task
                </button>
            
            </div>
            
            

        </div>




        <div class="filter-outer ">
            <form class="sorting-outer w-full flex gap-4 " method="GET" action="{{ route('task') }}">
                <div class="filter-double-outer">
                    <div class="category-filter-outer">

                        <select id="category" name="category" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500">
                            <option value="">Choose a category</option>
                            <option value="shopping" {{ request('category') == 'shopping' ? 'selected' : '' }}>Shopping
                            </option>
                            <option value="study" {{ request('category') == 'study' ? 'selected' : '' }}>Study</option>
                            <option value="freelancing" {{ request('category') == 'freelancing' ? 'selected' : '' }}>
                                Freelance
                            </option>
                            <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Other</option>

                        </select>
                    </div>

                    <div class="priority-filter-outer">

                        <div class="flex">
                            <select id="priority" name="priority" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500">
                                <option value="">Choose a priority</option>
                                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                                <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>

                            </select>


                        </div>




                    </div>

                    <div class="priority-filter-outer">

                        <div class="flex">
                            <select id="summary" name="summary" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500">
                                <option value="">Choose a Summary</option>
                                <option value="completed" {{ request('summary') == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                                <option value="pending" {{ request('summary') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="overdue" {{ request('summary') == 'overdue' ? 'selected' : '' }}>Overdue
                                </option>

                            </select>


                        </div>




                    </div>
                </div>

                <div class="search-filter-outer">

                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                        placeholder="Search by title" />

                        <a type="submit" href="{{ route('task') }}"
                        class="w-full flex-[0.3] text-white bg-[#535C91] hover:bg-[#464D7B] focus:ring-4 focus:outline-none focus:ring-[#747BA8] font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#535C91] dark:hover:bg-[#464D7B] dark:focus:ring-[#3C4370]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </a>
                    


                </div>
            </form>


        </div>

        <div class="date-filter-butttons-outer flex">


            <a href="{{ route('task', ['filterDate' => 'all']) }}"
                class="task-filter-today flex-[0.5] py-1  flex rounded-l-[40px] border-none justify-center items-center 
                {{ request('filterDate') === 'all' || !request('filterDate') ? 'bg-gray-600 text-white' : 'border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-white' }}">
                All Tasks
            </a>


            <a href="{{ route('task', ['filterDate' => 'today']) }}"
                class="task-filter-today flex-[0.5] py-1 flex rounded-r-[40px] border-none justify-center items-center 
                {{ request('filterDate') === 'today' ? 'bg-[#9290C3] text-white' : 'border border-[#9290C3] text-[#e2e2eb] hover:bg-[#9290C3] hover:text-white' }}">
                Today Tasks
            </a>
            

        </div>


        @include('components.task-list', ['tasks' => $tasks])

        
        <div id="loading" class="text-center hidden">
            <span class="text-gray-500 animate-pulse">Loading more tasks...</span>
        </div>



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
                    <form class="space-y-4" method="post" action="{{ route('add') }}">
                        @csrf
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                                Name</label>
                            <input type="name" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="My Study" required />
                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" rows="5"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required></textarea>
                        </div>

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="duedate" name="duedate" datepicker datepicker-format="yyyy-mm-dd"
                                datepicker-min-date="{{ date('Y-m-d') }}" datepicker-buttons datepicker-autoselect-today
                                type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500" placeholder="Select date">
                        </div>


                        <div class="mb-5">

                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                option</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Category</option>
                                <option value="shopping">Shopping</option>
                                <option value="study">Study</option>
                                <option value="freelanzing">Freelance</option>
                                <option value="other">Other</option>
                            </select>
                        </div>


                        <div class="mb-5">

                            <label for="priority"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                option</label>
                            <select id="priority" name="priority"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a priority</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>








                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save
                            Task</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('libraries.task-script')


</x-app-layout>