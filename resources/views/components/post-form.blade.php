<div>
    {{-- {{dd($post)}} --}}
    <form action="{{route('posts.'.$action, $post)}}" method="post" class="space-y-5">
        @csrf
        @method($method)
        <div class="py-8">
            @livewire('subject-chapters-form', ['post' => $post])
        </div>
        <div>
            <label class="flex">
                <p class="mt-auto mr-3">Título:</p>
                <x-jet-input name="title" value="{{$title}}"></x-jet-input>
            </label>
            <x-jet-input-error for="title"></x-jet-input-error>
        </div>
        <div>
            <label class="flex">
                <p class="mt-auto mr-3">Descripción:</p>
                <x-jet-input name="description" value="{{$description}}"></x-jet-input>
            </label>
            <x-jet-input-error for="description"></x-jet-input-error>
        </div>
        <div class="py-8">
            <label>
                <p class="my-auto mr-3">Contenido:</p>
                <textarea name="content" id="editor" class="w-full" rows="10">{{$content}}</textarea>
            </label>
            <x-jet-input-error for="content"></x-jet-input-error>
        </div>
        <div class="flex justify-around">
            <div class="border-2 flex flex-col space-y-3 p-8 rounded-xl border-neutral-200">
                <p class="font-semibold">¿Está el Post terminado?</p>
                <label class="pl-3">
                    <input type="radio" name="finished" value="1" checked> Sí
                </label>
                <label class="pl-3">
                    <input type="radio" name="finished" value="0"> No
                </label>
                <x-jet-input-error for="finished"></x-jet-input-error>
            </div>
            <div class="border-2 flex flex-col space-y-3 p-8 rounded-xl border-neutral-200">
                <p class="font-semibold">Quieres que tu Post sea Público o Privado?</p>
                <label class="pl-3">
                    <input type="radio" name="public" value="1" checked> Público
                </label>
                <label class="pl-3">
                    <input type="radio" name="public" value="0"> Privado
                </label>
                <x-jet-input-error for="public"></x-jet-input-error>
            </div>
        </div>
        <div class="flex justify-end space-x-3 p-10">
            <x-jet-secondary-button><a href="{{route('posts.show', $btnCancelParameter)}}">Cancelar</a></x-jet-secondary-button>
            <x-jet-button type="submit">{{$btnSubmitContent}}</x-jet-button>
        </div>
    </form>
</div>