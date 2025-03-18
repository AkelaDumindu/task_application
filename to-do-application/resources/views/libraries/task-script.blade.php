<script>
    document.addEventListener("DOMContentLoaded", function () {
        const datepickerEl = document.getElementById('duedate');


        const today = new Date().toISOString().split('T')[0];

        new Datepicker(datepickerEl, {
            format: 'yyyy-mm-dd',
            minDate: today,
            autohide: true,
            todayHighlight: true
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById('search');
        const taskList = document.getElementById('task-list');

        searchInput.addEventListener('keyup', function () {
            let query = searchInput.value;

            fetch(`{{ route('task') }}?search=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(data => {

                    taskList.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>


<script>
    let page = 1;
    let isLoading = false;
    let lastPageReached = false;

    window.addEventListener('scroll', () => {
        if (lastPageReached || isLoading) return;

        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
            loadMoreTasks();
        }
    });

    function loadMoreTasks() {
        page++;
        isLoading = true;
        document.getElementById('loading').classList.remove('hidden');

        const params = new URLSearchParams(window.location.search);
        params.set('page', page);

        fetch(`{{ route('task') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === '') {
                    lastPageReached = true;
                } else {
                    document.getElementById('task-list').insertAdjacentHTML('beforeend', data);
                }
            })
            .catch(error => console.error('Error loading tasks:', error))
            .finally(() => {
                isLoading = false;
                document.getElementById('loading').classList.add('hidden');
            });
    }
</script>
