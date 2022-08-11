@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-evenly">
        <div class="w-6/12 bg-white p-8 rounded-lg ">
            <div class="font-sans">
                <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">{{$biography->name}}</h1>
                <br>
                <p class="leading-relaxed">{{$biography->description}}</p>
                <br>
            </div>
            <div class="grid grid-cols-2 gap-4 py-8">
                    <div>
                        <p class="font-semibold text-blue-900">Phone number:</p> <p>+503 {{$biography->phone_number}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">Title:</p> <p>{{$biography->biography_title}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">Email:</p> <p>{{$biography->email}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">Age:</p> <p>{{$biography->birthdate}}</p>
                        <br>
                    </div>
                    <div>
                        <p class="font-semibold text-blue-900">University:</p> <p>{{$biography->university}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">City:</p> <p>{{$biography->city}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">Country:</p> <p>{{$biography->country}}</p>
                        <br>
                        <p class="font-semibold text-blue-900">CV</p>
                        <br>
                        <p class="font-semibold text-blue-900">
                            <a href="{{$biography->linkedin}}" class="underline">LinkedIn</a>
                        </p>
                    </div>
            </div>
        </div>
        <div class="w-4/12 p-6 rounded-lg">
            <img src="../images/photo.png" class="object-scale-down rounded-lg">
        </div>
    </div>

    @auth
    @if(!empty($biography))
    <br><br><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <h1 class="text-3xl text-center">Update Biography</h1>
            </div>
        </div><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <form action="{{ route('home.update',$biography) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="font-medium">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your name"
                        class=" border-2 w-full p-4 rounded-lg @error('name')
                            border-red-500
                        @enderror('name')" value="{{ $biography->name }}">
    
                        @error('name')
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
                        @enderror('description')" value="{{ $biography->description }}">
    
                        @error('description')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="font-medium">Phone number</label>
                        <input type="number" name="phone_number" id="phone_number" placeholder="Your phone number"
                        class="border-2 w-full p-4 rounded-lg @error('phone_number')
                            border-red-500
                        @enderror('phone_number')" value="{{ $biography->phone_number }}">
    
                        @error('phone_number')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="biography_title" class="font-medium">Title</label>
                        <input type="text" name="biography_title" id="biography_title" placeholder="Your title"
                        class="border-2 w-full p-4 rounded-lg @error('biography_title')
                            border-red-500
                        @enderror('biography_title')" value="{{ $biography->biography_title }}">
    
                        @error('biography_title')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="email" class="font-medium">Email</label>
                        <input type="email" name="email" id="email" placeholder="Your email"
                        class=" border-2 w-full p-4 rounded-lg @error('email')
                            border-red-500
                        @enderror('email')" value="{{ $biography->email }}">
    
                        @error('email')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="birthdate" class="font-medium">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" placeholder="Your birthdate"
                        class="border-2 w-full p-4 rounded-lg @error('birthdate')
                            border-red-500
                        @enderror('birthdate')" value="{{ $biography->birthdate }}">
    
                        @error('birthdate')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="university" class="font-medium">University</label>
                        <input type="text" name="university" id="university" placeholder="Your university"
                        class="border-2 w-full p-4 rounded-lg @error('university')
                            border-red-500
                        @enderror('university')" value="{{ $biography->university }}">
    
                        @error('university')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="city" class="font-medium">City</label>
                        <input type="text" name="city" id="city" placeholder="Your city"
                        class="border-2 w-full p-4 rounded-lg @error('city')
                            border-red-500
                        @enderror('city')" value="{{ $biography->city }}">
    
                        @error('city')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="country" class="font-medium">Country</label>
                        <input type="text" name="country" id="country" placeholder="Your country"
                        class="border-2 w-full p-4 rounded-lg @error('country')
                            border-red-500
                        @enderror('country')" value="{{ $biography->country }}">
    
                        @error('country')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="linkedin" class="font-medium">Linkedin link</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="Your linkedin"
                        class="border-2 w-full p-4 rounded-lg @error('linkedin')
                            border-red-500
                        @enderror('linkedin')" value="{{ $biography->linkedin }}">
    
                        @error('linkedin')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                        font-medium w-full">Save biography</button>
                    </div><br>
                </form>
            </div>
        </div>
        @else
        <br><br><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <h1 class="text-3xl text-center">New Biography</h1>
            </div>
        </div><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <form action="{{ route('home') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="font-medium">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your name"
                        class=" border-2 w-full p-4 rounded-lg @error('name')
                            border-red-500
                        @enderror('name')" value="{{ old('name') }}">
    
                        @error('name')
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
                        @enderror('description')" value="{{ old('description') }}">
    
                        @error('description')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="font-medium">Phone number</label>
                        <input type="number" name="phone_number" id="phone_number" placeholder="Your phone number"
                        class="border-2 w-full p-4 rounded-lg @error('phone_number')
                            border-red-500
                        @enderror('phone_number')" value="{{ old('phone_number') }}">
    
                        @error('phone_number')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="biography_title" class="font-medium">Title</label>
                        <input type="text" name="biography_title" id="biography_title" placeholder="Your title"
                        class="border-2 w-full p-4 rounded-lg @error('biography_title')
                            border-red-500
                        @enderror('biography_title')" value="{{ old('biography_title') }}">
    
                        @error('biography_title')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="email" class="font-medium">Email</label>
                        <input type="email" name="email" id="email" placeholder="Your email"
                        class=" border-2 w-full p-4 rounded-lg @error('email')
                            border-red-500
                        @enderror('email')" value="{{ old('email') }}">
    
                        @error('email')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="birthdate" class="font-medium">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" placeholder="Your birthdate"
                        class="border-2 w-full p-4 rounded-lg @error('birthdate')
                            border-red-500
                        @enderror('birthdate')" value="{{ old('birthdate') }}">
    
                        @error('birthdate')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="university" class="font-medium">University</label>
                        <input type="text" name="university" id="university" placeholder="Your university"
                        class="border-2 w-full p-4 rounded-lg @error('university')
                            border-red-500
                        @enderror('university')" value="{{ old('university') }}">
    
                        @error('university')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="city" class="font-medium">City</label>
                        <input type="text" name="city" id="city" placeholder="Your city"
                        class="border-2 w-full p-4 rounded-lg @error('city')
                            border-red-500
                        @enderror('city')" value="{{ old('city') }}">
    
                        @error('city')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="country" class="font-medium">Country</label>
                        <input type="text" name="country" id="country" placeholder="Your country"
                        class="border-2 w-full p-4 rounded-lg @error('country')
                            border-red-500
                        @enderror('country')" value="{{ old('country') }}">
    
                        @error('country')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="linkedin" class="font-medium">Linkedin link</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="Your linkedin"
                        class="border-2 w-full p-4 rounded-lg @error('linkedin')
                            border-red-500
                        @enderror('linkedin')" value="{{ old('linkedin') }}">
    
                        @error('linkedin')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                        font-medium w-full">Save biography</button>
                    </div><br>
                </form>
            </div>
        </div>
        @endif
    @endauth
@endsection