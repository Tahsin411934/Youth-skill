<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Create Branch Form -->
       

        <!-- Branches Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            
            <div class="overflow-x-auto">
                <table  class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Branch Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Upazila</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="branchesTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Data will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // Previous functions (toggleLoginFields, clearErrors, submitBranchForm) remain the same
    // ...

    // Fetch and display branches
    function fetchBranches() {
        axios.get("{{ route('branches.index') }}")
            .then(response => {
                renderBranchesTable(response.data);
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to load branches',
                    customClass: {
                        confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
                    }
                });
                console.error(error);
            });
    }

    // Render branches table data
    function renderBranchesTable(branches) {
        const tableBody = document.getElementById('branchesTableBody');
        tableBody.innerHTML = '';

        if (branches.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No branches found</td>
                </tr>
            `;
            return;
        }

        branches.forEach(branch => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${branch.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${branch.branch_name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${branch.email}</td>
                <td class="px-6 py-4 text-sm text-gray-500">${branch.address}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${branch.upazila}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${branch.phone || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="editBranch(${branch.id})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                    <button onclick="deleteBranch(${branch.id})" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Edit branch function
    function editBranch(branchId) {
        // Implement edit functionality
        Swal.fire({
            title: 'Edit Branch',
            text: `Edit functionality for branch ID: ${branchId}`,
            icon: 'info',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
            }
        });
    }

    // Delete branch function
    function deleteBranch(branchId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#006172',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300',
                cancelButton: 'bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/branches/${branchId}`)
                    .then(response => {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Branch has been deleted.',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
                            }
                        });
                        fetchBranches();
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete branch',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
                            }
                        });
                    });
            }
        });
    }

    // Load branches when page loads
    document.addEventListener('DOMContentLoaded', function() {
        fetchBranches();
    });
</script>