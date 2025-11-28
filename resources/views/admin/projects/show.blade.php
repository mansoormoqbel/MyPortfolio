

<x-app-layout>
   {{--  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

   {{--  <h1>لوحة تحكم الأدمن</h1>
    <p>عدد المشاريع: {{ $projectsCount }}</p>
    <p>عدد الخدمات: {{ $servicesCount }}</p>

    <h3>أحدث المشاريع</h3>
    <ul>
        @foreach($recentProjects as $p)
            <li>{{ $p->title }}</li>
        @endforeach
    </ul> --}}

 

    <div class="flex h-full">
         @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6 m-8">
            {{-- description  category  live_url   thumbnail   is_published--}}
            <h1>Project Details</h1>

            <p><strong>ID:</strong> {{ $project->id }}</p>
            <p><strong>Description:</strong> {{ $project->description }}</p>
            <p><strong>Category:</strong> {{ $project->category }}</p>
            <p><strong>Live URL:</strong> <a href="{{ $project->live_url }}" target="_blank">{{ $project->live_url }}</a></p>

            @if($project->thumbnail)
                <p><strong>Thumbnail:</strong></p>
                <img src="{{ asset('thumbnails/' . $project->thumbnail) }}" width="200">
            @endif

            <p><strong>Published:</strong> {{ $project->is_published ? 'Yes' : 'No' }}</p>




        </main>
    </div>
        



</x-app-layout>
