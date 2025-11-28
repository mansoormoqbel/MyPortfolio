
<x-app-layout>
    <div class="flex h-full">
        @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6 m-8">
            <form method="POST" action="{{ url('admin/services') }}" enctype="multipart/form-data">
                @csrf

                <!-- title -->{{-- protected $fillable = ['title','description','icon','is_active']; --}}
                <div class="mt-4 w-64">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <!-- category -->
                <div class="mt-4 w-64">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- live_url -->
                <div class="mt-4 w-64">
                    <x-input-label for="icon" :value="__('icon ')" />
                    <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" :value="old('icon')" required autofocus autocomplete="icon" />
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
               
                <!-- is_active -->
                <div class="mt-4 w-64">
                    <x-input-label for="is_active" :value="__('is_active')" />
                    <x-text-input id="is_active" class="block mt-1 w-full" type="text" name="is_active" :value="old('is_active')" required autofocus autocomplete="is_active" />
                    <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                </div>
               

                <div class="flex items-center justify-center mt-4">
                    

                    <x-primary-button class="m-4 bg-blue-600 hover:bg-blue-700">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>

        </main>
    </div>






</x-app-layout>