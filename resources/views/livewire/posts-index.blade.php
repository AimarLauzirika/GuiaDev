<div>
    <x-slot name="header">
        <h2 class="text-center text-xl text-gray-800">
            {{ __('Todos los Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex">
                                    <p class="mr-3 mt-auto">Buscar:</p>
                                    <x-jet-input wire:model="filterSearch"></x-jet-input>
                                </div>
                            </th>
                            <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex justify-end">
                                    {{-- <p class="mt-auto mr-3 text-xs">Autor:</p> --}}
                                    <select wire:model="filterUserId" class="py-1 text-xs">
                                        <option value="%">Autores</option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex justify-end text-xs">
                                    {{-- <p class="mt-auto mr-3">Tema:</p> --}}
                                    <select wire:model="filterSubjectId" class="py-1 text-xs">
                                        <option value="%">Temas</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr class="text-sm hover:bg-neutral-50">
                            <td>
                                <div href="{{route('posts.show', $post)}}" class="hu cursor-pointer">
                                    <x-post-div :post="$post" class="border-none font-semibold hover:text-emerald-700">
                                        {{$post->title}}
                                        <x-slot name="description">
                                            {{$post->description}}
                                        </x-slot>
                                        <x-slot name="adition"></x-slot>
                                    </x-post-div>
                                </div>
                            </td>
                            <td class="text-right px-3">
                                {{$post->user->name}}
                            </td>
                            <td class="text-right px-3">
                                <a href="{{route('subjects.show', $post->subject)}}" style="color: {{$post->subject->color}}" class="my-auto font-bold rounded-full decoration-1 hover:underline">{{$post->subject->name}}</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>
                                <h2 class="p-3">No hay ningún Post con estos parámetros.</h2>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <x-jet-button class="mt-7"><a href="{{route('posts.create')}}">+ Crear Post</a></x-jet-button>
            </div>
        </div>
    </div>
</div>
