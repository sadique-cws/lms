<aside class="bg-gray-800 text-white w-64 min-h-screen fixed left-0 top-0 transform transition-transform duration-300 ease-in-out lg:translate-x-0" 
       id="sidebar">
    <div class="pt-20 pb-4 px-4 flex flex-col h-screen">
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg ">
                <i class="fas fa-book"></i>
                <span>Courses</span>
            </a>
            
            @can('view-students')
            <a href="" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg ">
                <i class="fas fa-users"></i>
                <span>Students</span>
            </a>
            @endcan
            
            @can('admin-access')
            <a href="{{ route('admin.categories') }}" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg {{ request()->routeIs('admin.categories') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">
                <i class="fas fa-tag"></i>
                <span>Categories</span>
            </a>
            @endcan
            
            <a href="" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg ">
                <i class="fas fa-tasks"></i>
                <span>Assignments</span>
            </a>
            
            <a href="" 
               class="flex items-center space-x-2 py-2 px-4 rounded-lg ">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </nav>

        <div class="mt-auto pt-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center space-x-2 py-2 px-4 rounded-lg text-red-400 hover:bg-gray-700 hover:text-red-300">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<script>
document.getElementById('sidebar-toggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
});
</script>
