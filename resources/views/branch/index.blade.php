<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Student Management</h2>

                    @if($students->isEmpty())
                    <p class="text-gray-500">No students found.</p>
                    @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">Name</th>
                                    <th class="px-6 py-3 text-left">Parents</th>
                                    <th class="px-6 py-3 text-left">Contact</th>
                                    <th class="px-6 py-3 text-left">Course</th>
                                    
                                    <th class="px-6 py-3 text-left">Status</th>
                                    <th class="px-6 py-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($students as $student)
                                <tr>
                                    <td class="px-6 py-4">{{ $student->name }}</td>
                                    <td class="px-6 py-4">
                                        <div>Father: {{ $student->father_name }}</div>
                                        <div>Mother: {{ $student->mother_name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>{{ $student->phone_number }}</div>
                                        <div class="text-sm text-gray-500">address: {{ $student->address }}</div>
                                    </td>
                                    <td class="px-6 py-4">{{ $student->name_of_course }}</td>
                                    
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            {{ $student->status === 'verified' ? 'bg-green-100 text-green-800' : 
                                               ($student->status === 'active' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $student->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <!-- Profile Button -->
                                            <a href="{{ route('students.show', $student->id) }}"
                                                class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                                                Profile
                                            </a>

                                            <!-- Verify Button -->
                                            @if($student->status !== 'verified')
                                            <button onclick="verifyStudent({{ $student->id }})"
                                                class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600">
                                                Verify
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function verifyStudent(studentId) {
        if (confirm('Are you sure you want to verify this student?')) {
            axios.post(`/students/${studentId}/verify`)
                .then(response => {
                    alert(response.data.message);
                    window.location.reload();
                })
                .catch(error => {
                    alert('Error verifying student: ' + error.response.data.message);
                });
        }
    }
</script>

   
</x-app-layout>