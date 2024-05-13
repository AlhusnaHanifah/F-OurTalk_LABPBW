@extends('layouts.admin')
@section('title', 'User Management')

@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] p-20">
        <h1 class="text-3xl font-semibold mb-6">User Management</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <form action="{{ route('admin.users.delete', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
