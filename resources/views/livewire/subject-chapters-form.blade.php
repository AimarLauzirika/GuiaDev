<div class="flex justify-around">
    @if (isset($subject))
        <input type="hidden" id="subject_id" data-subject_id="{{$subject->id}}">
        <input type="hidden" id="chapter_id" data-chapter_id="{{$chapterId}}">
    @endif
    <div>
        <label class="flex">
            <p class="my-auto mr-3">Tema:</p>
            <select wire:model="selectSubjectId" id="selectSubject" name="subject_id" class="py-1 rounded-md">
                <option value="">-- Elige un Tema --</option>
                @foreach ($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </label>
        <x-jet-input-error for="subject_id"></x-jet-input-error>
    </div>
    <div>
        <label class="flex">
            <p class="my-auto mr-3">Capítulo:</p>
            {{-- {{dd($subject)}} --}}
            <select name="chapter_id" id="selectChapter" class="py-1 disabled:text-gray-400 disabled:border-gray-400 rounded-md">
                <option value="">¿Pertenece a algún capítulo?</option>
                    @if (isset($chapters))
                    @foreach ($chapters as $chapter)
                    <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                    @endforeach
                    @endif
                    <option value="">Otro</option>
                </select>
        </label>
    </div>

    @push('scripts')
        <script>
            //* Get functions
            // console.log(window.location.pathname);
            const pathname = window.location.pathname
            const array = pathname.split('/')
            const functionForm = array[array.length -1]
            // console.log(functionForm);

            let subjectId, chapterId
            if (functionForm === "edit") {
                subjectId = document.querySelector('#subject_id').dataset.subject_id
                chapterId = document.querySelector('#chapter_id').dataset.chapter_id
            }
            const selectSubject = document.querySelector('#selectSubject')
            const selectChapter = document.querySelector('#selectChapter')
                
            setTimeout(() => {
                if (functionForm === "edit") {
                    console.log('eii');
                    selectSubject.value = subjectId
                    selectChapter.value = chapterId
                } else {
                    selectChapter.firstElementChild.setAttribute('selected')
                }
                if (selectSubject.value === "") {
                    selectChapter.disabled = true
                }
                selectSubject.addEventListener('change', () => {
                    livewire.emit('selectSubject')
                    console.log(selectSubject.value);
                    if (selectSubject.value === "") {
                        setTimeout(() => {
                            selectChapter.disabled = true
                        }, 50)
                    } else {
                        selectChapter.disabled = false
                    }
                })
            }, 100);
                
        </script>
    @endpush
</div>
