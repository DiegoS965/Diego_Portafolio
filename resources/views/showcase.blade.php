@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-center font-sans">
        <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">Project showcase</h1>
    </div>
    @foreach($showcases as $showcase)
        <div class="grid grid-cols-2 py-2  w-full flex justify-between">
            <div class="flex p-6 grid grid-rows-5 border-b border-[rgba(214,214,214,0.7)]">
                <div class="text-blue-900">
                    <h1 class="text-2xl font-medium">{{$showcase->title}}</h1>
                </div>
                <div>
                    {{$showcase->description}}
                </div>
                <div>
                    <a class="text-blue-900 underline" href="">{{$showcase->link}}</a>
                </div>
                <div>
                    <a class="text-blue-900 underline" href="{{$showcase->rep_link}}">Github Repository</a>
                </div>
                <div>
                    Project completed at: {{$showcase->completed_at}}
                </div>
            </div>
            <div class="bg-black rounded-lg p-6 border-b border-[rgba(214,214,214,0.7)]">
                <div id="default-carousel" class="relative" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach($showcase->images as $image)
                            <div class="hidden duration-1000 ease-in-out" data-carousel-item="active">
                                <img src="../project_images/{{$image->url}}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                        @for ($i=1;$i<=count($showcase->images);$i++)
                            <button type="button" class="w-3 h-3 rounded-full bg-gray-500/30 hover:bg-gray-500" aria-current="false" aria-label="Slide {{$i}}" data-carousel-slide-to="{{$i-1}}"></button>
                        @endfor
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-500/30 dark:bg-gray-800/30 group-hover:bg-gray-500/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-500/30 dark:bg-gray-800/30 group-hover:bg-gray-500/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    @auth
    <div class="flex justify-center py-8">
        <div class="w-4/12 p-6 rounded-lg">
            <h1 class="text-3xl text-center">Add project</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="w-4/12 p-6 rounded-lg">
            <form action="{{ route('showcase.store',$biography) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title of the project"
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
                    <label for="description" class="font-medium">Description</label>
                    <textarea name="description" id="description" placeholder="Your description" rows="4"
                    class="border-2 w-full p-4 rounded-lg @error('description')
                        border-red-500
                    @enderror('description')" value="{{ old('description') }}"></textarea>

                    @error('description')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="link" class="font-medium">Website link</label>
                    <input type="text" name="link" id="link" placeholder="Your link of the website"
                    class="border-2 w-full p-4 rounded-lg @error('link')
                        border-red-500
                    @enderror('link')" value="{{ old('link') }}">

                    @error('link')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="rep_link" class="font-medium">Website´s repository</label>
                    <input type="text" name="rep_link" id="rep_link" placeholder="Your link of the repository"
                    class="border-2 w-full p-4 rounded-lg @error('rep_link')
                        border-red-500
                    @enderror('rep_link')" value="{{ old('rep_link') }}">

                    @error('rep_link')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="completed_at" class="font-medium">Project completed at</label>
                    <input type="date" name="completed_at" id="completed_at" placeholder="Project completition date"
                    class="border-2 w-full p-4 rounded-lg @error('completed_at')
                        border-red-500
                    @enderror('completed_at')" value="{{ old('completed_at') }}">

                    @error('completed_at')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="images" class="font-medium">Images of the project</label>
                    <input type="file" required name="images[]" multiple  class="form-control @error('images')
                        @enderror('images')">

                        @error('images')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                    font-medium w-full">Save project</button>
                </div><br>
            </form>
        </div>
    </div>
    @endauth
@endsection