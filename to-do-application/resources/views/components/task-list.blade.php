<div class=" mt-8" id="task-list">

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($tasks as $task)
            @include('components.task-card', ['task' => $task])
        @endforeach

        <div id="loading" class="text-center my-4 hidden">
            <span class="text-gray-500">Loading more tasks...</span>
        </div>
    </div>
</div>