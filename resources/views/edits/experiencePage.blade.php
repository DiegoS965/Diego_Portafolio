@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-center font-sans">
        <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">Edit experience</h1>
    </div>
    <div class="flex justify-center">
        <div class="w-4/12 p-6 rounded-lg">
            <form action="{{ route('experience.update',$experience) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title of the job"
                    class=" border-2 w-full p-4 rounded-lg @error('title')
                        border-red-500
                    @enderror('name')" value="{{$experience->title}}">

                    @error('name')
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
                    @enderror('start')" value="{{ $experience->start }}">

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
                    @enderror('end')" value="{{ $experience->end }}">

                    @error('end')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="font-medium">Description</label>
                    <input type="text" name="description" id="description" placeholder="Your description"
                    class="border-2 w-full p-4 rounded-lg @error('description')
                        border-red-500
                    @enderror('description')" value="{{ $experience->description }}">

                    @error('description')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="worked_at" class="font-medium">Worked at</label>
                    <input type="text" name="worked_at" id="worked_at" placeholder="The place of work"
                    class="border-2 w-full p-4 rounded-lg @error('worked_at')
                        border-red-500
                    @enderror('worked_at')" value="{{ $experience->worked_at }}">

                    @error('worked_at')
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
@endsection