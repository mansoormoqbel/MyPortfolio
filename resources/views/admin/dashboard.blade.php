
<x-app-layout>
   

    {{-- <h1>لوحة تحكم الأدمن</h1>
    <p>عدد المشاريع: {{ $projectsCount }}</p>
    <p>عدد الخدمات: {{ $servicesCount }}</p>

    <h3>أحدث المشاريع</h3>
    <ul>
        @foreach($recentProjects as $p)
            <li>{{ $p->title }}</li>
        @endforeach
    </ul> --}}

 

    <div class="flex h-full">
        <!-- Sidebar -->
        @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-semibold mb-4">Welcome Back!</h1>
            
            <!-- Cards -->
            {{-- <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold">Users</h2>
                    <p class="text-2xl">120</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold">Sales</h2>
                    <p class="text-2xl">$4,500</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold">Orders</h2>
                    <p class="text-2xl">75</p>
                </div>
            </div> --}}
                {{-- <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot> --}}

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ __("You're logged in!") }}
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>






</x-app-layout>