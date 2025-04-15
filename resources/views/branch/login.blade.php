<x-guest-layout>
    <div class="flex flex-col mx-auto mt-3 max-w-md p-5 rounded-lg bg-white shadow-xl">
        <div class="mb-10 text-center">
            <!-- Logo placeholder - replace with your actual logo -->
            
            
            <h1 class="text-3xl font-bold text-[#003E59]">Branch Login</h1>
            <p class="mt-2 text-sm text-gray-500">Enter your credentials to access the dashboard</p>
        </div>

        <!-- Error/Success Messages -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="font-medium">Login Error</h3>
                </div>
                <ul class="mt-2 ml-7 list-disc text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="font-medium">Success</h3>
                </div>
                <p class="mt-2 ml-7 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('branches.login') }}" class="space-y-6">
            @csrf
            
            <div class="space-y-5">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" 
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F37021] focus:border-[#F37021] sm:text-sm"
                               required autofocus placeholder="Enter your username">
                    </div>
                    @error('username')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-xs font-medium text-[#F37021] hover:text-[#003E59]">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" 
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F37021] focus:border-[#F37021] sm:text-sm"
                               required placeholder="Enter your password">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#003E59] hover:bg-[#00283D] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F37021] transition-colors duration-200">
                    Sign In
                </button>
            </div>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 pt-5 border-t border-gray-200">
            <p class="text-xs text-center text-gray-500">
                &copy; {{ date('Y') }} Your Company. All rights reserved.
            </p>
        </div>
    </div>
</x-guest-layout>