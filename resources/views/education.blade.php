@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-center font-sans">
        <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">Education</h1>
    </div>
    <div class=" py-8  w-full flex justify-between">
        <div class="bg-white w-full p-6 rounded-lg ">
            <div class="rounded-lg font-sans">
                @foreach ($educations as $education)
                    <div class="py-6 flex justify-center border-b border-[rgba(214,214,214,0.7)]">
                        <div class="flex w-5/12 grid-flow-col gap-4 justify-end text-right">
                            <div>
                                <h1 class="font-semibold text-blue-900">{{$education->title}}</h1>
                            </div>
                        </div>
                        <div class="flex w-1/12 justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="darkBlue" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                        </div>
                        <div class="flex w-6/12 grid grid-rows-3 grid-flow-col gap-4 justify-start text-left">
                            <div class="flex">
                                <p class="text-blue-900">{{$education->studied_at}}</p>
                            </div> 
                            <div class="">
                                <h2 class="text-blue-900">From {{$education->start}} to {{$education->end}}</h2>
                            </div>
                            <div class="flex">
                                @auth
                                    <a href = "{{route('education.index',$education)}}">
                                        <svg class="w-6 h-6" fill="none" stroke="darkBlue" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>                                </a>
                                    <form action = "{{route('education.destroy',$education)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg class="w-6 h-6" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{$educations->links()}}
    @auth
        <div class="flex justify-center py-8">
            <div class="w-4/12 p-6 rounded-lg">
                <h1 class="text-3xl text-center">Add education</h1>
            </div>
        </div><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <form action="{{ route('education.store',$biography) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="font-medium">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title of the job"
                        class=" border-2 w-full p-4 rounded-lg @error('title')
                            border-red-500
                        @enderror('title')" value="{{old('title')}}">

                        @error('title')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start" class="font-medium">Start date</label>
                        <input type="date" name="start" id="start" placeholder="Start date"
                        class="border-2 w-full p-4 rounded-lg @error('start')
                            border-red-500
                        @enderror('start')" value="{{ old('start') }}">

                        @error('start')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end" class="font-medium">End date</label>
                        <input type="date" name="end" id="end" placeholder="End date"
                        class="border-2 w-full p-4 rounded-lg @error('end')
                            border-red-500
                        @enderror('end')" value="{{ old('end') }}">

                        @error('end')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="studied_at" class="font-medium">Achieved at</label>
                        <input type="text" name="studied_at" id="studied_at" placeholder="Name of the institution"
                        class="border-2 w-full p-4 rounded-lg @error('studied_at')
                            border-red-500
                        @enderror('studied_at')" value="{{ old('studied_at') }}">

                        @error('studied_at')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                        font-medium w-full">Save experience</button>
                    </div><br>
                </form>
            </div>
        </div>
    @endauth
@endsection