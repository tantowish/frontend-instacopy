
<nav class="bg-white dark:bg-gray-900 w-full z-20 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="\" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><Span class="text-pink-500">Insta</Span>Copy</span>
    </a>
    <div class="flex md:order-2">
      @if (session('token'))
      <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="{{ session('data')['image'] ? asset('storage/' . session('data')['image']) : asset('storage/image/users/default.jpg') }}" alt="user photo">
      </button>

      <!-- Dropdown menu -->
      <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <div>{{ session('data')['username'] }}</div>
          <div class="font-medium truncate">{{ session('data')['email'] }}</div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
          <li>
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
          </li>
        </ul>
        <div class="py-2">
          <form action="/logout" method="POST">
            @csrf
            <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" type="submit">Sign Out</button>
          </form>
        </div>
      </div>
      @else
        <a href="/login">
          <button type="button" class="text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-pink-600 dark:hover:bg-pink-500 dark:focus:ring-pink-800">Login</button>
        </a>
      @endif
        
    
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a id="navbar" href="/" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-pink-500 md:p-0 md:dark:hover:text-pink-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
        </li>
        <li>
          <a id="navbar" href="/follower" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-pink-500 md:p-0 md:dark:hover:text-pink-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Follower</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  