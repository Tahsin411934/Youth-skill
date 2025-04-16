<nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left side - Logo and Name -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                    <div class=" w-16 rounded-full bg-white ">
    <img src="logo.png" alt="">
</div>
                        <span class="ml-2 text-2xl font-bold text-[#045E7B]">YSDB</span>
                    </div>
                </div>

                <!-- Right side - Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">Home</a>
                    
                    <!-- Branches Dropdown -->
                    <div class="dropdown relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button @click="open = !open" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium flex items-center">
                            Branches
                            <svg class="ml-1 h-4 w-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10" x-show="open" x-transition>
                            <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-[#F37021] hover:text-white">Branch 1</a>
                            <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-[#F37021] hover:text-white">Branch 2</a>
                            <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-[#F37021] hover:text-white">Branch 3</a>
                        </div>
                    </div>
                    
                    <a href="#" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">Result</a>
                    <a href="#" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">Gallery</a>
                    <a href="#" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">Notice</a>
                    <a href="#" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">About Us</a>
                    <a href="#" class="text-gray-700 hover:text-[#F37021] px-3 py-2 text-base font-medium">Contact Us</a>
                    
                    <!-- Login Dropdown -->
                    <div class="dropdown relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button @click="open = !open" class="text-gray-700 border border-[#F37021] hover:bg-[#F37021] hover:text-[#045E7B] rounded   px-3 py-2 text-base font-medium flex items-center">
                            Login
                            
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10" x-show="open" x-transition>
                            <a href="/branch/dashboard" class="block px-4 py-2 text-base text-gray-700 hover:bg-[#F37021] hover:text-white">Branch Login</a>
                            <a href="/login" class="block px-4 py-2 text-base text-gray-700 hover:bg-[#F37021] hover:text-white">Central Login</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#F37021] hover:bg-gray-100 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" @click="mobileOpen = !mobileOpen">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu icon -->
                        <svg class="block h-6 w-6" x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close icon -->
                        <svg class="hidden h-6 w-6" x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu" x-data="{ 
            mobileOpen: false,
            branchesOpen: false,
            loginOpen: false 
        }" x-show="mobileOpen" @click.outside="mobileOpen = false" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Home</a>
                
                <!-- Branches Dropdown Mobile -->
                <div class="relative">
                    <button @click="branchesOpen = !branchesOpen" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50 flex justify-between items-center">
                        Branches
                        <svg class="h-5 w-5 transform transition-transform" :class="{ 'rotate-180': branchesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="pl-4" x-show="branchesOpen" x-collapse>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Branch 1</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Branch 2</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Branch 3</a>
                    </div>
                </div>
                
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Result</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Gallery</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">About Us</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Contact Us</a>
                
                <!-- Login Dropdown Mobile -->
                <div class="relative">
                    <button @click="loginOpen = !loginOpen" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50 flex justify-between items-center">
                        Login
                        <svg class="h-5 w-5 transform transition-transform" :class="{ 'rotate-180': loginOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="pl-4" x-show="loginOpen" x-collapse>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Branch Login</a>
                        <a href="/login" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#F37021] hover:bg-gray-50" @click="mobileOpen = false">Central Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Alpine JS for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        }
    </style>