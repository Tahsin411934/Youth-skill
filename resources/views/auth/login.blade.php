<x-guest-layout>
    <div class="mt-3 flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-xl shadow-lg">
            <!-- Header -->
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-[#006172]">
                    {{ __('Central Login') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Access your account dashboard
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="rounded-md shadow-sm space-y-4">
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-[#006172] mb-1"/>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <x-text-input id="email" 
                                         class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F37021] focus:border-[#F37021] sm:text-sm" 
                                         type="email" 
                                         name="email" 
                                         :value="old('email')" 
                                         required 
                                         autofocus 
                                         autocomplete="email"
                                         placeholder="Enter your email"/>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600"/>
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-[#006172] mb-1"/>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <x-text-input id="password" 
                                         class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F37021] focus:border-[#F37021] sm:text-sm"
                                         type="password"
                                         name="password"
                                         required
                                         autocomplete="current-password"
                                         placeholder="Enter your password"/>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600"/>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" 
                               name="remember" 
                               type="checkbox" 
                               class="h-4 w-4 text-[#F37021] focus:ring-[#F37021] border-gray-300 rounded"/>
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-[#F37021] hover:text-[#006172] hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="group relative w-1/3 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#006172] hover:bg-[#004d5a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F37021] transition-colors duration-200">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>