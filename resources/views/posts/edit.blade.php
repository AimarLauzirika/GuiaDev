{{-- <x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-gray-800 leading-tight">
            Editar el Post <span class="font-bold text-xl">{{ $post->title }}</span>
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 bg-">
                <x-post-form :post="$post"></x-post-form>
                {{-- <form action="{{route('posts.destroy', $post)}}" method="get">
                </form> --}}
                <x-jet-danger-button id="btnDeletePost">Eliminar Post</x-jet-danger-button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const btnDeletePost = document.querySelector('#btnDeletePost')
            btnDeletePost.addEventListener('click', e => {
                // e.preventDefault()
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('deletePost')
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                    }
                })
            })
        </script>
    @endpush
</x-app-layout> --}}