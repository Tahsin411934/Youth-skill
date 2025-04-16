<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Manage Courses for Branch: {{ $branch_code }}</h2>
                </div>

                <div id="success-message" class="hidden mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    Courses assigned successfully!
                </div>
                <div id="error-message" class="hidden mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    Something went wrong. Please try again.
                </div>

                <form id="courseForm">
                    @csrf
                    <input type="hidden" name="branch_code" value="{{ $branch_code }}">

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Select Course</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Name</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($courses as $course)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @php
                                                $isSelected = $branchCourses->contains('course_code', $course->id);
                                            @endphp
                                            <input 
                                                name="courses[]" 
                                                type="checkbox" 
                                                value="{{ $course->id }}" 
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded course-checkbox"
                                                {{ $isSelected ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $course->code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('branches.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Back to Branches
                        </a>
                        <button type="submit" id="submitButton" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span id="buttonText">Save Assignments</span>
                            <svg id="loadingSpinner" class="hidden ml-2 h-4 w-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Axios CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Setup CSRF token for Axios
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Handle form submission
        document.getElementById('courseForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitButton = document.getElementById('submitButton');
            const buttonText = document.getElementById('buttonText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            
            // Show loading state
            submitButton.disabled = true;
            buttonText.textContent = 'Saving...';
            loadingSpinner.classList.remove('hidden');

            // Hide messages
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');

            // Get form data
            const formData = new FormData(document.getElementById('courseForm'));
            const selectedCourses = [];
            
            // Get all checked checkboxes
            document.querySelectorAll('.course-checkbox:checked').forEach(checkbox => {
                selectedCourses.push(checkbox.value);
            });

            // Prepare data to send
            const data = {
                branch_code: formData.get('branch_code'),
                courses: selectedCourses
            };

            axios.post("{{ route('branch-courses.store') }}", data)
            .then(response => {
                console.log(response);
                successMessage.classList.remove('hidden');
                // Hide success message after 3 seconds
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 3000);
            })
            .catch(error => {
                console.error(error);
                errorMessage.textContent = error.response?.data?.message || 'Something went wrong. Please try again.';
                errorMessage.classList.remove('hidden');
            })
            .finally(() => {
                // Reset button state
                submitButton.disabled = false;
                buttonText.textContent = 'Save Assignments';
                loadingSpinner.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>