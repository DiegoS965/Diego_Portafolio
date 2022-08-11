@extends('layouts.app')

@section('content')
    <div class="py-8 flex justify-center font-sans">
        <h1 class="font-semibold text-blue-900 text-5xl font-medium mb-4">Abilities</h1>
    </div>
    <div class=" py-8  w-full flex justify-between">
        <div class="bg-white w-full p-6 rounded-lg ">
            <div class="rounded-lg font-sans">
                <div class="py-6 grid grid-rows-3 grid-cols-2 gap-4 flex justify-center border-b border-[rgba(214,214,214,0.7)]">
                    @foreach ($abilities as $ability)
                        <div class="justify-center">
                            <ul class="list-disc">
                                <li>{{$ability->ability}}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{$abilities->links()}}
    @auth
        <div class="flex justify-center py-8">
            <div class="w-4/12 p-6 rounded-lg">
                <h1 class="text-3xl text-center">Add ability</h1>
            </div>
        </div><br>
        <div class="flex justify-center">
            <div class="w-4/12 p-6 rounded-lg">
                <form action="{{ route('ability.store',$biography) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="ability" class="font-medium">Ability</label>
                        <input type="text" name="ability" id="ability" placeholder="Title of the ability"
                        class=" border-2 w-full p-4 rounded-lg @error('ability')
                            border-red-500
                        @enderror('ability')" value="{{old('ability')}}">

                        @error('ability')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-3 rounded
                        font-medium w-full">Save ability</button>
                    </div><br>
                </form>
            </div>
        </div>
    @endauth
@endsection