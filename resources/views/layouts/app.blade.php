<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Divya Raval - PHP/Laravel Developer')</title>
     @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body >
    @include('section.header')
      <main class="container mx-auto px-4 text-center items-center">
         @if ($errors->any())
    <div class="alert alert-danger text-red-600 bg-red-200 rounded-md p-4 my-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    
 @if(session()->has('showMsg'))
        <div class="alert alert-success">
            {{ session('showMsg') }}
        </div>
        @endif 
     <!-- Dropdowns with buttons -->
     @if(session()->has('loggedInUser'))
           
    <div class="flex mx-2">
      
        <!-- Dropdown to the Right -->
        <div class="relative inline-block text-left mr-2">
            <button class="px-4 py-2 bg-blue-500 text-white
                           rounded-md shadow hover:bg-blue-700
                           focus:outline-none"
                    onclick="toggleDropdown('dropdownMenuRight')">
               {{session()->get('loggedInUserName')}} 
               </button>
            <div class="hidden origin-top-right absolute 
                        right-0 mt-2 w-56 rounded-md 
                        shadow-lg bg-white ring-1
                        ring-black ring-opacity-5
                        animate-fadeIn"
                 id="dropdownMenuRight">
                 <a href="/profile" class="block px-4 py-2 text-sm 
                                   text-gray-700 
                                   hover:bg-gray-100">
                  profile
                  </a>
                <a href="/dashboard" class="block px-4 py-2 text-sm 
                                   text-gray-700 
                                   hover:bg-gray-100">
                  Dashboard
                  </a>
                   <a href="/logout" class="block px-4 py-2 text-sm 
                                   text-gray-700 
                                   hover:bg-gray-100">
                  Logout
                  </a>
                
            </div>
        </div>
    </div>
     

@endif
     @yield('content')
    </main>
    
    @include('section.footer')
     <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
      <script>
        function toggleDropdown(menuId) {
            const dropdownMenu = document
            .getElementById(menuId);
            dropdownMenu.classList.toggle('hidden');
        }
    </script>
</body>
</html>