<div class="mt-6" id="task-list">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($tasks as $task)
            @include('components.task-card', ['task' => $task])
        @endforeach

        <!-- Skeleton loader (Initially Hidden) -->
        <div id="skeleton-container" class="w-full hidden">
            @for ($i = 0; $i < 3; $i++)
                <div class="skeleton-loader"></div>
            @endfor
        </div>

        <!-- Loading Indicator -->
        
    </div>
    
</div>
