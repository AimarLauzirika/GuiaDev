<div>
    <x-slot>
        <h1 class="text-center text-gray-800 leading-tight">
            @if ($formFunction === 'create')
                Crear Post
            @elseif($formFunction === "edit")
                Editar el Post <span class="font-bold text-xl">{{ $post->title }}</span>
            @endif
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 bg-">
                <form wire:submit.prevent="submit">
                    <fieldset class="justify-around p-5 md:flex">
                        <label>
                            <div class="flex">
                                <p class="mr-2 mt-auto">Tema:</p>
                                <select wire:model="subject_id" wire:click="selectSubject" class="py-1 rounded-md">
                                    <option value="">-- Elige un Tema --</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-jet-input-error for="subject_id">@error('subject_id'){{$message}}@enderror</x-jet-input-error>
                        </label>
                        <label class="flex mb-auto">
                            <p class="mr-2 mt-auto">Capítulo:</p>
                            <select wire:model="chapter_id" class="py-1 rounded-md disabled:text-gray-500 disabled:border-gray-300"
                                @if (!$subject_id)
                                    disabled="true"
                                @endif
                            >
                                <option value="">¿Pertenece a uno de estos capítulos?</option>
                                @foreach ($chapters as $chapter)
                                    <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                                @endforeach
                                <option value="">Ninguno de los anteriores</option>
                            </select>
                            <x-jet-input-error for="chapter_id">@error('chapter_id'){{$message}}@enderror</x-jet-input-error>
                        </label>
                    </fieldset>
                    <fieldset class="p-5 space-y-8">
                        <label>
                            <div class="flex">
                                <p class="mt-auto mr-3">Título:</p>
                                <x-jet-input wire:model="title" class="bg-neutral-50"></x-jet-input>
                            </div>
                            <x-jet-input-error for="title">@error('title'){{$message}}@enderror</x-jet-input-error>
                        </label>
                        <label class="flex">
                            <p class="mt-auto mr-3">Descripción:</p>
                            <x-jet-input wire:model="description" class="bg-neutral-50"></x-jet-input>
                            <x-jet-input-error for="description">@error('description'){{$message}}@enderror</x-jet-input-error>
                        </label>
                        <div>
                            <label>
                                <p class="mt-auto mr-3">Contenido:</p>
                                <textarea wire:model="content" id="editor" class="w-full h-72"></textarea>
                                <x-jet-input-error for="content">@error('content'){{$message}}@enderror</x-jet-input-error>
                            </label>
                        </div>
                    </fieldset>
                    <fieldset class="md:flex p-5 justify-around">
                        <div class="border p-4 rounded-lg mb-5">
                            <p>¿Está terminado el Post?</p>
                            <label class="flex">
                                <input wire:model="finished" type="radio" value="1" class="my-auto mr-2"> <p>Sí</p>
                            </label>
                            <label class="flex">
                                <input wire:model="finished" type="radio" value="0" class="my-auto mr-2"> <p>No</p>
                            </label>
                            <x-jet-input-error for="finished">@error('finished'){{$message}}@enderror</x-jet-input-error>
                        </div>
                        <div class="border p-4 rounded-lg">
                            <p>¿Quieres que esté público o oculto?</p>
                            <label class="flex">
                                <input wire:model="public" type="radio" value="1" class="my-auto mr-2"> <p>Público</p>
                            </label>
                            <label class="flex">
                                <input wire:model="public" type="radio" value="0" class="my-auto mr-2"> <p>Oculto</p>
                            </label>
                            <x-jet-input-error for="public">@error('public'){{$message}}@enderror</x-jet-input-error>
                        </div>
                            
                    </fieldset>
                    <fieldset class="p-5 mt-8 flex justify-between">
                        <x-jet-danger-button wire:click="delete">Eliminar</x-jet-danger-button>
                        <div>
                            <a href="{{$btnCancelRedirect}}"><x-jet-secondary-button>Cancelar</x-jet-secondary-button></a>
                            <x-jet-button>{{$btnSubmitContent}}</x-jet-button>
                        </div>
                    </fieldset>
                    @if (count($errors->all()))
                        <p class="text-right text-sm text-red-600 font-semibold">Hay campos incorrectos en el formulario</p>
                    @endif
                        
                        
                </form>
            </div>
        </div>
    </div>

</div>
