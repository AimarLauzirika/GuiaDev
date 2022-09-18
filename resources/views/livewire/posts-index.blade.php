<div>
    <x-slot name="header">
        <a href="{{route('posts.create')}}" class="text-sm text-gray-800 hover:text-emerald-700">
            {{ __('Crear Post') }}
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-center mt-10 text-2xl font-bold text-slate-800">Todos los Posts</h1>
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="text-gray-600 font-semibold text-xs uppercase h-32">
                            <th class="px-3 py-3 text-left text-xs tracking-wider">
                                <div class="flex">
                                    <p class="mr-3 mt-auto">Buscar:</p>
                                    <x-jet-input wire:model="filterSearch"></x-jet-input>
                                </div>
                            </th>
                            <th class="px-3 py-3 tracking-wider">
                                <div class="flex justify-end">
                                    {{-- <p class="mt-auto mr-3 text-xs">Autor:</p> --}}
                                    <select wire:model="filterUserId" class="py-1 text-xs">
                                        <option value="%">Autores</option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th class="px-3 py-3 text-left tracking-wider">
                                <div class="flex justify-end">
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
                                    <x-post-div :post="$post" class="border-none font-semibold">
                                        {{$post->title}}
                                        <x-slot name="description">
                                            {{$post->description}}
                                        </x-slot>
                                        <x-slot name="adition"></x-slot>
                                    </x-post-div>
                                </div>
                            </td>
                            <td class="text-right px-3">
                                {{$post->user->username}}
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
                <div class="px-6 pt-5">
                    {{$posts->links()}}
                </div>
                <x-jet-button class="mt-10 ml-5"><a href="{{route('posts.create')}}">+ Crear Post</a></x-jet-button>
            </div>
        </div>
    </div>
</div>
