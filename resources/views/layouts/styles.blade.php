<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- NProgress CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Flowbite -->
<link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet">

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
            #fd9393,
            #f3e0a7,
            #e7d06e,
            #d3a734,
            #b98110,
            #966905,
            #785704,
            #fa6060,
            #f63b3b,
            #eb2525,
            #d81d1d
        );
    background-size: 1000% 100%;
    animation: rainbow 2s linear infinite;
    box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
}

@keyframes rainbow {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}

#nprogress .peg,
#nprogress .spinner {
    display: none;
}

/* DataTables custom styling */
.dt-button {
    @apply bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded text-sm mr-2;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    @apply px-3 py-1 rounded mx-1;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    @apply bg-blue-500 text-white;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    @apply bg-blue-100;
}

.dataTables_wrapper .dataTables_filter input {
    @apply border border-gray-300 rounded px-2 py-1 ml-2;
}
</style>