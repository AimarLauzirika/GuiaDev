<x-app-layout>
    <x-slot name="header">
        <a class="text-gray-800">
            {{ __('Mis Posts') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @livewire('user-posts-index')
                <x-jet-button class="mt-7"><a href="{{route('posts.create')}}">+ Crear Post</a></x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>
