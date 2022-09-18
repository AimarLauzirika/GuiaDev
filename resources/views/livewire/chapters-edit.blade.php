<div>

    <p wire:click="$set('open', true)" class="cursor-pointer text-neutral-500 hover:text-slate-900">Administrar Capítulos</p>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h3 class="text-center text-3xl mb-9 mt-5">Administrar <span class="font-bold">Capítulos</span></h3>
        </x-slot>
        <x-slot name="content">
            <div class="flex justify-evenly">
                <div>
                    {{-- <h4 class="font-bold text-center mb-4">Vista Preliminar</h4> --}}
                    <div id="sortable" class="border-b my-5">
                    @for ($i = 0; $i < count($chapters); $i++)
                        <div data-id="{{$chapters[$i]->id}}" class="flex justify-between border-t py-1 px-3 hover:bg-sky-100/50 sortableItem">
                            <div class="flex handle cursor-grab">
                                <p>{{$i+1}}.-</p>
                                <p class="pl-2">{{$chapters[$i]->name}}</p>
                            </div>
                            <div class="flex">
                                <p wire:click="editingChapter({{$chapters[$i]}})" class="ml-3 hover:text-amber-600 cursor-pointer edit-button">Edit</p>
                                <p wire:click="delete({{$chapters[$i]}})" class="ml-3 hover:text-red-600 cursor-pointer">X</p>
                            </div>
                        </div>
                    @endfor
                    </div>
                    <p class="text-slate-500">Drag & Drop para reordenar</p>
                </div>
                <div class="w-0.5 bg-neutral-200 mx-5"></div>
                <div>
                    <p wire:click="showCreateDiv" id="pCreateChapter" class="hover:underline cursor-pointer {{$pAddHidden}}">Añadir Capítulo</p>
                    <div id="divCreate" class="{{$createHidden}}">
                        <div class="flex">
                            <x-jet-input wire:model.defer="name" id="inputNewChapter" placeholder="Nuevo Capítulo"></x-jet-input>
                            <x-jet-button wire:click="store">Añadir</x-jet-button>
                            <x-jet-danger-button wire:click="hiddenReset">X</x-jet-danger-button>
                        </div>
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>
                    <div id="divEdit" class="{{$editHidden}}">
                        <h2 class="text-center text-xl my-5">Editar {{isset($editingChapter->name) ? $editingChapter->name : '' }}</h2>
                        <div class="flex">
                            <x-jet-input wire:model.defer="name" value="{{$editNewName}}"></x-jet-input>
                            <div class="flex">
                                <x-jet-button wire:click="update">Actualizar</x-jet-button>
                                <x-jet-danger-button wire:click="hiddenReset">X</x-jet-danger-button>
                            </div>
                        </div>
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)" class="mr-3">Cerrar</x-jet-secondary-button>
            {{-- <x-jet-button>Actualizar</x-jet-button> --}}
        </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')

        {{-- SortableJS (Drag & Drop) --}}
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            // import Sortable from 'sortablejs';
            function dragAndDrop() {
                new Sortable(sortable, {
                    handle: '.handle',
                    animation: 150,
                    ghostClass: 'bg-sky-100'
                });
            }
            dragAndDrop()
            Livewire.on('sortable', () => {
                setTimeout(() => {
                    dragAndDrop()
                }, 1000);
            })
            
            const sortableItems = document.querySelectorAll('.sortableItem')
            sortableItems.forEach( item => {
                item.addEventListener('dragend', e => {
                    console.log('dragend');
                    resetPositions()
                })
            })
            function resetPositions() {
                const items = document.querySelectorAll('.sortableItem')
                let positions = []
                for (let i = 0; i < items.length; i++) {
                    positions.push(items[i].dataset.id)
                }
                Livewire.emit('dragend', positions)
            }
        </script>

        <script>
            //* Sweetalert
            Livewire.on('alertErrorChapterHasPosts', ()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Denegado',
                    text: 'No puedes eliminar un capítulo que contiene Posts.',
                })
            })
        </script>
    @endpush
</div>
