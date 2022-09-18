<div {{$attributes->merge(['class' => 'cursor-pointer flex-1 flex border-l-4 border-emerald-400 hover:text-emerald-700 my-2 ml-3'])}}>
    <a href="{{route('posts.show', $post)}}" class="py-2 text-left">
        <p class="my-auto mr-2 text-base font-bold">{{$slot}}</p>
        <p class="my-auto font-light text-sm text-black">{{$description}}</p>
    </a>
    {{$adition}}
</div>