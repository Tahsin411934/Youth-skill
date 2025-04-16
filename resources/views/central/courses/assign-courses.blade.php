<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Filter Section (unchanged) -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6 border border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Filter Branches</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Division Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Division</label>
                    <select id="divisionFilter"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border text-sm">
                        <option value="">All Divisions</option>
                        @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- District Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">District</label>
                    <select id="districtFilter"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border text-sm"
                        disabled>
                        <option value="">All Districts</option>
                    </select>
                </div>

                <!-- Reset Button -->
                <div class="flex items-end">
                    <button id="resetFilters"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Reset Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Branches Table (unchanged) -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Branch Code</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Branch Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Division</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                District</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($branches as $branch)
                        <tr class="branch-row hover:bg-gray-50 transition-colors"
                            data-division="{{ $branch->division_id }}" data-district="{{ $branch->district_id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $branch->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $branch->branch_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $branch->division_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $branch->district_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="showBranchDetails({{ json_encode($branch) }})"
                                    class="text-blue-600 hover:text-blue-900 mr-3 group relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span
                                        class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        View Details
                                    </span>
                                </button>
                                <button class="bg-[#006172] text-white text-sm px-4 py-2 ml-5 -mb-2 rounded hover:bg-[#004f5d]">
                                <a href="/branch/assign-course/{{ $branch->id }}">Assign Courses</a>

                                    
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Enhanced Branch Details Modal -->
    <div id="branchModal" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl w-full">
                <div class="bg-white px-6 pt-6 pb-4">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-900" id="modalTitle">Branch Details</h3>
                                <p class="text-sm text-gray-500" id="modalBranchName"></p>
                            </div>
                        </div>
                        <button type="button" onclick="closeModal()"
                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="px-6 py-4">
                    <div class="border-t border-gray-200">
                        <dl class="divide-y divide-gray-200">
                            <!-- Contact Information -->
                            <div class="py-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900" id="modalEmail">N/A</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900" id="modalPhone">N/A</dd>
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="py-4">
                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                <dd class="mt-1 text-sm text-gray-900" id="modalAddress">N/A</dd>
                            </div>

                            <!-- Location Information -->
                            <div class="py-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Division</dt>
                                    <dd class="mt-1 text-sm text-gray-900" id="modalDivision">N/A</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">District</dt>
                                    <dd class="mt-1 text-sm text-gray-900" id="modalDistrict">N/A</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Upazila</dt>
                                    <dd class="mt-1 text-sm text-gray-900" id="modalUpazila">N/A</dd>
                                </div>
                            </div>

                            <!-- Additional Information (if any) -->
                            <div class="py-4">
                                <dt class="text-sm font-medium text-gray-500">Additional Information</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeModal()"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Modal functions
    function showBranchDetails(branch) {
        document.getElementById('modalBranchName').textContent = branch.branch_name;
        document.getElementById('modalEmail').textContent = branch.email || 'N/A';
        document.getElementById('modalAddress').textContent = branch.address || 'N/A';
        document.getElementById('modalDivision').textContent = branch.division_name || 'N/A';
        document.getElementById('modalDistrict').textContent = branch.district_name || 'N/A';
        document.getElementById('modalUpazila').textContent = branch.upazila_name || 'N/A';
        document.getElementById('modalPhone').textContent = branch.phone || 'N/A';

        document.getElementById('branchModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        document.getElementById('branchModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modal when clicking outside
    document.getElementById('branchModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Filter functionality
    document.getElementById('divisionFilter').addEventListener('change', function() {
        const divisionId = this.value;
        const districtSelect = document.getElementById('districtFilter');

        // Reset district filter
        districtSelect.innerHTML = '<option value="">All Districts</option>';
        districtSelect.disabled = !divisionId;

        if (divisionId) {
            // Show loading in district dropdown
            districtSelect.innerHTML = '<option value="">Loading...</option>';

            // Fetch districts for the selected division
            fetch(`/get-districts/${divisionId}`)
                .then(response => response.json())
                .then(data => {
                    districtSelect.innerHTML = '<option value="">All Districts</option>';
                    data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id;
                        option.textContent = district.name;
                        districtSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading districts:', error);
                    districtSelect.innerHTML = '<option value="">Error loading</option>';
                });
        }

        filterTable();
    });

    document.getElementById('districtFilter').addEventListener('change', filterTable);

    document.getElementById('resetFilters').addEventListener('click', function() {
        document.getElementById('divisionFilter').value = '';
        document.getElementById('districtFilter').innerHTML = '<option value="">All Districts</option>';
        document.getElementById('districtFilter').disabled = true;

        document.querySelectorAll('.branch-row').forEach(row => {
            row.style.display = '';
        });
    });

    function filterTable() {
        const divisionId = document.getElementById('divisionFilter').value;
        const districtId = document.getElementById('districtFilter').value;

        document.querySelectorAll('.branch-row').forEach(row => {
            const matchesDivision = !divisionId || row.dataset.division === divisionId;
            const matchesDistrict = !districtId || row.dataset.district === districtId;

            row.style.display = (matchesDivision && matchesDistrict) ? '' : 'none';
        });
    }
    </script>
</x-app-layout>