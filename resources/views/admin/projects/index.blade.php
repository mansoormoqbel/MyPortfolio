
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
        <main class="flex-1 p-6 ">
            <h1 class="text-3xl font-semibold mb-4">Welcome Back!</h1>
             <x-primary-button class="ms-3">
                <a href="projects/create">{{ __('create project') }}</a>
            </x-primary-button>
            {{-- <button type="button" class="border bg-gray-800 bg-sky-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                create project
            </button> --}}
            
            
            <table class="w-full border-collapse border border-gray-800">
                <thead>{{-- description','category','live_url','thumbnail','is_published' --}}
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">description</th>
                        <th class="border border-gray-300 px-4 py-2">category</th>
                        <th class="border border-gray-300 px-4 py-2">live_url</th>
                        <th class="border border-gray-300 px-4 py-2">thumbnail</th>
                        <th class="border border-gray-300 px-4 py-2">is_published</th>
                         <th class="border border-gray-300 px-4 py-2">handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pro as $p)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{$p->description  }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$p->category  }}</td>
                            <td class="border border-gray-300 px-4 py-2"><a href="{{ $p->live_url  }}">{{ $p->live_url  }}</a></td>
                            <td class="border border-gray-300 px-4 py-2">thumbnails/{{$p->thumbnail  }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$p->is_published  }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-primary-button class="m-3 bg-black-600 hover:bg-black-700">
                                    <a href="{{ route('admin.admin.projects.edit', $p->id) }}">{{ __('edit project') }}</a>
                                </x-primary-button>
                                <x-primary-button class="m-3 bg-green-600 hover:bg-green-700">
                                    <a   href="{{ route('admin.admin.projects.show', $p->id) }}{{-- {{ url('projects/show/' . $p->id) }} --}}" >{{ __('show project') }}</a>
                                </x-primary-button >
                                
                                   {{--  <a href="{{ url('admin/projects/$p->id`') }}">{{ __('delete project') }}</a> --}}
                                <form action="{{ url('admin/projects/' . $p->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="ms-3 bg-red-600 hover:bg-red-700">
                                    {{ __('delete project') }}
                                    </x-primary-button>
                                </form>
                                
                            </td>
                            

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </main>
    </div>






</x-app-layout>