@extends('layouts.main')

@section('content')

<div class="max-w-lg mx-auto">
    <h1 class="mb-8 text-2xl font-bold text-pink-500 text-center">Register</h1>
    <form action="\register\store" method="POST">
      @csrf
      <div class="mb-6">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input name="username" type="text" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" placeholder="" required>
      </div>
      <div class="mb-6">
        <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
        <input name="firstName" type="text" id="firstName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" placeholder="" required>
        </div>
        <div class="mb-6">
            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
            <input name="lastName" type="text" id="lastName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" placeholder="" required>
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" placeholder="" required>
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input name="password" type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" required>
        </div>
     
        <p  class="mb-6">Already have an account ? <a class="text-blue-500 hover:text-blue-700" href="/login">Login here</a></p>
        <button type="submit" class="text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Register</button>
      </form>
</div>

@endsection