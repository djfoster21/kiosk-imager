<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('images.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="text-2xl font-semibold">Upload new image</div>
                    <div class="text-gray-900">
                        <x-text-input type="file" name="image" required/>
                    </div>
                    <div>
                        <x-primary-button class="mt-3">
                            Upload image
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-images.images/>
            </div>
        </div>

    </div>
</x-app-layout>
