@extends('layouts.main')
@section('title', 'F-Our Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] p-20">
        @if (session()->has('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @foreach($talks as $talk)
            <div class="inset-0 border-4 border-black mx-60 mb-10 p-10 rounded-2xl">
                <p>By: {{ $talk->user->username }}</p>
                <h1>{{ $talk->value }}</h1>
                
                <!-- Form untuk menambahkan komentar -->
                <form id="commentForm{{ $talk->id }}" action="{{ route('comments.store', ['talk' => $talk->id, 'user' => Auth::user()->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="komentar" placeholder="Write your comment here..." class="w-full border-2 border-gray-300 rounded-md p-2"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Add Comment</button>
                </form>
                
                <!-- Tombol untuk menampilkan atau menyembunyikan komentar -->
                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mt-2 toggle-comments">Show/Hide Comments</button>
                
                <!-- Tampilkan komentar jika tersedia -->
                @if ($talk->comments && $talk->comments->isNotEmpty())
                    <div class="comments hidden mt-4">
                        @foreach($talk->comments as $comment)
                            <div class="border-2 border-gray-300 rounded-md p-2 mb-2">
                                <p>{{ $comment->user->username }}: {{ $comment->komentar }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No comments yet.</p>
                @endif
            </div>
        @endforeach

        <a href="{{ route('talks.create') }}" class="bg-blue-500 text-white text-lg rounded-full w-16 h-16 fixed bottom-10 right-20 flex items-center justify-center">
            <i class="bi bi-pen"></i>
        </a>
    </div>

    <!-- Script untuk menangani tampilan komentar dan pop-up -->
    <script>
        const toggleButtons = document.querySelectorAll('.toggle-comments');

        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                const comments = button.nextElementSibling;
                comments.classList.toggle('hidden');
            });
        });

        // Menangani pop-up setelah submit form
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Mencegah pengiriman form secara default
            const formData = new FormData(form);
            const talkId = form.getAttribute('id').replace('commentForm', '');
            
            fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const successMessage = document.createElement('div');
                successMessage.textContent = data.message;
                successMessage.classList.add('bg-green-200', 'text-green-800', 'px-4', 'py-2', 'rounded-md', 'mb-4');
                form.insertAdjacentElement('afterend', successMessage);
                setTimeout(() => {
                    successMessage.remove();
                    // Memuat ulang halaman setelah menampilkan pesan sukses
                    window.location.reload();
                }, 3000);
                form.reset(); // Mengosongkan form setelah komentar berhasil ditambahkan
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

    </script>
@endsection
