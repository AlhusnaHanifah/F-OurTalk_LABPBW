@extends('layouts.main')
@section('title', 'Create Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] p-20">
        <form method="POST" action="{{ route('talks.save') }}" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="value" class="block text-gray-700 text-sm font-bold mb-2">Talk Value:</label>
                <input type="text" id="value" name="value" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:border-blue-500" required>
                @error('value')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>
@endsection
