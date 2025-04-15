<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 py-6 px-12 rounded-lg shadow-lg bg-gray-100 border border-blue-200">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Branch</h1>
        <form id="branchForm" class="space-y-4">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Branch Name</label>
                    <input type="text" name="branch_name" id="branch_name" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required>
                    <span id="branch_name_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required>
                    <span id="email_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required></textarea>
                <span id="address_error" class="text-red-500 text-xs mt-1"></span>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Division</label>
                    <select name="division_id" id="division_id" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required>
                        <option value="">Select Division</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}" data-bn-name="{{ $division->bn_name }}">
                                {{ $division->name }} ({{ $division->bn_name }})
                            </option>
                        @endforeach
                    </select>
                    <span id="division_id_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">District</label>
                    <select name="district_id" id="district_id" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required disabled>
                        <option value="">Select District</option>
                    </select>
                    <span id="district_id_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Upazila</label>
                    <select name="upazila_id" id="upazila_id" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;" required disabled>
                        <option value="">Select Upazila</option>
                    </select>
                    <span id="upazila_id_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;">
                    <span id="phone_error" class="text-red-500 text-xs mt-1"></span>
                </div>
            </div>
            <button type="button" id="toggleLoginBtn" onclick="toggleLoginFields()" class="w-full bg-[#006172] text-white p-2 rounded hover:bg-[#004d5a]">
                Add Login Credentials
            </button>
            <div id="loginFields" class="hidden space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Login Username</label>
                    <input type="text" name="login_username" id="login_username" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;">
                    <span id="login_username_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;">
                    <span id="password_error" class="text-red-500 text-xs mt-1"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 p-2 rounded" style="border-color: #006172;">
                </div>
            </div>
            <button type="button" onclick="submitBranchForm()" class="w-full bg-[#006172] text-white p-2 rounded hover:bg-[#004d5a]">
                Create Branch
            </button>
        </form>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Division change event
    document.getElementById('division_id').addEventListener('change', function() {
        const divisionId = this.value;
        const districtSelect = document.getElementById('district_id');
        const upazilaSelect = document.getElementById('upazila_id');
        
        // Reset downstream selects
        upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
        upazilaSelect.disabled = true;
        
        if (divisionId) {
            // Show loading state
            districtSelect.disabled = true;
            districtSelect.innerHTML = '<option value="">Loading districts...</option>';
            
            fetch(`/get-districts/${divisionId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    data.forEach(district => {
                        districtSelect.innerHTML += `
                            <option value="${district.id}" data-bn-name="${district.bn_name}">
                                ${district.name} (${district.bn_name})
                            </option>`;
                    });
                    districtSelect.disabled = false;
                })
                .catch(error => {
                    console.error('Error fetching districts:', error);
                    districtSelect.innerHTML = '<option value="">Error loading districts</option>';
                });
        } else {
            districtSelect.innerHTML = '<option value="">Select District</option>';
            districtSelect.disabled = true;
        }
    });

    // District change event
    document.getElementById('district_id').addEventListener('change', function() {
        const districtId = this.value;
        const upazilaSelect = document.getElementById('upazila_id');
        
        if (districtId) {
            // Show loading state
            upazilaSelect.disabled = true;
            upazilaSelect.innerHTML = '<option value="">Loading upazilas...</option>';
            
            fetch(`/get-upazilas/${districtId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
                    data.forEach(upazila => {
                        upazilaSelect.innerHTML += `
                            <option value="${upazila.id}" data-bn-name="${upazila.bn_name}">
                                ${upazila.name} (${upazila.bn_name})
                            </option>`;
                    });
                    upazilaSelect.disabled = false;
                })
                .catch(error => {
                    console.error('Error fetching upazilas:', error);
                    upazilaSelect.innerHTML = '<option value="">Error loading upazilas</option>';
                });
        } else {
            upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
            upazilaSelect.disabled = true;
        }
    });

    function toggleLoginFields() {
        const loginFields = document.getElementById('loginFields');
        const toggleBtn = document.getElementById('toggleLoginBtn');
        
        if (loginFields.classList.contains('hidden')) {
            loginFields.classList.remove('hidden');
            toggleBtn.textContent = 'Hide Login Credentials';
        } else {
            loginFields.classList.add('hidden');
            toggleBtn.textContent = 'Add Login Credentials';
        }
    }

    function clearErrors() {
        document.querySelectorAll('[id$="_error"]').forEach(el => {
            el.textContent = '';
        });
    }

    function submitBranchForm() {
        clearErrors();
        
        const data = {
            branch_name: document.getElementById('branch_name').value,
            email: document.getElementById('email').value,
            address: document.getElementById('address').value,
            division_id: document.getElementById('division_id').value,
            district_id: document.getElementById('district_id').value,
            upazila_id: document.getElementById('upazila_id').value,
            phone: document.getElementById('phone').value,
            login_username: document.getElementById('login_username').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value
        };

        axios.post("{{ route('branches.store') }}", data)
            .then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Branch created successfully!',
                    customClass: {
                        confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
                    }
                })
            })
            .catch(error => {
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;
                    for (const [field, messages] of Object.entries(errors)) {
                        const errorElement = document.getElementById(`${field}_error`);
                        if (errorElement) {
                            errorElement.textContent = messages[0];
                        }
                        
                        if (field === 'password' && messages.some(msg => msg.includes('confirmation'))) {
                            const confirmPassError = document.getElementById('password_error');
                            if (confirmPassError) {
                                confirmPassError.textContent = 'The passwords do not match.';
                            }
                        }
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.response?.data?.message || 'Something went wrong!',
                        customClass: {
                            confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
                        }
                    });
                }
            });
    }
</script>