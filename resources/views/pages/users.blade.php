@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="font-[Poppins] h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] flex justify-right items-start flex-col">
    <div class="p-20">
       
        <!-- Content -->
        <div class="w-full p-8"> <!-- Changed w-3/4 to w-full -->
            <h1 class="text-3xl font-semibold mb-6">User Management</h1>

            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-xl shadow-md"> <!-- Changed min-w-full to w-full -->
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-3 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->username }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md delete-btn" id="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                if (confirm('Are you sure you want to delete this user?')) {
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
@endsection
