<div {{$attributes->merge(['class' => 'pl-3 cursor-pointer flex-1 flex border-l-4 border-emerald-400 hover:text-emerald-900 my-2 ml-3'])}}>
    <a href="{{route('posts.show', $post)}}" class="py-2 text-left">
        <p class="my-auto font-bold mr-2 text-lg decoration-1">{{$slot}}</p>
        <p class="my-auto font-light text-sm text-black">{{$description}}</p>
    </a>
    {{$adition}}
</div>