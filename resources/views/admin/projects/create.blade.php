
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
            <form method="POST" action="{{ url('admin/projects') }}" enctype="multipart/form-data">
                @csrf

                <!-- Description -->{{-- description','category','live_url','thumbnail','is_published' --}}
                <div class="mt-4 w-64">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- category -->
                <div class="mt-4 w-64">
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus autocomplete="category" />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                <!-- live_url -->
                <div class="mt-4 w-64">
                    <x-input-label for="live_url" :value="__('Live Url')" />
                    <x-text-input id="live_url" class="block mt-1 w-full" type="text" name="live_url" :value="old('live_url')" required autofocus autocomplete="live_url" />
                    <x-input-error :messages="$errors->get('live_url')" class="mt-2" />
                </div>
                <!-- thumbnail -->
                <div class="mt-4 w-64">
                    <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                    <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required autofocus autocomplete="thumbnail" />
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>
                <!-- is_published -->
                <div class="mt-4 w-64">
                    <x-input-label for="is_published" :value="__('Is Published')" />
                    <x-text-input id="is_published" class="block mt-1 w-full" type="text" name="is_published" :value="old('is_published')" required autofocus autocomplete="is_published" />
                    <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                </div>
               

                <div class="flex items-center justify-end mt-4">
                    

                    <x-primary-button class="ms-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>

        </main>
    </div>






</x-app-layout>