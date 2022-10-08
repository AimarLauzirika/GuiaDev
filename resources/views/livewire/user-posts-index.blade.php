<div>
    <x-slot name="header">
        <a href="{{route('posts.create')}}" class="text-sm text-gray-800 hover:text-emerald-700">
            {{ __('Crear Post') }}
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                @if (count(Auth::user()->posts))

                <h1 class="text-center text-2xl my-10 font-bold text-slate-900">Mis Posts</h1>
                
                <div class="p-5 space-y-5">
                    
                    <div class="flex justify-around mb-10">
                        <div class="flex justify-end text-xs">
                            <label>
                                <p>Publicado / Oculto</p>
                                <select wire:model="filterPublic" class="py-1 text-xs pl-1">
                                    <option value="%">Todos</option>
                                    <option value="0">Oculto</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </label>
                        </div>
                        
                        <div class="flex justify-end text-xs">
                            <label>
                                <p>¿Terminado?</p>
                                <select wire:model="filterfinished" class="py-1 text-xs pl-1">
                                    <option value="%">Todos</option>
                                    <option value="0">Sin Terminar</option>
                                    <option value="1">Terminado</option>
                                </select>
                            </label>
                        </div>
                        <div class="flex justify-end text-xs">
                            <label>
                                <p>Tema</p>
                                <select wire:model="filterSubjectId" class="py-1 text-xs pl-1">
                                    <option value="%">Todos</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="flex">
                        <p class="mr-3 mt-auto ml-auto">Buscar:</p>
                        <x-jet-input wire:model="filterSearch" class="mr-auto text-sm border rounded-xl w-2/3 border-slate-300"></x-jet-input>
                    </div>
                </div>
                <table class="min-w-full leading-normal mt-5">
                    <thead class="border-b text-xs text-neutral-700 text-center">
                    <td class="p-2 font-semibold text-left pl-5 text-base">Post</td>
                    <td class="p-2">Publicado</td>
                    <td class="p-2">Terminado</td>
                    <td class="p-2">Tema</td>
                    </thead>
                    <tbody>
                            
                        @forelse ($posts as $post)
                        @if ($post->finished == 0)
                        {{-- <tr class="text-sm hover:bg-amber-100/70 hover:border-l-4 border-emerald-500 bg-amber-100/50"> --}}
                        <tr class="text-sm  text-amber-800">
                        @else
                        <tr class="text-sm ">
                        @endif
                            <td>
                                <div href="{{route('posts.show', $post)}}" class=" cursor-pointer">
                                    <x-post-div :post="$post" class="border-none font-semibold hover:text-emerald-600 h-fit">
                                        {{$post->title}}
                                        <x-slot name="description">
                                            {{-- {{$post->description}} --}}
                                        </x-slot>
                                        <x-slot name="adition"></x-slot>
                                    </x-post-div>
                                </div>
                            </td>
                            
                            <td>
                                @if ($post->public)
                                <p class="text-emerald-500 font-semibold text-center">Sí</p>
                                @else
                                <p class="text-black font-semibold text-center">No</p>
                                @endif
                            </td>
                            <td>
                                @if ($post->finished)
                                <p class="text-sky-700 text-center font-semibold">Sí</p>
                                @else
                                <p class="text-amber-800 text-center font-semibold">No</p>
                                @endif
                            </td>
                            <td class="text-right px-3">
                                <a href="{{route('subjects.show', $post->subject)}}" style="color: {{$post->subject->color}}" class="my-auto font-bold rounded-full decoration-1 hover:underline"><p class="text-center">{{$post->subject->name}}</p></a>
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
                    <tfoot>
                    </tfoot>
                </table>
                {{$posts->links()}}
                @else
                    <h2 class="p-3">No has creado ningún Post todavía.</h2>
                @endif
                <x-jet-button class="mt-7 ml-6"><a href="{{route('posts.create')}}">+ Crear Post</a></x-jet-button>
            </div>
        </div>
    </div>
</div>
