<div>
    @auth
    @if (Auth::user()->role_id == 1)
        <x-slot name="header">
            @livewire('chapters-edit', ['subject' => $subject])
        </x-slot>
    @endif
    @endauth

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-center text-2xl my-10">Contenido de <span style="color: {{$subject->color}}" class="font-extrabold text-3xl">{{$subject->name}}</span></h1>
                @foreach ($chapters as $chapter)
                    <x-chapter-div data-chapterId="{{$chapter->id}}">{{$chapter->name}}</x-chapter-div>
                    @foreach ($chapter->posts as $post)
                    <x-post-div :post="$post" :chapterId="$chapter->id" class="pl-3">
                        {{$post->title}}
                        <x-slot name="description">
                            {{$post->description}}
                        </x-slot>
                        <x-slot name="adition"></x-slot>
                    </x-post-div>
                    @endforeach
                    
                @endforeach
                    @if (count($postsNoChapter))
                        <x-chapter-div data-chapterId="0" class="font-normal text-slate-500">Posts sin clasificar</x-chapter-div>
                        <div class="">
                            @foreach ($postsNoChapter as $post)
                                <x-post-div :post="$post" chapterId="0" class="pl-3">
                                    {{$post->title}}
                                <x-slot name="description">
                                    {{$post->description}}
                                </x-slot>
                                <x-slot name="adition"></x-slot>
                            </x-post-div>
                            @endforeach
                        </div>
                    @endif
                
                <div></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            //* Hide and show posts
            const chapterDivs = document.querySelectorAll('.chapter-div')
            chapterDivs.forEach( divChapter => {
                divChapter.addEventListener('click', e => {
                    const chapterId = e.target.dataset.chapterid

                    const posts = document.querySelectorAll(`[chapterId="${chapterId}"]`)
                    posts.forEach( post => {
                        post.classList.toggle('hidden')
                    })

                    const svg = document.querySelector(`svg[data-chapterid="${chapterId}"]`)
                    svg.classList.toggle('-rotate-90')
                    
                })
            })





            
            
            </script>
            {{-- SortableJS (Drag & Drop)
            <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

            <script>
                new Sortable(sortable, {
                    handle: '.handle',
                    animation: 150,
                    ghostClass: 'bg-sky-100'
                });
            </script> --}}
    @endpush
    
</div>
