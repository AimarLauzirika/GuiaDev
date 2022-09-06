<div>
    {{-- {{dd($subject->id)}} --}}
    <p wire:click="$set('open', true)" data-id="{{$subject->id}}" class="b-edit hover:text-amber-500 hover:bg-neutral-200 text-base py-1 px-3 h-11 pt-2 rounded-3xl cursor-pointer">Editar</p>
    
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="border-b mb-16 mt-5 text-center text-2xl">Editar <span style="color: {{$color}}" class="font-extrabold">{{$name}}</span></h2>
        </x-slot>
        <x-slot name="content">
            <div class="mb-12 space-y-14 text-base">
                <label class="flex">
                    <p class="mt-auto">Nombre del Tema:</p>
                    <x-jet-input wire:model="name" style="color: {{$color}}" class="flex-1 ml-3 border-b-2 rounded-none focus:outline-none text-2xl font-bold" value="{{$name}}" autofocus/>
                </label>
                <label class="flex">
                    <p class="mt-auto">Cambiar el Color:</p>
                    <x-jet-input wire:model="color" type="color" value="{{$color}}" class=" mx-3 h-8 w-80" />
                </label>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="resetModal">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click="save" class="ml-5">Actualizar</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
