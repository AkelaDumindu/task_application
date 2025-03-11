<x-app-layout>



    <div class=" flex justify-center items-center flex-col">
        <div class="filter-button-outer">
            <div class="flex justify-end">
                <h1 class="text-white text-[32px] lg:text-[36px] mt-4 font-bold">My Tasks</h1>
            </div>

            <div class="button-outer">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="flex justify-center items-center lg:text-[24px] text-[20px] bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-3xl "
                    type="button"><span class="text-white lg:text-[24px] text-[20px] font-bold">+</span>
                    Add
                    Task</button>
            </div>

        </div>

        {{-- <div class="w-[80%] mb-5">
            <h2 class="text-white text-[32px] font-bold mb-4">Today's Tasks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($todayTasks as $task)
                @include('components.task-card', ['task' => $task])
                @endforeach
            </div>
        </div> --}}


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
                </div>

                <div class="search-filter-outer">

                    <input type="text" name="search" id="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Search by title" />


                    <button type="submit"
                        class="w-full flex-[0.3] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search</button>

                    {{--
                    <select id="priority" name="priority" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500">
                        <option value="">Choose a priority</option>
                        <option value="high" {{ request('priority')=='high' ? 'selected' : '' }}>High</option>
                        <option value="medium" {{ request('priority')=='medium' ? 'selected' : '' }}>Medium</option>
                        <option value="low" {{ request('priority')=='low' ? 'selected' : '' }}>Low</option>

                    </select> --}}

                </div>
            </form>


        </div>

        <div class="date-filter-butttons-outer flex">


            <a href="{{ route('task', ['filterDate' => 'all']) }}"
                class="flex-[0.5] py-1  flex rounded-l-[40px] border-none text-[20px] justify-center items-center 
                {{ request('filterDate') === 'all' || !request('filterDate') ? 'bg-gray-600 text-white' : 'border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-white' }}">
                All Tasks
            </a>


            <a href="{{ route('task', ['filterDate' => 'today']) }}"
                class="flex-[0.5] py-1 flex rounded-r-[40px] border-none text-[20px] justify-center items-center 
                {{ request('filterDate') === 'today' ? 'bg-red-600 text-white' : 'border border-red-600 text-red-600 hover:bg-red-600 hover:text-white' }}">
                Today Tasks
            </a>

        </div>



        {{-- <div class="mt-5 flex w-full justify-center">
            <form action="" method="get" class="flex justify-center w-[60%] gap-2">


            </form>
        </div> --}}










        <div class="w-[80%] mt-8">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($tasks as $task)
                    @include('components.task-card', ['task' => $task])
                @endforeach
            </div>
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
                            <input type="text" name="description" id="description" placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="duedate" name="duedate" datepicker datepicker-buttons datepicker-autoselect-today
                                datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const datepickerEl = document.getElementById('due_date');
            new Datepicker(datepickerEl, {
                format: 'yyyy-mm-dd',
                autohide: true,
                todayHighlight: true
            });
        });
    </script>

</x-app-layout>