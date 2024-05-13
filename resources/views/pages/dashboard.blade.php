@extends('layouts.admin')
@section('title', 'Admin F-OurTalk')
@section('content')
    <div
        class="font-[Poppins] min-h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] flex justify-left items-start flex-col">
        <div class="p-20">
            <div class="text-left ml-4 md:ml-60 mt-3">
                <h1 class="text-2xl md:text-4xl font-semibold">Dashboard</h1>
            </div>
            <div class="container items-center px-10 md:px-80 py-8 mx-auto mt-5">
                <div class="flex flex-wrap pb-4 mx-4 md:mx-24 lg:mx-0">
                    <!-- Informasi tentang pengguna -->
                    <div class="w-full md:w-1/2 lg:w-1/2 p-2">
                        <a href="{{ route('users.index') }}">
                            <div
                                class="flex flex-col px-10 py-6 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group user-info">
                                <div class="flex flex-row justify-between items-center">
                                    <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <h1
                                    class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                    {{ $totalUsers }}
                                </h1>
                                <div class="flex flex-row justify-between group-hover:text-gray-200">
                                    <p>Total User</p>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <!-- Informasi tentang total talk -->
                    <div class="w-full md:w-1/2 lg:w-1/2 p-2">
                        <a href="#">
                            <div
                                class="flex flex-col px-10 py-6 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group user-info">
                                <div class="flex flex-row justify-between items-center">
                                    <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <h1
                                    class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                    {{ $totalTalks }}
                                </h1>
                                <div class="flex flex-row justify-between group-hover:text-gray-200">
                                    <p>Total Talk</p>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

                body {
                    font-family: 'Poppins', sans-serif;
                }

                /* Media query untuk menyesuaikan tata letak saat lebar layar berubah */
                @media (max-width: 768px) {
                    .container {
                        max-width: none;
                        padding-left: 20px;
                        padding-right: 20px;
                    }

                    .user-info,
                    .total-talk-info {
                        width: 100%;
                    }

                    .text-left.ml-4.md\:ml-60.mt-3 {
                        margin-left: 20px;
                    }

                    .text-2xl.md\:text-4xl {
                        font-size: 2rem;
                    }
                }
            </style>
        </div>
    </div>
@endsection
