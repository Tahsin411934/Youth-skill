@props([
    'id' => 'datatable-' . Str::random(8),
    'dom' => 'Bfrtip',
    'lengthMenu' => [10, 25, 50, 75, 100],
    'buttons' => ['copy', 'excel', 'csv', 'pdf', 'print'],
    'colvis' => true,
    'options' => [],
    'class' => '',
    'style' => 'width:100%'
])

<div class="{{ $class }}">
    <table id="{{ $id }}" class="display stripe hover" style="{{ $style }}">
        {{ $slot }}
    </table>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Merge default options with custom options
    const defaultOptions = {
        dom: @json($dom),
        lengthMenu: @json($lengthMenu),
        scrollX: true,
        responsive: true,
        buttons: @json($colvis ? array_merge($buttons, [{
            extend: 'colvis',
            text: 'Column Visibility',
            className: 'bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded'
        }]) : $buttons),
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    };

    const mergedOptions = {...defaultOptions, ...@json($options)};

    // Initialize DataTable with Flowbite styling
    $('#{{ $id }}').DataTable(mergedOptions);
    
    // Style buttons with Flowbite classes
    setTimeout(() => {
        $('.dt-buttons button').addClass(
            'bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mr-2 transition-colors duration-200'
        );
    }, 100);
});
</script>
@endpush