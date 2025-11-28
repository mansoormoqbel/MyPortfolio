

<x-app-layout>
    <div class="flex h-full">
         @include('layouts.aside')

        <!-- Main Content -->
        <main class="flex-1 p-6 m-8">
            <h1>service Details</h1>

            <p><strong>ID:</strong> {{ $service->id }}</p>
            <p><strong>title:</strong> {{ $service->title }}</p>
            <p><strong>description:</strong> {{ $service->description }}</p>
            

            @if($service->icon)
                <p><strong>icon:</strong></p>
                <img src="{{ asset('icon/' . $service->icon) }}" width="200">
            @endif

            <p><strong>Is active:</strong> {{ $service->is_active==true ? 'Yes' : 'No' }}</p>




        </main>
    </div>
        



</x-app-layout>
