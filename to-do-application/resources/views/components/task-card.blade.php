@php
    use Illuminate\Support\Str;
@endphp

<div
    class="max-w-sm main-card-outer p-6 border rounded-lg shadow-sm 
    {{ $task->is_completed ? 'border-green-600' : 'border-gray-200 dark:border-gray-700' }} dark:bg-gray-800">

    <div class="footer-section flex justify-between mb-2">
        <a href="#">
            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize">
                {{ $task->title }}
            </h5>
            <div class="flex items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                <p class="text-[12px]">{{ $task->duedate }}</p>
            </div>
        </a>
        
        <div>
            @if ($task->is_completed)
                
                <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            @else
                
                <h4 class="
                    {{ $task->priority === 'low' ? 'text-white' : '' }}
                    {{ $task->priority === 'high' ? 'text-red-700' : '' }}
                    {{ $task->priority === 'medium' ? 'text-yellow-700' : '' }}
                ">
                    {{ ucfirst($task->priority) }}
                </h4>
            @endif
        </div>
    </div>

    <p data-modal-target="static-modal-{{ $task->id }}" data-modal-toggle="static-modal-{{ $task->id }}"
        class="max-h-16 mb-3 cursor-pointer font-normal text-gray-700 dark:text-gray-400">
        {{ Str::words($task->description, 10, '...') }}
    </p>

    <div class="button-section-outer">
        <div class="buttonn-outer">
            <form method="post" action="{{ route('delete', ['id' => $task->id]) }}" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="delete-button text-red-500 bg-none rounded-lg hover:text-red-800 focus:ring-4 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </form>

            <button data-modal-target="edit-modal-{{ $task->id }}" data-modal-toggle="edit-modal-{{ $task->id }}"
                class="edit-button p-[10px] text-yellow-400 rounded-lg hover:text-yellow-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </button>
        </div>

        <div class="radio-outer">
            <form class="complete-form" action="{{ route('toggle', ['id' => $task->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <label class="radio-label flex items-center gap-2">
                    @if ($task->is_completed)
                    <span class="text-xs font-medium text-gray-900 dark:text-gray-300"></span>
                    @else
                    <span class="text-xs font-medium text-gray-900 dark:text-gray-300">If done?</span>
                    @endif
                    <input 
                        type="checkbox" 
                        name="is_completed"
                        onchange="this.form.submit()" 
                        {{ $task->is_completed ? 'checked' : '' }} 
                        class="sr-only peer">
                    <div
                        class="relative w-8 h-4 bg-gray-200 rounded-full peer dark:bg-gray-700 
                        peer-focus:ring-2 peer-focus:ring-green-300 dark:peer-focus:ring-green-800
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full 
                        peer-checked:after:border-white 
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] 
                        after:bg-white after:border-gray-300 after:border 
                        after:rounded-full after:h-3 after:w-3 after:transition-all 
                        dark:border-gray-600 peer-checked:bg-green-600 dark:peer-checked:bg-green-600">
                    </div>
                </label>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div id="edit-modal-{{ $task->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal Header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Update Task</h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-modal-{{ $task->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="{{ route('update', ['id' => $task->id]) }}">
                    @csrf
                    @method("PUT")
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                            Name</label>
                        <input type="text" name="title" id="title" value="{{ $task->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="My Study" required />
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>{{ $task->description }}</textarea>
                    </div>
                    

                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="duedate" value="{{ $task->duedate }}" name="duedate" datepicker datepicker-format="yyyy-mm-dd"
                            datepicker-min-date="{{ date('Y-m-d') }}" datepicker-buttons datepicker-autoselect-today
                            type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                        dark:focus:border-blue-500" placeholder="Select date">
                    </div>
                    <div class="mb-5">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{ $task->category }}</option>
                            <option value="shopping">Shopping</option>
                            <option value="study">Study</option>
                            <option value="freelancing">Freelance</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="priority"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                        <select id="priority" name="priority"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{ $task->priority }}</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>


                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                        Task</button>
                </form>
            </div>






        </div>
    </div>
</div>


<!-- Main modal -->
<div id="static-modal-{{ $task->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $task->title }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="static-modal-{{ $task->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ $task->description }}
                </p>

            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });
</script>


