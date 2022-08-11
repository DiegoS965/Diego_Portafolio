@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-center font-sans">
        <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">Edit education</h1>
    </div>
    <div class="flex justify-center">
        <div class="w-4/12 p-6 rounded-lg">
            <form action="{{ route('education.update',$education) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title of the job"
                    class=" border-2 w-full p-4 rounded-lg @error('title')
                        border-red-500
                    @enderror('title')" value="{{$education->title}}">

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
                    @enderror('start')" value="{{ $education->start }}">

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
                    @enderror('end')" value="{{ $education->end }}">

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
                    @enderror('studied_at')" value="{{ $education->studied_at }}">

                    @error('studied_at')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                    font-medium w-full">Save education</button>
                </div><br>
            </form>
        </div>
    </div>
@endsection