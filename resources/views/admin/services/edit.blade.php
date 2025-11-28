
<x-app-layout>
   

 

    <div class="flex h-full">
        @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6 m-8">
            
            <h1>Edit service</h1>

            <form action="{{ route('admin.admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- title -->
                <div class="mt-4 w-64">
                    <x-input-label for="title" :value="__('title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $service->title }}" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                 <!-- Description -->
                <div class="mt-4 w-64">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $service->description }}" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                

               

                <!-- icon -->
                <div class="mt-4 w-64">
                    <x-input-label for="icon" :value="__('Icon')" />
                    <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon"   autofocus autocomplete="icon" />
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
                 <!-- is_active -->
                <div class="mt-4 w-64">
                    <x-input-label for="is_active" :value="__(' Is Active')" />
                    <x-text-input id="is_active" class="block mt-1 w-full" type="text" name="is_active" value="{{  $service->is_active }}" required autofocus autocomplete="is_active" />
                    <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                </div>
                
                

                
                <x-primary-button class="{{-- ms-6 --}} mt-4 w-64 place-content-center">
                    {{ __('Update') }}
                </x-primary-button>
                

                
            </form>


        </main>
    </div>






</x-app-layout>