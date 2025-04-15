<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- NProgress JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Flowbite -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>

<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables Extensions -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Export Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
// Configure rainbow progress bar
NProgress.configure({
    minimum: 0.3,
    speed: 2000,
    trickle: false,
    showSpinner: false,
    easing: 'linear',
    parent: 'body'
});

// Track if we should show progress
let shouldShowProgress = false;

// Start progress on any click
document.addEventListener('click', function(e) {
    if (e.target.closest('a') && !e.target.closest('a').target) {
        shouldShowProgress = true;
        NProgress.start();
        NProgress.set(0.7);
    }
}, true);

// Complete when page loads
window.addEventListener('load', function() {
    if (shouldShowProgress) {
        NProgress.set(1.0);
        setTimeout(() => {
            NProgress.done();
            shouldShowProgress = false;
        }, 150);
    }
});

// Fallback completion
setTimeout(() => {
    if (shouldShowProgress) {
        NProgress.done();
        shouldShowProgress = false;
    }
}, 2500);

// Sidebar functionality
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarToggle = document.getElementById('sidebar-toggle');

    // Check localStorage for saved state
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

    if (isCollapsed) {
        collapseSidebar();
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            const isCollapsed = sidebar.classList.contains('w-20');
            if (isCollapsed) {
                expandSidebar();
                localStorage.setItem('sidebarCollapsed', 'false');
            } else {
                collapseSidebar();
                localStorage.setItem('sidebarCollapsed', 'true');
            }
        });
    }

    function collapseSidebar() {
        sidebar.classList.remove('w-60');
        sidebar.classList.add('w-20');
        mainContent.classList.remove('ml-60');
        mainContent.classList.add('ml-20');
    }

    function expandSidebar() {
        sidebar.classList.remove('w-20');
        sidebar.classList.add('w-60');
        mainContent.classList.remove('ml-20');
        mainContent.classList.add('ml-60');
    }
});
</script>