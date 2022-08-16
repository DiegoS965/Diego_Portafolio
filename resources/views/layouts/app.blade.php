<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @production
  <link rel="stylesheet" href="{{ secure_asset('/css/app.css') }}">
  @endproduction
  <link rel="icon" type="image/x-icon" href="../Diego_logo.ico">
  <title>Diego Sandoval</title>
</head>
<body class= "flex flex-col h-screen ">
    <main class= "mb-auto ">
        <div>
            <div class="inset-x-0  border-b bg-white py-3 md:py-5 border-[rgba(214,214,214,0.7)] ">
                <div class="mx-auto px-4 sm:px-8 lg:px-12 lg:text-left max-w-[1324px]">
                    <div class="flex items-center justify-between ">
                        <div class="hidden items-center justify-center lg:flex ">
                            <div class="flex items-center justify-center ">
                                <div class="relative px-6 ">
                                    <a class="text-inherit " href="/">
                                    <div class="relative text-base leading-6 font-[350] text-[rgba(45,45,45,1)]">Diego Sandoval</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden items-center justify-center lg:flex ">
                            <div class="flex items-center justify-center ">
                                <div class="relative px-6 ">
                                    <a class="text-inherit " href="{{route('showcase')}}">
                                        <div class="relative text-base leading-6 font-[350] text-[rgba(45,45,45,1)]">Showcase</div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center justify-center ">
                                <div class="relative px-6 ">
                                    <a class="text-inherit " href="{{route('experience')}}">
                                        <div class="relative text-base leading-6 font-[350] text-[rgba(45,45,45,1)]">Experience</div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center justify-center ">
                                <div class="relative px-6 ">
                                    <a class="text-inherit " href="{{route('education')}}">
                                    <div class="relative text-base leading-6  font-[350] text-[rgba(45,45,45,1)]">Education</div>
                                
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center justify-center ">
                                <div class="relative px-6 ">
                                    <a class="text-inherit " href="{{route('ability')}}">
                                    <div class="relative text-base leading-6  font-[350] text-[rgba(45,45,45,1)]">Abilities</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden items-center justify-center lg:flex ">
                            @guest
                                <div class="flex items-center justify-center ">
                                    <div class="relative px-6 ">
                                        <a class="text-inherit " href="{{route("login")}}">
                                        <div class="relative text-base leading-6  font-[350] text-[rgba(45,45,45,1)]">Admin</div>
                                        </a>
                                    </div>
                                </div>
                                <!--<div class="flex items-center justify-center " hidden>
                                    <div class="relative px-6 ">
                                        <a class="text-inherit " href="{{route("register")}}">
                                        <div class="relative text-base leading-6  font-[350] text-[rgba(45,45,45,1)]">Register</div>
                                        </a>
                                    </div>
                                </div>-->
                            @endguest
                            @auth
                                <div class="flex items-center justify-center ">
                                    <div class="relative px-6 ">
                                        <form class="text-inherit " action="{{route('logout')}}" method="post">
                                            @csrf
                                            <div class="relative text-base leading-6 font-[350] text-[rgba(45,45,45,1)]">
                                                <button type="submit">Logout</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            
            @yield('content')
        </div>
        <br>
    </main>
    <footer class="flex mb-0 mb-0 p-4 bg-black text-white shadow">
        <span class="text-sm sm:text-center dark:text-gray-400 px-10">© 2022 by Diego Sandoval. All Rights Reserved.</span>
    </footer>
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
</body>
</html>
