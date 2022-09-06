<div {{$attributes->merge(['class' => 'flex text-slate-900 font-bold bg-slate-600/10 text-xl mt-5  cursor-pointer chapter-div'])}}>
    <div class="flex">
        <x-arrow-svg data-chapterId="{{$attributes['data-chapterId']}}"></x-arrow-svg>
        <h2 data-chapterId="{{$attributes['data-chapterId']}}">{{$slot}}</h2>
    </div>
</div>