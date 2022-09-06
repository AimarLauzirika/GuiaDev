<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Temas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class= "overflow-hidden p-5 text-center flex space-x-3">
                
                <div style="color: {{$subject->color}}" class="w-5/12 bg-white shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold">{{$subject->name}}</h2>
                </div>
                <div class="w-7/12 bg-white shadow-lg rounded-lg">
                    <h2 class="text-xl">Capítulos</h2>
                </div>
                
            </div>
        </div>
    </div>
   

</x-app-layout>
