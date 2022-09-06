<div>

    <p wire:click="$set('open', true)" class="font-normal text-sm text-neutral-500 hover:text-black cursor-pointer mb-4">+ Crear Tema</p>

    <x-jet-dialog-modal wire:model="open">
        @slot('title')
            <h2 class="text-center text-2xl">Crear nuevo Tema</h2>
        @endslot

        @slot('content')

            <div class="my-16">
                <input wire:model.defer="name" type="text" class="w-full border-0 border-b border-neutral-300 p-1 placeholder:text-slate-400 rounded-sm focus:outline-none" placeholder="Nombre del Nuevo Tema" autofocus>
                <x-jet-input-error for="name" />
            </div>

            <div class="my-16">
                <label class="flex text-lg align-middle">
                    <p class="font-normal">Elíge un color para el Tema</p>
                    <input wire:model="color" type="color" class="ml-10 w-52">
                </label>
            </div>
        @endslot

        @slot('footer')
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click="save" class="ml-4">Crear</x-jet-button>
        @endslot
    </x-jet-dialog-modal>
</div>
