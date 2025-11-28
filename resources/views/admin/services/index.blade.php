
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
                <a href="services/create">{{ __('Create Services') }}</a>
            </x-primary-button>
            
            
            
            <table class="w-full border-collapse border border-gray-800">
                <thead>{{-- description','category','live_url','thumbnail','is_published' --}}
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">title</th>
                        <th class="border border-gray-300 px-4 py-2">description</th>
                        <th class="border border-gray-300 px-4 py-2">icon</th>
                        
                        <th class="border border-gray-300 px-4 py-2">is_active</th>
                         <th class="border border-gray-300 px-4 py-2">handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $p)
                        <tr>{{-- protected $fillable = ['title','description','icon','is_active']; --}}
                            <td class="border border-gray-300 px-4 py-2">{{$p->title  }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$p->description  }}</td>
                            <td class="border border-gray-300 px-4 py-2"><i class="{{ $p->icon }} text-xl" ></i></td>
                            
                            <td class="border border-gray-300 px-4 py-2">{{$p->is_active  }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-primary-button class="m-3 bg-black-600 hover:bg-black-700">
                                    <a href="{{ route('admin.admin.services.edit', $p->id) }}">{{ __('edit services') }}</a>
                                </x-primary-button>
                                <x-primary-button class="m-3 bg-green-600 hover:bg-green-700">
                                    <a   href="{{ route('admin.admin.services.show', $p->id) }}" >{{ __('show services') }}</a>
                                </x-primary-button >
                                
                                   
                                <form action="{{ url('admin/services/' . $p->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="ms-3 bg-red-600 hover:bg-red-700">
                                    {{ __('delete services') }}
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