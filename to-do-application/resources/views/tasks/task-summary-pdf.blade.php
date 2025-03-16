<x-app-layout>

    <h2>Task Summary Report</h2>

    {{-- <h3>Pending Task</h3> --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Pending Task</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Due Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Priority
                    </th>

                </tr>
            </thead>
            <tbody>

                @foreach ($pendingTask as $task)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$task->title}}
                        </th>
                        <td class="px-6 py-4">
                            {{$task->category}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->duedate}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->priority}}
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Pending Task</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Due Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Priority
                    </th>

                </tr>
            </thead>
            <tbody>

                @foreach ($overDueTask as $task)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$task->title}}
                        </th>
                        <td class="px-6 py-4">
                            {{$task->category}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->duedate}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->priority}}
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Pending Task</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Due Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Priority
                    </th>

                </tr>
            </thead>
            <tbody>

                @foreach ($completedTask as $task)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$task->title}}
                        </th>
                        <td class="px-6 py-4">
                            {{$task->category}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->duedate}}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->priority}}
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>




</x-app-layout>