<div>
    <x-slot name="header">
        <h2 class="text-center text-xl text-gray-800">
            {{ __('Todos los Temas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 text-xl">
                <div class="flex justify-between">
                    <div class="flex text-sm mb-3 text-neutral-500">
                        @auth
                        <p class="mr-3 my-auto">Filtrar</p>
                        <select wire:model="filter" class="py-0 text-sm">
                            <option value="%">Todos los Temas</option>
                            <option value="{{Auth::user()->id}}">Mis Temas</option>
                        </select>
                        @else
                        <p>Todos los Temas</p>
                        @endauth
                    </div>
                    @auth @livewire('subjects-create') @endauth
                </div>
                <div class="border-b"></div>
                <div id="subjectsContainer">
                    @foreach ($subjects as $subject)
                        <div class="flex justify-between border-b rounded-md hover:bg-neutral-100">
                            <a href="{{route('subjects.show', $subject)}}" data-autor="{{$subject->user_id}}" style="color: {{$subject->color}}" draggable="false"  class="subject block w-full p-2 cursor-default font-bold">{{$subject->name}}<span class="text-sm text-gray-400 font-semibold ml-3">{{count($subject->posts)}} Posts</span></a>
                            {{--  --}}
                            <div class="buttons hidden">
                                @auth
                                @if (Auth::user()->role_id == $subject->user_id)
                                {{-- <a href="{{route('subjects.edit', $subject)}}" class="b-edit hover:text-amber-500 hover:bg-neutral-200 text-base py-2 px-3 rounded-3xl">Editar</a> --}}
                                @livewire('subjects-edit', ['subject' => $subject], key($subject->id))
                                <p wire:click="delete({{$subject}})" class="hover:text-red-600 hover:bg-neutral-200 text-base py-1 px-3 h-11 pt-2 rounded-3xl cursor-pointer">Eliminar</p>
                                @else
                                <div><div></div></div>
                                @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    @auth
    @push('scripts')
        <script>

            let activeEdit;
            renderButtons()
            

            //*** Para que los botones de editar y eliminar Tema se muestren y oculten ***\\
            function renderButtons() {
                
                const subjects = document.querySelectorAll('.subject')
                subjects.forEach(subject => {
                    subject.addEventListener('mouseover', ()=>{
                        if (activeEdit != subject.nextElementSibling.firstElementChild.firstElementChild.dataset.id) {
                            subject.nextElementSibling.classList.remove('hidden')
                            subject.nextElementSibling.classList.add('flex')
                        }
                    })
                    subject.addEventListener('mouseout', ()=>{
                        if (activeEdit != subject.nextElementSibling.firstElementChild.firstElementChild.dataset.id) {
                            subject.nextElementSibling.classList.add('hidden')
                        }
                    })
                    
                });
                
                const allButtons = document.querySelectorAll('.buttons')
                allButtons.forEach(buttons => {
                    buttons.addEventListener('mouseover', ()=>{
                        if (activeEdit != buttons.firstElementChild.firstElementChild.dataset.id) {
                            buttons.classList.remove('hidden')
                        }
                    })
                    buttons.addEventListener('mouseout', ()=>{
                        if (activeEdit != buttons.firstElementChild.firstElementChild.dataset.id) {
                            buttons.classList.add('hidden')
                        }
                    })
                })
            

                const bEdits = document.querySelectorAll('.b-edit')
                bEdits.forEach(bEdit => {
                    bEdit.addEventListener('click', (e)=>{
                        activeEdit = e.target.dataset.id
                        
                    })
                });
            }

            // Permite dar tiempo para que al crear un nuevo tema se le apliquen los efectos de mostrar y ocultar botones de edición y eliminar
            Livewire.on('renderSubjectsIndex', function() {
                setTimeout(() => {
                    activeEdit = undefined
                    renderButtons()
                }, 200);
            })

            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\


            //*** Para que los botones edit se vuelvan a ocultar después de hacer click ***\\

            // Con el botón cancelar del modal
            Livewire.on('resetModal', ()=>{
                activeEdit = undefined
                renderButtons()
            })

            // Haciendo click fuera del modal
            const opacity075 = document.querySelectorAll('.opacity-75')
            opacity075.forEach(each=>{
                each.addEventListener('click', ()=>{
                    activeEdit = undefined
                    renderButtons()
                })
            })

            // Presinando Esc
            const body = document.querySelector('body')
            body.addEventListener('keydown', e => {
                if (e.keyCode == 27) {
                    activeEdit = undefined
                    renderButtons()
                }
            })
            //********************************************************************\\
        </script>
    @endpush
    @endauth
</div>
