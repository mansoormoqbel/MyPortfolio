 <!-- Sidebar -->
        <aside class="h-screen bg-gray-800 text-white p-4">
            <h2 class="text-2xl font-bold mb-6">My Dashboard</h2>
            <ul>
                <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Home</a></li>
                <li class="mb-2"><a href="{{ route('admin.admin.projects.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Projects</a></li>
                <li class="mb-2"><a href="{{ route('admin.admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a></li>
                <li class="mb-2"><a href="{{ route('profile.edit') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Settings</a></li>
            </ul>
        </aside>