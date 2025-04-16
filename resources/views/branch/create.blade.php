@extends('branch.layouts.app')
@section('content')

<div class="max-w-3xl mx-auto mt-8 p-8 rounded-xl shadow-md bg-white border border-gray-200">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Create New Student</h1>
        <a href="{{ route('students.index') }}" class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Students
        </a>
    </div>

    <form id="studentForm" class="space-y-6">
        @csrf

        <!-- Personal Information Section -->
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold text-blue-800 mb-4">Personal Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Student Name*</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter full name" required>
                    <span id="name_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Father's Name*</label>
                    <input type="text" name="father_name" id="father_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter father's name" required>
                    <span id="father_name_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mother's Name*</label>
                    <input type="text" name="mother_name" id="mother_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter mother's name" required>
                    <span id="mother_name_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number*</label>
                    <input type="tel" name="phone_number" id="phone_number"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter phone number" required>
                    <span id="phone_number_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
        </div>

        <!-- Address Information Section -->
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold text-blue-800 mb-4">Address Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tana/Thana*</label>
                    <input type="text" name="tana" id="tana"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Tana/Thana" required>
                    <span id="tana_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Village*</label>
                    <input type="text" name="vill" id="vill"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter village name" required>
                    <span id="vill_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Address*</label>
                    <textarea name="address" id="address" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter complete address" required></textarea>
                    <span id="address_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
        </div>

        <!-- Academic Information Section -->
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold text-blue-800 mb-4">Academic Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
    <label for="name_of_course" class="block text-sm font-medium text-gray-700 mb-1">Course Name*</label>
    <select name="name_of_course" id="name_of_course"
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        required>
        <option value="">-- Select Course --</option>
        @foreach ($courses as $item)
            <option value="{{ $item->course->name }}">{{ $item->course->name }}</option>
        @endforeach
    </select>
    <span id="name_of_course_error" class="text-red-500 text-xs mt-1"></span>
</div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Session*</label>
                    <div class="relative">
                        <div id="session_field" class="flex items-center justify-between w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                            <span id="session_display">Select two months</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <input type="hidden" name="session" id="session" required>
                        <div id="month_selects" class="absolute left-0 top-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg p-3 flex gap-2 z-10 hidden">
                            <select id="from_month" class="border px-2 py-1 rounded-md">
                                <option value="">From</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>

                            <select id="to_month" class="border px-2 py-1 rounded-md">
                                <option value="">To</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <span id="session_error" class="text-red-500 text-xs mt-1 block"></span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Year*</label>
                    <select name="year" id="year"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Select year</option>
                        <!-- Years will be inserted here -->
                    </select>
                    <span id="year_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
        </div>

        <!-- Documents Section -->
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold text-blue-800 mb-4">Documents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Student Image*</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <span id="image_error" class="text-red-500 text-xs mt-1"></span>
                    <p class="text-xs text-gray-500 mt-1">Max file size: 2MB (JPEG, PNG)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Signature*</label>
                    <input type="file" name="signature" id="signature" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <span id="signature_error" class="text-red-500 text-xs mt-1"></span>
                    <p class="text-xs text-gray-500 mt-1">Max file size: 2MB (JPEG, PNG)</p>
                </div>
            </div>
        </div>

        <!-- Form Submission -->
        <div class="flex justify-end space-x-4 pt-4">
            <button type="reset"
                class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Reset Form
            </button>
            <button type="button" onclick="submitStudentForm()"
                class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Create Student
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Initialize year dropdown
const yearSelect = document.getElementById("year");
const startYear = 1990;
const currentYear = new Date().getFullYear()+20;

for (let year = currentYear; year >= startYear; year--) {
    const option = document.createElement("option");
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
}

// Session field functionality
const sessionField = document.getElementById('session_field');
const monthSelects = document.getElementById('month_selects');
const fromMonth = document.getElementById('from_month');
const toMonth = document.getElementById('to_month');
const sessionDisplay = document.getElementById('session_display');
const sessionInput = document.getElementById('session');

// Toggle dropdown visibility
sessionField.addEventListener('click', (e) => {
    e.stopPropagation();
    monthSelects.classList.toggle('hidden');
});

// Update session display and hidden input
function updateSessionDisplay() {
    const from = fromMonth.value;
    const to = toMonth.value;

    if (from && to) {
        const sessionValue = `${from}-${to}`;
        sessionDisplay.textContent = `${from} - ${to}`;
        sessionInput.value = sessionValue;
        document.getElementById('session_error').textContent = '';
        monthSelects.classList.add('hidden');
    }
}

fromMonth.addEventListener('change', updateSessionDisplay);
toMonth.addEventListener('change', updateSessionDisplay);

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!monthSelects.contains(e.target) && !sessionField.contains(e.target)) {
        monthSelects.classList.add('hidden');
    }
});

function clearErrors() {
    document.querySelectorAll('[id$="_error"]').forEach(el => {
        el.textContent = '';
    });
}

function resetForm() {
    // Reset form fields
    document.getElementById('studentForm').reset();
    
    // Reset session display
    sessionDisplay.textContent = 'Select two months';
    sessionInput.value = '';
    fromMonth.value = '';
    toMonth.value = '';
    
    // Clear all error messages
    clearErrors();
}

function validateForm() {
    let isValid = true;
    clearErrors();

    // Required fields validation
    const requiredFields = [
        'name', 'father_name', 'mother_name', 'phone_number',
        'tana', 'vill', 'address', 'name_of_course',
        'session', 'year', 'image', 'signature'
    ];

    requiredFields.forEach(field => {
        const element = document.getElementById(field);
        if (!element || (element.tagName === 'INPUT' && element.type === 'file' && !element.files.length)) {
            document.getElementById(`${field}_error`).textContent = 'This field is required';
            isValid = false;
        } else if (element.value === '') {
            document.getElementById(`${field}_error`).textContent = 'This field is required';
            isValid = false;
        }
    });

    // Phone number validation
    const phoneNumber = document.getElementById('phone_number').value;
    if (phoneNumber && !/^[0-9]{10,15}$/.test(phoneNumber)) {
        document.getElementById('phone_number_error').textContent = 'Please enter a valid phone number';
        isValid = false;
    }

    // Session validation
    if (!sessionInput.value) {
        document.getElementById('session_error').textContent = 'Please select a session';
        isValid = false;
    }

    return isValid;
}

function submitStudentForm() {
    if (!validateForm()) {
        return;
    }

    const formData = new FormData(document.getElementById('studentForm'));

    // Show loading indicator
    const submitBtn = document.querySelector('button[onclick="submitStudentForm()"]');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="animate-pulse">Processing...</span>';

    axios.post("{{ route('students.store') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(response => {
            // Reset button state on success
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Student created successfully!',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Reset the form after successful submission
                resetForm();
                
                // If you want to redirect instead, uncomment this line:
                // window.location.href = "{{ route('students.index') }}";
            });
        })
        .catch(error => {
            // Always reset button state on error
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            if (error.response && error.response.status === 422) {
                const errors = error.response.data.errors;
                for (const [field, messages] of Object.entries(errors)) {
                    const errorElement = document.getElementById(`${field}_error`);
                    if (errorElement) {
                        errorElement.textContent = messages[0];
                    }
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.response?.data?.message || 'Something went wrong! Please try again.',
                    confirmButtonColor: '#3b82f6',
                });
            }
        });
}
</script>
@endsection