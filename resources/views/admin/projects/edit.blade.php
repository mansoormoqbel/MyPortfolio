
<x-app-layout>
   

 

    <div class="flex h-full">
        @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6 m-8">
            
            <h1>Edit Project</h1>

            <form action="{{ route('admin.admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <!-- Description -->
                <div class="mt-4 w-64">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $project->description }}" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- category -->
                <div class="mt-4 w-64">
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" value="{{ $project->category }}" required autofocus autocomplete="category" />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <!-- live_url -->
                <div class="mt-4 w-64">
                    <x-input-label for="live_url" :value="__('Live Url')" />
                    <x-text-input id="live_url" class="block mt-1 w-full" type="text" name="live_url" value="{{ $project->live_url }}" required autofocus autocomplete="live_url" />
                    <x-input-error :messages="$errors->get('live_url')" class="mt-2" />
                </div>

                <!-- thumbnail -->
                <div class="mt-4 w-64">
                    <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                    <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"   autofocus autocomplete="thumbnail" />
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>
                 <!-- is_published -->
                <div class="mt-4 w-64">
                    <x-input-label for="is_published" :value="__(' is_published')" />
                    <x-text-input id="is_published" class="block mt-1 w-full" type="text" name="is_published" value="{{ $project->is_published }}" required autofocus autocomplete="is_published" />
                    <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                </div>
                
                

                
                <x-primary-button class="{{-- ms-6 --}} mt-4 w-64 place-content-center">
                    {{ __('Update') }}
                </x-primary-button>
                

                
            </form>


        </main>
    </div>






</x-app-layout>