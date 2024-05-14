@extends('layouts.admin')
@section('title', 'F-Our Talk')
@section('content')
<style>
        .notifications {
            position: fixed;
            top: 20px;
            right: 200px;
            z-index: 9999; /* Pastikan nilai z-index lebih tinggi daripada sidebar */
            width: 1200px;
        }

    </style>
    <div
        class="font-[Poppins] min-h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen p-20">
        <div class="p-20">
            <div class="text-left ml-4 md:ml-100 mt-3">

            
    
        @if (session()->has('success'))
            <div class="notifications bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4 ml-auto">
                {{ session('success') }}
            </div>
        @endif
        @foreach($talks as $talk)
            <div class="inset-0 border-4 border-black mx-60 mb-10 p-10 rounded-2xl">
                <p>By: {{ $talk->user->username }}</p>
                <h1>{{ $talk->value }}</h1>
                
                <!-- Tombol untuk menampilkan atau menyembunyikan komentar -->
                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mt-2 toggle-comments">Show/Hide Comments</button>

                 <!-- Tombol delete -->
            <form action="{{ route('admindelete', ['id' => $talk->id]) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2">Delete</button>
    </form>
                
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
    </script>
@endsection