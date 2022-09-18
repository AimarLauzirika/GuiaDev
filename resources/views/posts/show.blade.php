<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                @auth
                @if (Auth::user()->id == $post->user->id)
                <a href="{{route('posts.edit', $post)}}" class="text-center text-gray-800 hover:text-sky-700">
                    Editar Post
                </a>
                @endif
                @endauth
            </div>
            <a href="{{route('subjects.show', $post->subject)}}" style="color: {{$post->subject->color}}" class="text-center font-bold">{{$post->subject->name}}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 bg-">
                <article>
                    <h1 class="text-center text-2xl font-bold my-9">{{$post->title}}</h1>
                    <p class="text-neutral-600 text-sm">{{$post->description}}</p>
                    <p class="my-10">{!!$post->content!!}</p>
                </article>
            </div>
        </div>
    </div>

</x-app-layout>