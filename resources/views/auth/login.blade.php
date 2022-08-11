@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 rounded-lg">
            <h1 class="text-3xl text-center">Login</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="w-4/12 p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-center">
                {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                    class="border-2 w-full p-4 rounded-lg @error('email')
                        border-red-500
                    @enderror('email')" value="{{ old('email') }}">

                    @error('email')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                    class="border-2 w-full p-4 rounded-lg @error('password')
                        border-red-500
                    @enderror('password')" value="">

                    @error('password')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                    font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection