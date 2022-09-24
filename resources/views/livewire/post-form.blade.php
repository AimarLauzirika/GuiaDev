<div>
    <x-slot>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 bg-">
                <h1 class="text-center text-gray-800 text-2xl font-bold my-10">
                    @if ($formFunction === 'create')
                        Crear Post
                    @elseif($formFunction === "edit")
                        Editar el Post <span class="font-bold text-xl">{{ $post->title }}</span>
                    @endif
                </h1>
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
                            <input type="hidden" id="contentValue" value="{{$content}}">
                            <label wire:ignore>
                                <p class="mt-auto mr-3">Contenido:</p>
                                <textarea wire:model="content" id="editor" class="w-full"></textarea>
                                <x-jet-input-error for="content">@error('content'){{$message}}@enderror</x-jet-input-error>
                            </label>
                        </div>
                    </fieldset>
                    <fieldset class="md:flex p-5 justify-around">
                        <div class="border p-4 rounded-lg">
                            <p class="mb-4">¿Está terminado el Post?</p>
                            <label class="flex">
                                <input wire:model="finished" type="radio" value="1" class="my-auto mr-2"> <p>Sí</p>
                            </label>
                            <label class="flex">
                                <input wire:model="finished" type="radio" value="0" class="my-auto mr-2"> <p>No</p>
                            </label>
                            <x-jet-input-error for="finished">@error('finished'){{$message}}@enderror</x-jet-input-error>
                        </div>
                        <div class="border p-4 rounded-lg">
                            <p class="mb-4">¿Quieres que esté público u oculto?</p>
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
                        @if ($formFunction === 'edit')
                            <x-jet-danger-button wire:click="$emit('alertDelete',{{$post}})">Eliminar</x-jet-danger-button>
                        @else
                            <div></div>
                        @endif
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

    @push('scripts')
        <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
        <script>

            //* CKEditor
            const contentValue = document.querySelector('#contentValue').value;
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    toolbar: {
                        shouldNotGroupWhenFull: true
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { 
                                model: 'heading1', 
                                view: {
                                    name:'h1', 
                                    classes: ['text-xl', 'text-orange-800', 'font-bold', 'bg-red-50', 'px-1', 'my-4']}, 
                                title: 'Heading 1', 
                                class: 'ck-heading_heading1' 
                            },
                            { 
                                model: 'heading2', 
                                view: {
                                    name: 'h2', 
                                    classes: ['text-indigo-800', 'bg-indigo-50', 'font-bold', 'text-lg', 'px-1', 'my-4']},
                                title: 'Heading 2', 
                                class: 'ck-heading_heading2'
                            },
                            { 
                                model: 'heading3', 
                                view: {
                                    name: 'h3', 
                                    classes: ['text-sky-800', 'font-bold', 'text-lg', 'px-1', 'my-4']},
                                title: 'Heading 3', 
                                class: 'ck-heading_heading3' 
                            },
                            { model: 'heading4', 
                            view: {
                                    name: 'h4', 
                                    classes: ['font-bold', 'px-1', 'my-4']}, 
                            title: 'Heading 4', 
                            class: 'ck-heading_heading4' }
                        ]
                    }
                })
                .then( editor => {
                    // console.log(editor);
                    editor.setData(contentValue)
                    editor.model.document.on('change:data', () => {
                        @this.set('content', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );



            //* SweetAlert

            Livewire.on('alertDelete', $post => {

                Swal.fire({
                    title: '¿Eliminar?',
                    text: "Si lo eliminas no podrás deshacer los cambios",
                    icon: 'warning',
                    iconColor: '#e7470b',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('post-form', 'delete', $post)
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                    }
                })
            })

        </script>
    
    @endpush
</div>
