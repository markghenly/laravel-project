@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-500 relative overflow-hidden py-12 px-4 sm:px-6 lg:px-8">
    <!-- Geometric shapes -->
    <div class="absolute inset-0" style="z-index: 0;">
        <!-- Large circle -->
        <div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-white opacity-10 mix-blend-overlay"></div>
        <!-- Small circles -->
        <div class="absolute left-10 bottom-10 w-32 h-32 rounded-full bg-white opacity-10 mix-blend-overlay"></div>
        <div class="absolute right-1/4 top-1/3 w-24 h-24 rounded-full bg-white opacity-10 mix-blend-overlay"></div>
        <!-- Square -->
        <div class="absolute left-1/3 top-1/4 w-48 h-48 rotate-12 bg-white opacity-10 mix-blend-overlay"></div>
    </div>

    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg relative z-10">
        @if (session('success'))
            <div class="rounded-md bg-green-100 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex justify-center">
            
        </div>
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                Login
            </h2>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="relative">
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884l7.197 4.25a1 1 0 001.6-.8V5.884a1 1 0 00-1.6-.8L2.003 9.334a1 1 0 000 1.6z" />
                        </svg>
                    </div>
                </div>
                <div class="relative">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884l7.197 4.25a1 1 0 001.6-.8V5.884a1 1 0 00-1.6-.8L2.003 9.334a1 1 0 000 1.6z" />
                        </svg>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="ml-2">Sign in to Admin</span>
                </button>
            </div>

            <div class="text-sm text-center">
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Register here First!
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
