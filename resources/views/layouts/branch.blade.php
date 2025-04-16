<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./logo1.png" type="image/x-icon">
    <title>Youth Skill Development Bangladesh</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">
    <!-- Include flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- NProgress CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

    <!-- Include flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <style>
    /* Rainbow progress bar animation */
    #nprogress {
        pointer-events: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        z-index: 9999;
        overflow: hidden;
    }

    #nprogress .bar {
        height: 2px;
        background: linear-gradient(90deg,
  /* Reds (originally blues) */
  #fd9393,  /* was #93c5fd (blue-300) */
  
  /* Yellows (originally greens) */
  #f3e0a7,  /* was #a7f3d0 (green-100) */
  #e7d06e,  /* was #6ee7b7 (green-300) */
  #d3a734,  /* was #34d399 (green-400) */
  #b98110,  /* was #10b981 (green-500) */
  #966905,  /* was #059669 (green-600) */
  #785704,  /* was #047857 (green-700) */
  
  /* Reds (originally blues) */
  #fa6060,  /* was #60a5fa (blue-400) */
  #f63b3b,  /* was #3b82f6 (blue-500) */
  #eb2525,  /* was #2563eb (blue-600) */
  #d81d1d   /* was #1d4ed8 (blue-700) */
);
        background-size: 1000% 100%;
        animation: rainbow 2s linear infinite;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
    }

    @keyframes rainbow {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    #nprogress .peg {
        display: none;
    }

    #nprogress .spinner {
        display: none;
    }
    </style>
</head>

<body class="font-sans antialiased">



<div class="min-h-screen">
    <!-- Fixed Header -->
    <div class="fixed top-0 left-0 w-full z-50">
        @include('branch.layouts.navigation')
    </div>
    
    <!-- Content Area -->
    <div class="pt-16 min-h-screen flex">
        <!-- Sidebar with transition and dynamic width -->
        <div id="sidebar" class="fixed h-[calc(100vh-4rem)] z-40 transition-all duration-300 ease-in-out w-60">
            @include('layouts.sidebar')
        </div>
        
        <!-- Main Content with dynamic margin -->
        <main id="main-content" class="ml-60 flex-1 transition-all duration-300 ease-in-out">
            {{ $slot }}
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    
    // Check localStorage for saved state
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    
    if (isCollapsed) {
        collapseSidebar();
    }
    
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- NProgress JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Progress Bar Configuration -->
    <script>
    // Configure rainbow progress bar
    NProgress.configure({
        minimum: 0.3,
        speed: 2000, // Matches our 2s animation
        trickle: false,
        showSpinner: false,
        easing: 'linear',
        parent: 'body'
    });

    // Track if we should show progress
    let shouldShowProgress = false;

    // Start progress on any click
    document.addEventListener('click', function(e) {
        // Only start for links that will cause navigation
        if (e.target.closest('a') && !e.target.closest('a').target) {
            shouldShowProgress = true;
            NProgress.start();
            NProgress.set(0.7); // Jump to 70% immediately
        }
    }, true); // Use capture phase to catch before navigation

    // Complete when page loads
    window.addEventListener('load', function() {
        if (shouldShowProgress) {
            NProgress.set(1.0); // Set to 100%
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

    // DataTables Initialization
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [10, 25, 50, 75, 100],
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print',
                {
                    extend: 'colvis',
                    text: 'Column Visibility'
                }
            ]
        });
    });
    </script>
</body>

</html>