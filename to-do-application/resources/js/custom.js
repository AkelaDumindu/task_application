document.addEventListener('DOMContentLoaded', function () {
    initDatepicker();
    initSearchTasks();
    initInfiniteScroll();
    initDeleteConfirmation();
});

/**
 * Initialize datepicker for due date selection
 */
function initDatepicker() {
    const datepickerEl = document.getElementById('duedate');
    if (!datepickerEl) return;

    const today = new Date().toISOString().split('T')[0];

    new Datepicker(datepickerEl, {
        format: 'yyyy-mm-dd',
        minDate: today,
        autohide: true,
        todayHighlight: true
    });
}

/**
 * Initialize search functionality for tasks
 */
function initSearchTasks() {
    const searchInput = document.getElementById('search');
    const taskList = document.getElementById('task-list');

    if (!searchInput || !taskList) return;

    searchInput.addEventListener('keyup', function () {
        let query = searchInput.value.trim();

        fetch(`${taskRoute}?search=${encodeURIComponent(query)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(data => {
            taskList.innerHTML = data;
        })
        .catch(error => console.error('Error fetching tasks:', error));
    });
}

/**
 * Initialize infinite scrolling for loading more tasks
 */
function initInfiniteScroll() {
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

        const loadingIndicator = document.getElementById('loading');
        if (loadingIndicator) loadingIndicator.classList.remove('hidden');

        const params = new URLSearchParams(window.location.search);
        params.set('page', page);

        fetch(`${taskRoute}?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
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
            if (loadingIndicator) loadingIndicator.classList.add('hidden');
        });
    }
}

/**
 * Initialize delete confirmation using SweetAlert
 */
function initDeleteConfirmation() {
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
}
