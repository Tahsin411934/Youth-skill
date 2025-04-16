<div id="sidebar" class="flex flex-shrink-0 h-screen sticky top-0 bg-gradient-to-b from-gray-800 to-blue-900 border-r border-blue-700 shadow-lg">
    <!-- Sidebar Container -->
    <div class="flex flex-col h-full transition-all duration-300 ease-in-out" id="sidebar-container">
        <!-- Sidebar Header -->
        <div id="divHide" class="flex items-center w-60 justify-between h-16 px-4 bg-blue-900 shadow-md">
            <span id="sidebar-logo-text" class="text-white text-xl font-semibold whitespace-nowrap transition-all duration-300 sidebar-text">YSDB</span>
            <button id="sidebar-toggle" class="p-2 text-blue-200 rounded-md hover:text-white hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500" title="Collapse sidebar">
                <svg class="w-5 h-5" id="toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <div class="flex flex-col flex-grow px-2 py-4 overflow-y-auto" id="nav-container">
            <nav class="flex-1 space-y-2">
                <!-- Dashboard -->
                <div class="px-2">
                    <a href="/dashboard" class="flex items-center px-3 py-3 text-sm font-medium text-white rounded-lg bg-blue-700 group hover:bg-blue-600 transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text">Dashboard</span>
                    </a>
                </div>

                <!-- Main Menu Section -->
                <div class="px-2">
                    <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wider mb-2 ml-3 whitespace-nowrap sidebar-text" id="menu-heading">Main Menu</h3>
                    
                    <!-- Students Dropdown -->
                    <div id="student-dropdown" class="mb-1">
                        <button class="flex items-center justify-between w-full px-3 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text text-left">Students</span>
                            </div>
                            <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-200" id="student-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="student-dropdown-list" class="mt-1 space-y-1 pl-8 hidden">
                           
                            <a href="/central/panding/students"
                                class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Pending Students</span>
                            </a>
                            <a href="/central/students"
                                class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Students</span>
                            </a>
                        </div>
                    </div>

                    <!-- Courses Dropdown -->
                    <div id="courses-dropdown" class="mb-1">
                        <button class="flex items-center justify-between w-full px-3 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text text-left">Courses</span>
                            </div>
                            <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-200" id="courses-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="courses-dropdown-list" class="mt-1 space-y-1 pl-8 hidden">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">All Courses</span>
                            </a>
                            <a href="/courses/create" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Add New</span>
                            </a>
                            <a href="/branch/assign-course" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Assign Courses</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Branches Dropdown -->
                    <div id="branch-dropdown" class="mb-1">
                        <button class="flex items-center justify-between w-full px-3 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text text-left">Branches</span>
                            </div>
                            <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-200" id="branch-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="branch-dropdown-list" class="mt-1 space-y-1 pl-8 hidden">
                            <a href="/branches/create" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Create New Branch</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">All Branches</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Administration Section -->
                <div class="px-2 pt-4">
                    <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wider mb-2 ml-3 whitespace-nowrap sidebar-text" id="admin-heading">Administration</h3>
                    
                    <!-- System Dropdown -->
                    <div id="admin-dropdown" class="mb-1">
                        <button class="flex items-center justify-between w-full px-3 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text text-left">System</span>
                            </div>
                            <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-200" id="admin-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="admin-dropdown-list" class="mt-1 space-y-1 pl-8 hidden">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Users</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Roles</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Permissions</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 mr-3"></span>
                                <span class="whitespace-nowrap transition-all duration-300 sidebar-text">Settings</span>
                            </a>
                        </div>
                    </div>

                    <!-- Reports -->
                    <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-blue-700 hover:text-white group transition mb-1">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="ml-3 whitespace-nowrap transition-all duration-300 sidebar-text">Reports</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Footer (User Profile) -->
        <div class="p-4 border-t border-blue-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center min-w-0">
                    <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile">
                    <div class="ml-3 overflow-hidden sidebar-text">
                        <p class="text-sm font-medium text-white truncate">Dr. John Doe</p>
                        <p class="text-xs font-medium text-blue-300 truncate">Administrator</p>
                    </div>
                </div>
                <a href="#" class="text-blue-300 hover:text-white p-1 rounded-md hover:bg-blue-700 transition" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarContainer = document.getElementById('sidebar-container');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const toggleIcon = document.getElementById('toggle-icon');
    const logoText = document.getElementById('sidebar-logo-text');
    const divHide = document.getElementById('divHide');
    const sidebarTexts = document.querySelectorAll('.sidebar-text:not(#sidebar-logo-text)');
    const dropdownContents = document.querySelectorAll('[id$="-dropdown-list"]');
    const dropdownIcons = document.querySelectorAll('[id$="-dropdown-icon"]');
    
    // Check localStorage for saved state
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    
    if (isCollapsed) {
        collapseSidebar();
    }
    
    sidebarToggle.addEventListener('click', function() {
        const isCollapsed = sidebarContainer.classList.contains('w-20');
        
        if (isCollapsed) {
            expandSidebar();
            localStorage.setItem('sidebarCollapsed', 'false');
        } else {
            collapseSidebar();
            localStorage.setItem('sidebarCollapsed', 'true');
        }
    });
    
    function collapseSidebar() {
        sidebarContainer.classList.add('w-20');
        sidebarContainer.classList.remove('w-60');
        divHide.classList.remove('w-60');
        
        // Change icon to double arrow right
        toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>';
        
        // Hide logo text
        logoText.classList.add('hidden');
        
        // Hide all other sidebar texts
        sidebarTexts.forEach(el => el.classList.add('hidden'));
        
        // Center align navigation icons when collapsed
        document.querySelectorAll('#nav-container a, #nav-container button').forEach(el => {
            if (!el.classList.contains('justify-center')) {
                el.classList.add('justify-center');
            }
        });
        
        // Close all dropdowns
        dropdownContents.forEach(dropdown => dropdown.classList.add('hidden'));
        dropdownIcons.forEach(icon => icon.classList.remove('rotate-180'));
    }
    
    function expandSidebar() {
        sidebarContainer.classList.remove('w-20');
        sidebarContainer.classList.add('w-60');
        
        // Change icon to double arrow left
        toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>';
        
        // Show logo text
        logoText.classList.remove('hidden');
        
        // Show all sidebar texts
        sidebarTexts.forEach(el => el.classList.remove('hidden'));
        
        // Remove center alignment from navigation items
        document.querySelectorAll('#nav-container a, #nav-container button').forEach(el => {
            el.classList.remove('justify-center');
        });
    }
    
    // Dropdown toggle functionality
    document.querySelectorAll('[id$="-dropdown"] button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdownId = this.parentElement.id;
            const contentId = `${dropdownId}-list`;
            const iconId = `${dropdownId}-icon`;
            
            const content = document.getElementById(contentId);
            const icon = document.getElementById(iconId);
            
            // Toggle current dropdown
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
            
            // Close all other dropdowns
            document.querySelectorAll('[id$="-dropdown-list"]').forEach(otherContent => {
                if (otherContent.id !== contentId) {
                    otherContent.classList.add('hidden');
                    const otherIconId = otherContent.id.replace('-list', '-icon');
                    const otherIcon = document.getElementById(otherIconId);
                    if (otherIcon) otherIcon.classList.remove('rotate-180');
                }
            });
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        dropdownContents.forEach(content => content.classList.add('hidden'));
        dropdownIcons.forEach(icon => icon.classList.remove('rotate-180'));
    });
});
</script>